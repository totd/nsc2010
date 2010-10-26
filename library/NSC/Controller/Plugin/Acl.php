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

        $acl->addRole(new Zend_Acl_Role('EXTERNAL_USERS_Auditor'), 'Guest'); // Read Only
        $acl->addRole(new Zend_Acl_Role('EXTERNAL_USERS_Insurance'), 'Guest'); // Read Only
        $acl->addRole(new Zend_Acl_Role('CUSTOMER_USERS_Level_3'), 'Guest'); // Office
        $acl->addRole(new Zend_Acl_Role('CUSTOMER_USERS_Level_2'), 'CUSTOMER_USERS_Level_3'); // System Manager
        $acl->addRole(new Zend_Acl_Role('CUSTOMER_USERS_Level_1'), 'CUSTOMER_USERS_Level_2'); // Super Administrator
        $acl->addRole(new Zend_Acl_Role('NSC_USERS_Level_4'), 'Guest'); // Office (Clerical, Temp or In the Field)
        $acl->addRole(new Zend_Acl_Role('NSC_USERS_Level_3'), 'Guest'); // Employee (Trained)
        $acl->addRole(new Zend_Acl_Role('NSC_USERS_Level_2'), 'NSC_USERS_Level_3'); // Manager
        $acl->addRole(new Zend_Acl_Role('NSC_USERS_Level_1'), 'NSC_USERS_Level_2'); // CEO, GM, Operations Manager


        // add the resources
        $acl->add(new Zend_Acl_Resource('index'));
        $acl->add(new Zend_Acl_Resource('error'));
//        $acl->add(new Zend_Acl_Resource('default'));
        $acl->add(new Zend_Acl_Resource('user'))
                ->add(new Zend_Acl_Resource('user:index'), 'user')
                ->add(new Zend_Acl_Resource('user:login'), 'user')
                ->add(new Zend_Acl_Resource('user:create'), 'user')
                ->add(new Zend_Acl_Resource('user:logout'), 'user')
                ->add(new Zend_Acl_Resource('user:list'), 'user');

        // set up the access rules
        $acl->allow(null, array('index', 'error'));
        // a guest can only read content and login
        $acl->allow('Guest', array('user:login', 'user:index'));

        // users logout permissions
        $acl->allow(array(
                        'CUSTOMER_USERS_Level_3',
                        'NSC_USERS_Level_4',
                        'NSC_USERS_Level_3',
                        'EXTERNAL_USERS_Auditor',
                        'EXTERNAL_USERS_Insurance'
                    ),
                    array(
                        'user:logout',
                        'user:list'
                    )
        );


        // users CRUD operations
        $acl->allow(array(
                        'CUSTOMER_USERS_Level_2',
                        'CUSTOMER_USERS_Level_1',
                        'NSC_USERS_Level_2',
                    ),
                    'user:create'
        );



        // administrators can do anything
        $acl->allow('NSC_USERS_Level_1', null);

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

        $module = (empty($request->module)) ? "default" : $request->module;

        $resource = $module . ":" . $controller;

        if (!$acl->has($resource)) {
            $resource = $module;
        }

        try {
            if (!$acl->isAllowed($role, $resource, $action)) {
                if ($role == 'Guest') {
                    $request->setModuleName('user');
                    $request->setControllerName('login');
                    $request->setActionName('index');
                } else {
                    $request->setControllerName('error');
                    $request->setActionName('noauth');
                }
            }
        } catch (Exception $e) {

        }
    }

}
