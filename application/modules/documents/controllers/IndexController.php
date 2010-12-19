<?php

class Documents_IndexController extends Zend_Controller_Action
{

    var $auth;

    public function init()
    {
        $this->auth = Zend_Auth::getInstance();
        if ($this->auth->hasIdentity()) {
            $this->view->identity = $this->auth->getIdentity();
        }else{
            return $this->_redirect('user/login');
        }
    }

    public function indexAction()
    {
        
    }



}







