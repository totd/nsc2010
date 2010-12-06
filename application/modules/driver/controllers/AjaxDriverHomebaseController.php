<?php
class Driver_AjaxDriverHomebaseController extends Zend_Controller_Action
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

    public function getDepotListAction()
    {
        
        $id = $_REQUEST['id'];
        $depotList = Depot_Model_Depot::getDepotList($id,1);
        $options="";
        if(sizeof($depotList)>0){
            foreach($depotList as $k => $v)
            {
                $options=$options."<option label='".$v['dp_Name']."' value='".$k."' >".$v['dp_Name']."</option>";
            }
        }else{
             $options=$options."";
        }
        echo $options;
    }


}





