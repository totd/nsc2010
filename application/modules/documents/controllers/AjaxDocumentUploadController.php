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
    
}







