<?php

class Company_CompanyController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function viewCompanyAction()
    {
        // action body
    }

    public function editCompanyAction()
    {        $auth = Zend_Auth::getInstance();

        if ($auth->hasIdentity()!=null) {
            $this->view->identity = $auth->getIdentity();

            $companyId = (int)$this->_request->getParam('id');
            $modelCompany = new company_Model_Company();
            $companyData = $modelCompany->getCompany($companyId);
            if (sizeof($companyData) > 0) {
                $this->view->companyData = $companyData;
            } else {
                $this->view->companyData = null;
            }

            //$partial = array('partial/_Header.phtml', 'default');
            //$this->view->navigation()->menu()->setPartial($partial);


        }else{
            return $this->_redirect('system/error/session-closed');
        }
    }


}





