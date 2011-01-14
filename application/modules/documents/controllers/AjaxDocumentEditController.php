<?php

class Documents_AjaxDocumentEditController extends Zend_Controller_Action
{

    var $auth;

    public function init()
    {
        $this->auth = Zend_Auth::getInstance();
        if ($this->auth->hasIdentity()) {
            $this->view->identity = $this->auth->getIdentity();
        }else{
            return $this->_redirect('user/login');
        }

        
        $this->_helper->viewRenderer->setNoRender();
        $this->_helper->layout()->disableLayout();
    }

    # get document's edit form
    public function getEditDocumentFormAction(){

        $cd_ID = $_REQUEST['cd_ID'];
        $cd_Driver_ID = $_REQUEST['cd_Driver_ID'];
        $custom_document = Documents_Model_CustomDocument::getRecord($cd_ID);
        $formStatusList = new Documents_Model_CustomDocumentFormStatus();
        $faxStatusList = new Documents_Model_CustomDocumentFaxStatus();


        $layout = new Zend_Layout();
        $layout->setLayoutPath(APPLICATION_PATH.'/modules/documents/views/scripts/ajax/');
        $layout->setLayout('get-edit-document-form');
        $layout->customDocument = $custom_document;
        $layout->cd_Driver_ID = $cd_Driver_ID;
        $layout->formStatusList = $formStatusList->getList();
        $layout->faxStatusList = $faxStatusList->getList();
        echo $layout->render();

    }
    # save document
    public function saveDocumentAction(){

        $data = array();
        $data['cd_ID'] = $_REQUEST['cd_ID'];
        $data['cd_Driver_ID'] = $_REQUEST['cd_Driver_ID'];
        $data['cd_Form_Name_ID'] = $_REQUEST['cd_Form_Name_ID'];
        $data['cd_Description'] = $_REQUEST['cd_Description'];
        $data['cd_Fax_Status_id'] = $_REQUEST['cd_Fax_Status_id'];
        $data['cd_Document_Form_Status'] = $_REQUEST['cd_Document_Form_Status'];
        $data['cd_DOT_Regulated'] = $_REQUEST['cd_DOT_Regulated'];
        $data['cd_Current_Page'] = $_REQUEST['cd_Current_Page'];

        $msg = "";

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
            Documents_Model_CustomDocument::updateRecord($data);
            echo 1;
        }
        /*
        $custom_document = Documents_Model_CustomDocument::getRecord($cd_ID);
        $formStatusList = new Documents_Model_CustomDocumentFormStatus();
        $faxStatusList = new Documents_Model_CustomDocumentFaxStatus();


        $layout = new Zend_Layout();
        $layout->setLayoutPath(APPLICATION_PATH.'/modules/documents/views/scripts/ajax/');
        $layout->setLayout('get-edit-document-form');
        $layout->customDocument = $custom_document;
        $layout->cd_Driver_ID = $cd_Driver_ID;
        $layout->formStatusList = $formStatusList->getList();
        $layout->faxStatusList = $faxStatusList->getList();
        echo $layout->render();
*/
    }
    # save document
    public function documentImageRotateAction(){
        //TODO: добавить обработку расширений и вынести нахрен в AJAX
        //TODO: сделать прозрачным фон
        print_r($_GET);
        $filename = $_GET['img'];

        //$filename = "/images/nologo.png";
        $degrees = $_GET['angle'];
        $source = imagecreatefrompng($filename);
        $rotate = imagerotate($source, $degrees, IMG_COLOR_TRANSPARENT);
        header('Content-type: image/png');
        // Output
        imagepng($rotate);
         
    }

    # clear temporary files after scan rotation
    public function clearTempRotatedImagesFolderAction(){
        $cd_Driver_ID = $_GET['cd_Driver_ID'];
        $cd_Form_Name_ID = $_GET['cd_Form_Name_ID'];
        $fld = "/documents/_tmp/rotated_images/";
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
            if($msg==""){
               echo 1;
            }else{
                echo $msg;
            }
        }
        //TODO: сделать логирование ошибок и отправку на мыло одмину
        closedir($hdl);

    }



}







