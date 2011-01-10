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
        if($dpe_Employment_Start_Date!="" && $dpe_Employment_Stop_Date!=""){
            $arr1 = explode("/",$dpe_Employment_Start_Date);
            $arr2 = explode("/",$dpe_Employment_Stop_Date);
            $time1 = mktime(0,0,0,$arr1[0],$arr1[1],$arr1[2]);
            $time2 = mktime(0,0,0,$arr2[0],$arr2[1],$arr2[2]);
            if($time1>=$time2){
                $errors++;
                $msg=$msg."Date From shoould be less than date To at least for one day!<br/>";
            }
        }
        if($errors>0){
            echo $msg;
        }else{
            $data=array();
            $data['dpe_Driver_ID']=$dpe_Driver_ID;
            $data['dpe_Employer_ID']=$dpe_Employer_ID;
            $data['dpe_Position']=$dpe_Position;
            $data['dpe_Salary']=$dpe_Salary;
            $data['dpe_Reason_for_Leaving']=$dpe_Reason_for_Leaving;

            $date = new Zend_Date($dpe_Employment_Start_Date,"MM/dd/yyyy");
            $data['dpe_Employment_Start_Date'] =  $date->toString("yyyy-MM-dd");
            if($dpe_Employment_Stop_Date!=""){
                $date = new Zend_Date($dpe_Employment_Stop_Date,"MM/dd/yyyy");
                $data['dpe_Employment_Stop_Date'] =  $date->toString("yyyy-MM-dd");
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
        $dpe_ID = $_REQUEST['dpe_ID'];
        $arr = new Driver_Model_DriverPreviousEmployment();
        $stateList = State_Model_State::getList();
        $layout = new Zend_Layout();
        $layout->setLayoutPath(APPLICATION_PATH.'/modules/driver/views/scripts/ajax/previous-employment/');
        $layout->setLayout('get-record');
        $data = $arr->getRecord($dpe_ID);
        foreach($data as $k => $v){
            #$data[$k]  = str_replace("'",'"',$v);
            $data[$k]  = str_replace("&acute;","'",$v);
        }
        $layout->driverEmploymentHistoryRecord = $data;
        $layout->stateList = $stateList;
        echo $layout->render();
    }

    public function updateRecordAction()
    {
        $dpe_ID = $_REQUEST['dpe_ID'];
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
        if($dpe_Employment_Start_Date!="" && $dpe_Employment_Stop_Date!=""){
            $arr1 = explode("/",$dpe_Employment_Start_Date);
            $arr2 = explode("/",$dpe_Employment_Stop_Date);
            $time1 = mktime(0,0,0,$arr1[0],$arr1[1],$arr1[2]);
            $time2 = mktime(0,0,0,$arr2[0],$arr2[1],$arr2[2]);
            if($time1>=$time2){
                $errors++;
                $msg=$msg."Date From shoould be less than date To at least for one day!<br/>";
            }
        }
        if($errors>0){
            echo $msg;
        }else{
            $data=array();
            $data['dpe_ID']=$dpe_ID;
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
                    $result=$result."<li onclick='select_employer({$v['emp_ID']},\"{$_GET['field']}\")'>".str_replace($_GET['q'],"<strong>".$_GET['q']."</strong>",$v['emp_Employer_Name']).', '.$v['emp_City'].', '.$v['s_name'].', '.$v['country_name']."</li>";
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
        $data = $arr->getRecord($emp_ID);
        foreach($data as $k => $v){
            #$data[$k]  = str_replace("'",'"',$v);
            $data[$k]  = str_replace("&acute;","'",$v);
        }
        $json = Zend_Json::encode($data);
        echo $json;
    }

}
