<?php

class Driver_IndexController extends Zend_Controller_Action
{

    public function init()
    {

        // Fetch the current instance of Zend_Auth
        $auth = Zend_Auth::getInstance();

        // Check whether an identity is set.
        if ($auth->hasIdentity()) {
            $this->view->identity = $auth->getIdentity();
        }else{
            return $this->_redirect('user/login');
        }
    }

    public function indexAction()
    {
        # returns list of temporary driver accounts
    }

    public function newDriverSearchAction()
    {
        # origin - http://www.driverqualificationonline.com/ProdClient/Application/NewDriverSearch.asp
        # pre-create Driver search. If there no such Driver in DB - offer to create new one.
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $this->view->identity = $auth->getIdentity();

            # load to template Top Menu
            $navigation = array('partial/_Header.phtml', 'default');
            $this->view->navigation()->menu()->setPartial($navigation);

            $NewDriverSearch_form = new driver_Form_NewDriverSearch();
            $NewDriverSearch_form->setAction('/driver/index/new-Driver-Search');
            
            if ($this->_request->isPost() && $NewDriverSearch_form->isValid($_POST)) {
                if(driver_Model_Driver::searchNewDriver($NewDriverSearch_form->getValues())==true)
                {
                    # process creating of new Driver 
                    if($_POST['Driver']='By Driver'){

                    }
                    if($_POST['Driver']='By Administrator'){

                    }
                }elseif(driver_Model_Driver::searchNewDriver($NewDriverSearch_form->getValues())==false){
                    # Show message, that Driver with such SSN exist in DB
                    $d_Driver_SSN = $_POST['$d_Driver_SSN'];
                    $this->view->driver_exist = true;
                    $this->view->d_Driver_SSN = $d_Driver_SSN;
                }else{
                    # something strange occur O_o
                }
            }elseif($this->_request->isPost() && !$NewDriverSearch_form->isValid($_POST)){
                $this->view->systemMessage = "Check information in fields!";

            }else{
                $this->view->form_NewDriverSearch = $NewDriverSearch_form;
            }
        }else{
            return $this->_redirect('user/login');
        }
    }


}



