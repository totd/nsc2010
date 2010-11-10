<?php

class Company_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // Fetch the current instance of Zend_Auth
        $auth = Zend_Auth::getInstance();

        // Check whether an identity is set.
        if ($auth->hasIdentity()!=null) {
            $this->view->identity = $auth->getIdentity();

            $modelCompany = new company_Model_Company();
            $listOfCompanies = $modelCompany->getCompanyList();
            if (sizeof($listOfCompanies) > 0) {
                $this->view->listOfCompanies = $listOfCompanies;
            } else {
                $this->view->listOfCompanies = null;
            }

            //$partial = array('partial/_Header.phtml', 'default');
            //$this->view->navigation()->menu()->setPartial($partial);
                      
        }else{
            return $this->_redirect('system/error/session-closed');
        }
    }


}

