<?php
class Driver_AjaxDriverPreviousEmploymentController extends Zend_Controller_Action
{
    public function init()
    {
        //Turn off autorender of templites
        $this->_helper->viewRenderer->setNoRender();
        // turn of templites
        $this->_helper->layout()->disableLayout();
    }

    public function indexAction()
    {
        // action body
    }

    public function getPreviousEmploymentListAction()
    {
        $dpe_Driver_ID = $_REQUEST['dpe_Driver_ID'];
        $arr = new Driver_Model_DriverPreviousEmployment();
        $stateList = State_Model_State::getList();

        $layout = new Zend_Layout();
        $layout->setLayoutPath(APPLICATION_PATH.'/modules/driver/views/scripts/ajax/previous-employment/');
        $layout->setLayout('get-previous-employment-list');
        $layout->driverEmploymentHistoryList = $arr->getList($dpe_Driver_ID);
        $layout->stateList = $stateList;
        echo $layout->render();
    }

    public function addRecordAction()
    {
        $dpe_Driver_ID = $_REQUEST['dpe_Driver_ID'];
        $dpe_Employer_ID = $_REQUEST['dpe_Employer_ID'];
        $dpe_Position = $_REQUEST['dpe_Position'];
        $dpe_Salary = $_REQUEST['dpe_Salary'];
        $dpe_Employment_Start_Date = $_REQUEST['dpe_Employment_Start_Date'];
        $dpe_Employment_Stop_Date = $_REQUEST['dpe_Employment_Stop_Date'];
        $dpe_Reason_for_Leaving = $_REQUEST['dpe_Reason_for_Leaving'];


        $errors=0;
        $msg = "";
        if((int)$dpe_Driver_ID==null){
            $errors++;
            $msg=$msg."Driver ID losted.<br/>";}
        if($dpe_Employer_ID==null){
            $errors++;
            $msg=$msg."Please, fill Employer!<br/>";}
        if($dpe_Position==null){
            $errors++;
            $msg=$msg."Please, fill Job Description!<br/>";}
        if($dpe_Salary==null){
            $errors++;
            $msg=$msg."Please, fill Salary!<br/>";}
        if($dpe_Reason_for_Leaving==null){
            $errors++;
            $msg=$msg."Please, fill Reason fro leaving!<br/>";}
        if($dpe_Employment_Start_Date==null){
            $errors++;
            $msg=$msg."Please select From Date!<br/>";
        }elseif(preg_match("/[\d]{2}\/[\d]{2}\/[\d]{4}/",$dpe_Employment_Start_Date)==0){
            $errors++;
            $msg=$msg."Please, select correct From Date (mm/dd/yyyy)!<br/>";}
        if($dpe_Employment_Stop_Date==null){
            $errors++;
            $msg=$msg."Please select To Date!<br/>";
        }elseif(preg_match("/[\d]{2}\/[\d]{2}\/[\d]{4}/",$dpe_Employment_Stop_Date)==0){
            $errors++;
            $msg=$msg."Please, select correct To Date (mm/dd/yyyy)!<br/>";}
        if($errors>0){
            echo $msg;
        }else{
            $data=array();
            $data['dpe_Driver_ID']=$dpe_Driver_ID;
            $data['dpe_Employer_ID']=$dpe_Employer_ID;
            $data['dpe_Position']=$dpe_Position;
            $data['dpe_Salary']=$dpe_Salary;
            $data['dpe_Reason_for_Leaving']=$dpe_Reason_for_Leaving;

            $date = new Zend_Date($dpe_Employment_Start_Date,"MM/dd/YYYY");
            $data['dpe_Employment_Start_Date'] =  $date->toString("YYYY-MM-dd");
            if($dpe_Employment_Stop_Date!=""){
                $date = new Zend_Date($dpe_Employment_Stop_Date,"MM/dd/YYYY");
                $data['dpe_Employment_Stop_Date'] =  $date->toString("YYYY-MM-dd");
            }else{
                $data['dpe_Employment_Stop_Date']= null;
            }

            Driver_Model_DriverPreviousEmployment::createRecord($data);
            echo 1;
        }
    }
    public function deleteRecordAction()

