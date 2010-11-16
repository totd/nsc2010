<?php

class Ajax_HomebaseController extends Zend_Controller_Action
{

    public function init()
    {
        // Turn off autorender of templites
                        $this->_helper->viewRenderer->setNoRender();
                        // turn of templites
                        $this->_helper->layout()->disableLayout();
    }

    public function indexAction()
    {
    }

    public function homebaseAction()
    {
    }

    public function getDepotListAction()
    {
        
        $id = $_REQUEST['id'];
        $homebaseList = Depot_Model_Depot::getDepotList($id,1);
        $options="";
        if(sizeof($homebaseList)>0){
            foreach($homebaseList as $k => $v)
            {
                $options=$options."<option label='".$v['d_Name']."' value='".$k."' >".$v['d_Name']."</option>";
            }
        }else{
             $options=$options."<option value=''>- No Depots Aviable in this Homebase -</option>";
        }
        echo $options;
    }


}





