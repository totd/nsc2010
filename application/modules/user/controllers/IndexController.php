<?php
/**
 * @author Andryi Ilnytskiy 23.10.2010
 *
 * Default controller of the user module.
 */
class User_IndexController extends Zend_Controller_Action
{

    public function init()
    {

    }

    /**
     * @author Andryi Ilnytskiy 23.10.2010
     *
     * Deafault action.
     */
    public function indexAction()
    {
         // Fetch the current instance of Zend_Auth
        $auth = Zend_Auth::getInstance();

        // Check whether an identity is set.
        if ($auth->hasIdentity()) {
            $this->view->identity = $auth->getIdentity();
        }
    }
}

