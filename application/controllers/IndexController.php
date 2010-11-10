<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
    }

    public function indexAction()
    {
        // Fetch the current instance of Zend_Auth
        $auth = Zend_Auth::getInstance();

        // Check whether an identity is set.
        if (!$auth->hasIdentity()) {
            // TODO Implement a forwarding or redirecting to the needed action.
            return $this->_forward('index', 'index', 'user');
            //return $this->_redirect('user/index');
        }
    }


}

