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
     * @author Andryi Ilnytskyi 25-10.-2010.
     * 
     * Default action.
     */
    public function indexAction()
    {
        $currentUsers = User_Model_User::getUsers();
        if ($currentUsers->count() > 0) {
            $this->view->users = $currentUsers;
        } else {
            $this->view->users = null;
        }

        // TODO implement hiden CreteUser link if user hasn't permission
        $this->view->display_create_link = true;

        # Breadcrumbs goes here:
        $this->view->breadcrumbs = "<a href='#'>Archives</a>&nbsp;&gt;&nbsp;User Profile";

        //$partial = array('partial/_Header.phtml', 'default');
        //$this->view->navigation()->menu()->setPartial($partial);
    }


}

