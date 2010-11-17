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

        $permission = new Permission_Model_Permission();

        // add the roles
        $roles = $permission->getRoles();
        foreach ($roles as $role) {
            $acl->addRole(new Zend_Acl_Role($role));
        }


        // add the resources
        $resources = $permission->getAllResources();
        foreach ($resources as $resource) {
            if (isset($resource['module'])) {
                $acl->add(new Zend_Acl_Resource($resource['resource']), $resource['module']);
            } else {
                $acl->add(new Zend_Acl_Resource($resource['resource']));
            }
        }

        // set up the access rules
        $permissionMatrix = $permission->getList();
        foreach ($permissionMatrix as $role => $value) {
            $resources = array();
            foreach ($value['resources'] as $resource) {
                $resources[] = $resource['resource'];
                if (isset ($resource['action'])) {
                    $actions[] = $resource['action'];
                }
            }
            if (isset ($actions) && count($actions)) {
                $acl->allow($role, $resources, $actions);
            } else {
                $acl->allow($role, $resources);
            }
        }

        // fetch the current user
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $identity = $auth->getIdentity();
            $role = $identity->vau_role;
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
