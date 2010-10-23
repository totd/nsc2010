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
        $acl->addRole(new Zend_Acl_Role('guest'));
        $acl->addRole(new Zend_Acl_Role('user'), 'guest');
        $acl->addRole(new Zend_Acl_Role('administrator'), 'user');

        // add the resources
        $acl->add(new Zend_Acl_Resource('index'));
        $acl->add(new Zend_Acl_Resource('error'));
        $acl->add(new Zend_Acl_Resource('user'));

        // set up the access rules
        $acl->allow(null, array('index', 'error'));
        // a guest can only read content and login
        $acl->allow('guest', 'user', array('login'));

        // users can also see users list
        $acl->allow('user', 'user', array('list'));
        $acl->allow('user', 'user', array('logout'));
        
        // administrators can do anything
        $acl->allow('administrator', null);

        // fetch the current user
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $identity = $auth->getIdentity();
            $role = strtolower($identity->role);
        } else {
            $role = 'guest';
        }
        $controller = $request->controller;
        $action = $request->action;
        if (!$acl->isAllowed($role, $controller, $action)) {
            if ($role == 'guest') {
                $request->setControllerName('user');
                $request->setActionName('login');
            } else {
                $request->setControllerName('error');
                $request->setActionName('noauth');
            }
        }
    }
}