    {
        $dpe_ID = $_REQUEST['dpe_ID'];
        Driver_Model_DriverPreviousEmployment::deleteRecord($dpe_ID);
    }

    public function getRecordAction()
    {
        $pe_ID = $_REQUEST['pe_ID'];
        $arr = new Driver_Model_DriverPreviousEmployment();
        $stateList = State_Model_State::getList();
        $layout = new Zend_Layout();
        $layout->setLayoutPath(APPLICATION_PATH.'/modules/driver/views/scripts/ajax/previous-employment/');
        $layout->setLayout('get-record');
        $layout->driverEmploymentHistoryRecord = $arr->getRecord($pe_ID);
        $layout->stateList = $stateList;
        echo $layout->render();
    }

    public function updateRecordAction()
    {
        $pe_Driver_ID = $_REQUEST['pe_Driver_ID'];
        $pe_Employer_Name = $_REQUEST['pe_Employer_Name'];
        $pe_Address1 = $_REQUEST['pe_Address1'];
        $pe_City = $_REQUEST['pe_City'];
        $pe_State = $_REQUEST['pe_State'];
        $pe_Postal_Code = $_REQUEST['pe_Postal_Code'];
        $pe_Phone = $_REQUEST['pe_Phone'];
        $pe_Fax = $_REQUEST['pe_Fax'];
        $pe_Position = $_REQUEST['pe_Position'];
        $pe_Employment_Start_Date = $_REQUEST['pe_Employment_Start_Date'];
        $pe_Employment_Stop_Date = $_REQUEST['pe_Employment_Stop_Date'];
        $pe_Reason_for_Leaving = $_REQUEST['pe_Reason_for_Leaving'];
        $pe_DOT_Safety_Sensitive_Function = $_REQUEST['pe_DOT_Safety_Sensitive_Function'];
        $pe_FMCSR_Regulated = $_REQUEST['pe_FMCSR_Regulated'];/*
        $pe_Interstate = $_REQUEST['pe_Interstate'];
        $pe_Intrastate = $_REQUEST['pe_Intrastate'];
        $pe_Intermodal = $_REQUEST['pe_Intermodal'];*/

        $errors=0;
        $msg = "";
        if((int)$pe_Driver_ID==null){
            $errors++;
            $msg=$msg."Driver ID losted.<br/>";}
        if($pe_Employer_Name==null){
            $errors++;
            $msg=$msg."Please, fill Employer!<br/>";}
        if($pe_Position==null){
            $errors++;
            $msg=$msg."Please, fill Job Description!<br/>";}
        if($pe_Address1==null){
            $errors++;
            $msg=$msg."Please fill Street!<br/>";}
        if($pe_City==null){
            $errors++;
            $msg=$msg."Please fill City.<br/>";
        }elseif(preg_match("/[\s\w\.\-]+/",$pe_City)==0){
            $errors++;
            $msg=$msg."City should contain ONLY Alpha-numeric sybols, and '-.' symbols!<br/>";}
        if($pe_State==null){
            $errors++;
            $msg=$msg."Some error with State field.<br/>";}
        if($pe_Postal_Code==null){
            $errors++;
            $msg=$msg."Please fill Zip!<br/>";
        }elseif(preg_match("/[\d\-]{5,10}/",$pe_Postal_Code)==0){
            $errors++;
            $msg=$msg."Zip should contain ONLY digits! 5 or 10 digits.<br/>";}
        if($pe_Phone==null){
            $errors++;
            $msg=$msg."Please fill Phone!<br/>";}
        $pe_Phone = preg_replace("/[^0-9]+/","",$pe_Phone);
        if(preg_match("/[\d\-\s\(\)]{5,15}/",$pe_Phone)==0){
            $errors++;
            $msg=$msg."Phone should contain ONLY digits! 9 or 10 digits.<br/>";}
        $pe_Fax = preg_replace("/[^0-9]+/","",$pe_Fax);
        if($pe_Employment_Start_Date==null){
            $errors++;
            $msg=$msg."Please select From Date!<br/>";
        }elseif(preg_match("/[\d]{2}\/[\d]{2}\/[\d]{4}/",$pe_Employment_Start_Date)==0){
            $errors++;
            $msg=$msg."Please, select correct From Date (mm/dd/yyyy)!<br/>";} if($pe_Reason_for_Leaving==null){
            $errors++;
            $msg=$msg."Please, fill Reason For Leaving!<br/>";}
        $pe_Fax = preg_replace("/[^0-9]+/","",$pe_Fax);
        if(preg_match("/[\d\-\s\(\)]{5,15}/",$pe_Fax)==0){
            $errors++;
            $msg=$msg."Fax should contain ONLY digits! 9 or 10 digits.<br/>";}
        if($errors>0){
            echo $msg;
        }else{
            $data=array();

            $data['pe_ID']=$_REQUEST['pe_ID'];
            $data['pe_Driver_ID']=$_REQUEST['pe_Driver_ID'];
            $data['pe_Employer_Name']=$_REQUEST['pe_Employer_Name'];
            $data['pe_Address1']=$_REQUEST['pe_Address1'];
            $data['pe_City']=$_REQUEST['pe_City'];
            $data['pe_State']=$_REQUEST['pe_State'];
            $data['pe_Postal_Code']=$_REQUEST['pe_Postal_Code'];
            $data['pe_Phone']=$_REQUEST['pe_Phone'];
            $data['pe_Fax']=$_REQUEST['pe_Fax'];
            $data['pe_Position']=$_REQUEST['pe_Position'];

            $date = new Zend_Date($_REQUEST['pe_Employment_Start_Date'],"MM/dd/YYYY");
            $data['pe_Employment_Start_Date'] =  $date->toString("YYYY-MM-dd");
            if($_REQUEST['pe_Employment_Stop_Date']!=""){
                $date = new Zend_Date($_REQUEST['pe_Employment_Stop_Date'],"MM/dd/YYYY");
                $data['pe_Employment_Stop_Date'] =  $date->toString("YYYY-MM-dd");
            }else{
                $data['pe_Employment_Stop_Date']= null;
            }
            $data['pe_Reason_for_Leaving']=trim($_REQUEST['pe_Reason_for_Leaving']);
            $data['pe_DOT_Safety_Sensitive_Function']=ucwords($_REQUEST['pe_DOT_Safety_Sensitive_Function']);
            $data['pe_FMCSR_Regulated']=ucwords($_REQUEST['pe_FMCSR_Regulated']);/*
            $data['pe_Interstate']=ucwords($_REQUEST['pe_Interstate']);
            $data['pe_Intrastate']=ucwords($_REQUEST['pe_Intrastate']);
            $data['pe_Intermodal']=ucwords($_REQUEST['pe_Intermodal']);*/

            Driver_Model_DriverPreviousEmployment::updateRecord($data);
            echo 1;
        }
    }

    public function autocompleteEmployerAction()
    {
        if($_GET['q']!=""){
            $_GET['q'] = str_replace("'",'"',$_GET['q']);
            $_GET['q'] = addcslashes($_GET['q'],'"');
            $rows = Employer_Model_Employer::getRecordByQuery($_GET['q']);
            if(sizeof($rows)>0){
                $result = "<ul style='width: 319px;'>";
                foreach($rows as $k => $v){
                    $result=$result."<li onclick='select_employer({$v['emp_ID']})'>".str_replace($_GET['q'],"<strong>".$_GET['q']."</strong>",$v['emp_Employer_Name']).', '.$v['emp_City'].', '.$v['s_name'].', '.$v['country_name']."</li>";
                }
                $result=$result."</ul>";
                echo $result;
            }
        }else{echo "";}

    }
    public function getJsonRecordAction()
    {
        $emp_ID = $_REQUEST['emp_ID'];
        $arr = new Employer_Model_Employer();
        $arr->getRecord($emp_ID);
        $json = Zend_Json::encode($arr->getRecord($emp_ID));
        echo $json;
    }

}
