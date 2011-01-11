<?php

class Documents_AjaxDocumentUploadController extends Zend_Controller_Action
{

    var $auth;

    public function init()
    {
        //Turn off autorender of templites
        $this->_helper->viewRenderer->setNoRender();
        // turn of templites
        $this->_helper->layout()->disableLayout(); 
    }

    # Upload file to temp folder
    public function preUploadAction()
    {
        $uploaddir = 'documents/_tmp/uploads/';
        
        if ((($_FILES['uploadfile']["type"] == "image/tiff")
                || ($_FILES['uploadfile']["type"] == "image/jpeg"))
                && ($_FILES['uploadfile']["size"] < 2097152)) {
            if ($_FILES['uploadfile']["error"] > 0) {
//                throw new Exception("Return Code: " . $_FILES[$fieldName]["error"] . "<br />");
                return null;
            } else {
                $extension = end(explode(".", $_FILES['uploadfile']['name']));

                $currentDate = new Zend_Date();
                $strDate = $currentDate->toString("dd") . "_" .
                        $currentDate->toString("MM") . "_" .
                        $currentDate->toString("YYYY") . "_" .
                        $currentDate->toString("HH") . "_" .
                        $currentDate->toString("mm") . "_" .
                        $currentDate->toString("ss");
                $randomVal = rand(0, 9999);
                $storeName = $strDate . "_" . $randomVal;
                if (!empty($extension)) {
                    $storeName .= ".$extension";
                }

                if (file_exists($uploaddir . $storeName)) {
//                    throw new Exception("$storeName already exists. ");
                    return null;
                } else {
                    $result = move_uploaded_file($_FILES['uploadfile']["tmp_name"],
                                    $uploaddir . $storeName);
                    if ($result) {
                        echo $storeName;
                    } else {
                        echo $storeName;
                    }
                }
            }
        } else {
            return null;
        }
    }

    # assign uploaded file to driver in database
    public function attacheImageDocumentAction(){
        $msg="";
        if(preg_match("/^[0-9]+$/",$_GET['cd_Driver_ID'])!=0){
            $msg=$msg."<div><span style='color:red;'>FATAL ERROR:</span> Driver's ID is losted!</div>";}
        if(preg_match("/^[0-9]+$/",$_GET['cd_Form_Name_ID'])==0){
            $msg=$msg."<div><span style='color:red;'>FATAL ERROR:</span> Document's Type ID is losted!</div>";}
        if($_GET['cd_Scan']==""){
            $msg=$msg."<div><span style='color:red;'>FATAL ERROR:</span> Can't find uploaded picture!</div>";}
        if($msg==""){
            echo 0;
        }else{
            $image_dir = "documents/dqf/driver_".$_GET['cd_Driver_ID']."/document_form_".$_GET['cd_Form_Name_ID']."/";
            if (file_exists($image_dir)==1) {
                $result = copy("documents/_tmp/uploads/".$_GET['cd_Scan'],$image_dir . $_GET['cd_Scan']);
                if (!$result){
                    echo "can not move: documents/_tmp/uploads/".$_GET['cd_Scan'] . " TO " . $image_dir . $_GET['cd_Scan'];
                }
                $result = unlink("documents/_tmp/uploads/".$_GET['cd_Scan']);
                if (!$result){
                    echo "can not move: documents/_tmp/uploads/".$_GET['cd_Scan'] . " TO " . $image_dir . $_GET['cd_Scan'];
                }
            } else {
                if(mkdir($image_dir,777,true)){
                    $result = copy("documents/_tmp/uploads/".$_GET['cd_Scan'],$image_dir . $_GET['cd_Scan']);
                    if (!$result){
                        echo "can not move: documents/_tmp/uploads/".$_GET['cd_Scan'] . " TO " . $image_dir . $_GET['cd_Scan'];
                    }
                    $result = unlink("documents/_tmp/uploads/".$_GET['cd_Scan']);
                    if (!$result){
                        echo "can not move: documents/_tmp/uploads/".$_GET['cd_Scan'] . " TO " . $image_dir . $_GET['cd_Scan'];
                    }
                }
            }
            $data=array();
            $data['cd_Driver_ID'] = $_GET['cd_Driver_ID'];
            $data['cd_Form_Name_ID'] = $_GET['cd_Form_Name_ID'];
            $data['cd_Scan'] = $_GET['cd_Scan'];
            $data['cd_Date_Requested'] = date("Y-m-d");
            $data['cd_Date_Completed'] = date("Y-m-d");
            $data['cd_Current_Page'] = $_GET['cd_Current_Page'];
            Documents_Model_CustomDocument::createRecord($data);
            echo 1;
        }

    }

    # delete uploaded file from Database and File System
    public function deleteImageDocumentAction(){

        $image = "documents/dqf/driver_".$_GET['cd_Driver_ID']."/document_form_".$_GET['cd_Form_Name_ID']."/" . $_GET['cd_Scan'];
        if (file_exists($image)==1) {
            $result = unlink($image);
            if (!$result){
                echo "can not remove: " . $image ;
            }
        } else {
                echo "can not find : " . $image;
        }
        $data=array();
        $data['cd_Driver_ID'] = $_GET['cd_Driver_ID'];
        $data['cd_Form_Name_ID'] = $_GET['cd_Form_Name_ID'];
        $data['cd_Scan'] = $_GET['cd_Scan'];
        
        Documents_Model_CustomDocument::deleteRecord($data);
        echo 1;
    }
    
    
}







