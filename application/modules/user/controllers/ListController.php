<?php
/**
 * @author Andryi Ilnytskyi 25-10.-2010.
 *
 * Get users list frob DB
 */
class User_ListController extends Zend_Controller_Action
{

    public function init()
    {
        $auth = Zend_Auth::getInstance();

        if ($auth->hasIdentity()) {
            $this->view->identity = $auth->getIdentity();
        }
    }

    /**
     * @author Andryi Ilnytskyi 25-10-2010.
     * 
     * Default action.
     */
    public function indexAction()
    {
        # Breadcrumbs goes here:
        $this->view->breadcrumbs = "<a href='#'>Administration</a>&nbsp;&gt;&nbsp;User Profile";
        
        $currentUsers = User_Model_User::getUsers();
        if ($currentUsers->count() > 0) {
            $this->view->users = $currentUsers;
        } else {
            $this->view->users = null;
        }

    }


}
