<?php

/**
 * @author Andryi Ilnytskiy 23.10.2010
 * 
 * Class of the Acl plugin.
 */
class NSC_Controller_Plugin_Acl extends Zend_Controller_Plugin_Abstract
{

    /**
     * @author Andryi Ilnytskiy 23.10.2010
     *
     * Validate the user’s permissions after the request has been processed
     * but before it is  dispatched
     *
     * @param Zend_Controller_Request_Abstract $request
     */
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        // set up acl
        $acl = new Zend_Acl();

        // add the roles
        $acl->addRole(new Zend_Acl_Role('Guest'));
        $acl->addRole(new Zend_Acl_Role('HomeBase'), 'Guest');
        $acl->addRole(new Zend_Acl_Role('CompanyUser'), 'HomeBase');
        $acl->addRole(new Zend_Acl_Role('NSC'), 'CompanyUser');

        // add the resources
        $acl->add(new Zend_Acl_Resource('index'));
        $acl->add(new Zend_Acl_Resource('error'));
        $acl->add(new Zend_Acl_Resource('user'));

        // set up the access rules
        $acl->allow(null, array('index', 'error'));
        // a guest can only read content and login
        $acl->allow('Guest', 'user', array('login'));

        // users can also see users list
        $acl->allow('HomeBase', 'user', array('list', 'logout', 'index'));
                
        // administrators can do anything
        $acl->allow('NSC', null);

        // fetch the current user
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $identity = $auth->getIdentity();
            $role = $identity->UserType;
        } else {
            $role = 'Guest';
        }
        $controller = $request->controller;
        $action = $request->action;
        if (!$acl->isAllowed($role, $controller, $action)) {
            if ($role == 'Guest') {
                $request->setControllerName('user');
                $request->setActionName('login');
            } else {
                $request->setControllerName('error');
                $request->setActionName('noauth');
            }
        }
    }
}
