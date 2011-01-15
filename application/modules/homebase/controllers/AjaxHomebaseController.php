<?php

class Homebase_AjaxHomebaseController extends Zend_Controller_Action
{

    public function init()
    {
        $this->_helper->viewRenderer->setNoRender();
        $this->_helper->layout()->disableLayout();

        $this->auth = Zend_Auth::getInstance();

        if ($this->auth->hasIdentity()) {
            $this->view->identity = $this->auth->getIdentity();
        }
    }

    public function getHomebaseListAction()
    {

        $h_Company_Account_Number = $_REQUEST['h_Company_Account_Number'];
        $homebaseList = Homebase_Model_Homebase::getHomebaseList($h_Company_Account_Number,1);
        $options="";
        if(sizeof($homebaseList)>0){
            foreach($homebaseList as $k => $v)
            {
                $options=$options."<option label='".$v['h_Name']."' value='".$v['h_id']."' >".$v['h_Name'].", ".$v['s_name']."</option>";
            }
        }else{
             $options=$options."";
        }
        echo $options;
    }

}