<?php

class Documents_AjaxDocumentEditController extends Zend_Controller_Action
{

    var $auth;

    public function init()
    {
        $this->auth = Zend_Auth::getInstance();


        
        $this->_helper->viewRenderer->setNoRender();
        $this->_helper->layout()->disableLayout();
    }

    # get document's edit form
    public function getEditDocumentFormAction(){

        $layout = new Zend_Layout();
        $layout->setLayoutPath(APPLICATION_PATH.'/modules/documents/views/scripts/ajax/');
        $layout->setLayout('get-edit-document-form');
        
        $cd_ID = $_REQUEST['cd_ID'];
        $cd_Driver_ID = $_REQUEST['cd_Driver_ID'];
        $custom_document = Documents_Model_CustomDocument::getRecord($cd_ID);
        $formStatusList = new Documents_Model_CustomDocumentFormStatus();
        $faxStatusList = new Documents_Model_CustomDocumentFaxStatus();
        $companyList = Company_Model_Company::getCompanyList();
        if($custom_document[0]['cd_Company_ID']!=""){
            $homebaseList = Homebase_Model_Homebase::getHomebaseList($custom_document[0]['cd_Company_ID']);
            $layout->homebaseList = $homebaseList;
        }
         if ($this->auth->hasIdentity()) {
            $layout->identity = $this->auth->getIdentity();
        }
        $scans = Documents_Model_CustomDocument::getScansList($custom_document[0]['cd_Driver_ID'],$custom_document[0]['cd_Form_Name_ID']);
        $layout->scans = $scans;
        $layout->customDocument = $custom_document;
        $layout->cd_Driver_ID = $cd_Driver_ID;
        $layout->formStatusList = $formStatusList->getList();
        $layout->faxStatusList = $faxStatusList->getList();
        $layout->companyList = $companyList;
        echo $layout->render();

    }
    # save document
    public function saveDocumentAction(){

        $data = array();
        $data['cd_ID'] = $_REQUEST['cd_ID'];
        $data['cd_Driver_ID'] = $_REQUEST['cd_Driver_ID'];
        $data['cd_Form_Name_ID'] = $_REQUEST['cd_Form_Name_ID'];
        if(preg_match("/^[0-9]+$/",$_REQUEST['cd_Company_ID'])){$data['cd_Company_ID'] = $_REQUEST['cd_Company_ID'];}
        if(preg_match("/^[0-9]+$/",$_REQUEST['cd_Homebase_ID'])){$data['cd_Homebase_ID'] = $_REQUEST['cd_Homebase_ID'];}
        $data['cd_Description'] = $_REQUEST['cd_Description'];
        $data['cd_Fax_Status_id'] = $_REQUEST['cd_Fax_Status_id'];
        $data['cd_Document_Form_Status'] = $_REQUEST['cd_Document_Form_Status'];
        $data['cd_DOT_Regulated'] = $_REQUEST['cd_DOT_Regulated'];
        $data['cd_Current_Page'] = $_REQUEST['cd_Current_Page'];

        $msg = "";

        # Scan rotation status 0 = no changes | 1 = success | 2 = some error
        $scanRotatedSuccess = 0;
        

        if(preg_match("/[0-9]+/",$data['cd_ID'])==0){$msg=$msg."<div><span style='color:red;'>FATAL ERROR:</span>Document ID losted!</div>";}
        if(preg_match("/[0-9]+/",$data['cd_Driver_ID'])==0){$msg=$msg."<div><span style='color:red;'>FATAL ERROR:</span>Driver ID losted!</div>";}
        if(preg_match("/[0-9]+/",($data['cd_Form_Name_ID'])==0)){$msg=$msg."<div><span style='color:red;'>FATAL ERROR:</span>Document Form ID losted!</div>";}
        if(preg_match("/[0-9]+/",$data['cd_Fax_Status_id'])==0){$msg=$msg."<div><span style='color:red;'>ERROR:</span>Please, select <strong>Fax Status</strong>!</div>";}
        if(preg_match("/[0-9]+/",$data['cd_Document_Form_Status'])==0){$msg=$msg."<div><span style='color:red;'>ERROR:</span>Please, select <strong>Document Form Status</strong>!</div>";}
        if((strtolower($data['cd_DOT_Regulated'])!="no") && (strtolower($data['cd_DOT_Regulated'])!="yes")){$msg=$msg."<div><span style='color:red;'>ERROR:</span>Please, select <strong>DOT Regulated</strong>!</div>";}
        if(preg_match("/^[0-9]+$/",$data['cd_Current_Page'])==0){$msg=$msg."<div><span style='color:red;'>ERROR:</span>Please, specify correct <strong>Page #</strong>!</div>";}
        elseif($data['cd_Current_Page']<=0 || $data['cd_Current_Page']>255){$msg=$msg."<div><span style='color:red;'>ERROR:</span><strong>Page #</strong> can't be less than 1 and bigger 255!</div>";}

        if($msg!=""){
            echo $msg;
        }else{
            if($_REQUEST['cd_Scan_Rotated']!=""){
                    $documents_folder = "documents/dqf/driver_" . $data['cd_Driver_ID'] . "/document_form_" . $data['cd_Form_Name_ID'] . "/";
                    $img_origin = preg_replace("/\?[0-9]+$/","",$_REQUEST['cd_Scan_Origin']);
                    $img_rotated = preg_replace("/^\//","",$_REQUEST['cd_Scan_Rotated']);
                    $img_rotated = preg_replace("/\?[0-9]+$/","",$img_rotated);
                    # Attempt make backup copy of original file:
                    try{
                        if (!copy($documents_folder.$img_origin, $documents_folder.$img_origin.".backup")) {
                            $msg = $msg . "<div><span style='color:red;'>FATAL ERROR:</span>Failed to backup <strong>".$documents_folder.$img_origin."</strong> !</div>";
                        }else{
                            # Attempt to remove original file:
                            if(!unlink ($documents_folder.$img_origin)){
                                $msg = $msg . "<div><span style='color:red;'>FATAL ERROR:</span>Failed to remove origin file <strong>".$documents_folder.$img_origin."</strong> !</div>";
                            }else{
                                # Attempt to copy modified file instead of deleted original:
                                if(!copy($img_rotated, $documents_folder.$img_origin)){
                                    $msg = $msg . "<div><span style='color:red;'>FATAL ERROR:</span>Failed to remove origin file <strong>".$documents_folder.$img_origin."</strong> !</div>";
                                    # Attempt to restore backup of origin file
                                    $scanRotatedSuccess = 2;
                                    copy($documents_folder.$img_origin, str_replace(".backup","",$documents_folder.$img_origin));
                                }else{
                                    $scanRotatedSuccess = 1;
                                }
                            }
                        }
                    }catch(Exception $e){//
                    }
                }
                if($msg==""){}
                    else{echo $msg;}
            Documents_Model_CustomDocument::updateRecord($data);
            echo 1;
        }
        
    }


