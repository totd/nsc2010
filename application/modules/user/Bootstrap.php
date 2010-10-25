<?php
class User_Bootstrap extends Zend_Application_Module_Bootstrap
{
	public function _init()
	{
	/** Creating Roles */
require_once APPLICATION_PATH . '/../library/Zend/Acl/Role.php';
		$myAcl = new Zend_Acl();
	    $myAcl->addRole(new Zend_Acl_Role('Guest'));
        $myAcl->addRole(new Zend_Acl_Role('HomeBase'), 'Guest');
        $myAcl->addRole(new Zend_Acl_Role('CompanyUser'), 'HomeBase');
        $myAcl->addRole(new Zend_Acl_Role('NSC'), 'CompanyUser');

/** Creating resources */
require_once APPLICATION_PATH . '/..Zend/Acl/Resource.php';
/** Default module */
$myAcl->add(new Zend_Acl_Resource('index'))
      ->add(new Zend_Acl_Resource('error'))
      ->add(new Zend_Acl_Resource('user'));

/** Admin module */
$myAcl->add(new Zend_Acl_Resource('admin'))
      ->add(new Zend_Acl_Resource('admin:article', 'admin'))
      ->add(new Zend_Acl_Resource('admin:quick-link', 'admin'))
      ->add(new Zend_Acl_Resource('admin:category', 'admin'));

/** Creating permissions */
$myAcl->allow('guest', 'user')
      ->deny('guest', 'article')
      ->allow('guest', 'article', 'view')
      ->allow(array('writer', 'admin'), 'article', array('add', 'edit'))
      ->allow('admin', 'admin');

/** Setting up the front controller */ 
require_once APPLICATION_PATH . '/../..Zend/Controller/Front.php'; 
$front = Zend_Controller_Front::getInstance(); 
$front->setControllerDirectory(array('default' => APPLICATION_PATH . "/controllers",
                                     'user' => APPLICATION_PATH.'/modules/user/controllers'));

/** Registering the Plugin object */ 
require_once APPLICATION_PATH . '/../Zend/Controller/Plugin/Acl.php'; 
$front->registerPlugin(new Zend_Controller_Plugin_Acl($myAcl, 'guest')); 

/** Dispatching the front controller */ 
$front->dispatch(); 
	}
} 