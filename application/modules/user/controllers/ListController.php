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
        /* Initialize action controller here */
    }

    /**
     * @author Andryi Ilnytskyi 25-10-2010.
     * 
     * Default action.
     */
    public function indexAction()
    {
        # Breadcrumbs goes here:
        $this->view->breadcrumbs = "<a href='#'>Archives</a>&nbsp;&gt;&nbsp;User Profile";
        
        $currentUsers = User_Model_User::getUsers();
        if ($currentUsers->count() > 0) {
            $this->view->users = $currentUsers;
        } else {
            $this->view->users = null;
        }

        // Check whether the user has permission to create users.
        $display_create_link = false;

        $auth = Zend_Auth::getInstance();

        if ($auth->hasIdentity()) {
            $this->identity = $auth->getIdentity();

            $permission = new Permission_Model_Permission();
            if ($permission->doesRoleHaveResource($this->identity->vau_role, 'user/create')) {
                $display_create_link = true;
            }
        }

        $this->view->display_create_link = $display_create_link;

        
    }


}