    # clear temporary files after scan rotation
    public function clearTempRotatedImagesFolderAction(){
        $cd_Driver_ID = $_GET['cd_Driver_ID'];
        $cd_Form_Name_ID = $_GET['cd_Form_Name_ID'];
        $fld = 'documents/_tmp/rotated_images/';

        $msg="";
        $hdl=opendir($fld);
        while ($file = readdir($hdl))
        {
            if (($file!=".")&&($file!=".."))
            {
                if (is_file($fld.$file)==True)
                {
                    if(preg_match("/dID".$cd_Driver_ID."+_dfnID".$cd_Form_Name_ID."/",$file)==1){
                        try{
                            unlink ($fld.$file);
                        }catch(Exeption $e){
                            $msg = $msg. "Can't unlink file ".$file." !!11 [ ".date("Y-m-d H:i:s")." ] <br/>";
                        }
                    }
                }
            }
            if($msg==""){/*
                if($_REQUEST['cd_Scan_Rotated']!=""){
                    $documents_folder = "documents/dqf/driver_" . $data['cd_Driver_ID'] . "/document_form_" . $data['cd_Form_Name_ID'] . "/";
                    $img_origin = preg_replace("/\?[0-9]+$/","",$_REQUEST['cd_Scan_Origin']);
                    $img_rotated = preg_replace("/^\//","",$_REQUEST['cd_Scan_Rotated']);
                    $img_rotated = preg_replace("/\?[0-9]+$/","",$img_rotated);
                    # Attempt make backup copy of original file:
                    try{
                        if (!copy($documents_folder.$img_origin, $documents_folder.$img_origin.".backup")) {
                            $msg = $msg . "<div><span style='color:red;'>FATAL ERROR:</span>Failed to backup <strong>".$documents_folder.$img_origin."</strong> !</div>";
                        }else{
                            # Attempt to remove original file:
                            if(!unlink ($documents_folder.$img_origin)){
                                $msg = $msg . "<div><span style='color:red;'>FATAL ERROR:</span>Failed to remove origin file <strong>".$documents_folder.$img_origin."</strong> !</div>";
                            }else{
                                # Attempt to copy modified file instead of deleted original:
                                if(!copy($img_rotated, $documents_folder.$img_origin)){
                                    $msg = $msg . "<div><span style='color:red;'>FATAL ERROR:</span>Failed to remove origin file <strong>".$documents_folder.$img_origin."</strong> !</div>";
                                    # Attempt to restore backup of origin file
                                    $scanRotatedSuccess = 2;
                                    copy($documents_folder.$img_origin, str_replace(".backup","",$documents_folder.$img_origin));
                                }else{
                                    $scanRotatedSuccess = 1;
                                }
                            }
                        }
                    }catch(Exception $e){//
                    }
                }
                if($msg==""){echo 1;}
                    else{echo $msg;}*/
            }else{

                echo $msg;
            }
        }
        //TODO: сделать логирование ошибок и отправку на мыло одмину
        closedir($hdl);

    }



}







