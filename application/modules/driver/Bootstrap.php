<?php
class Driver_Bootstrap extends Zend_Application_Module_Bootstrap
{
    protected function _initAutoload()
    {
        // Add autoloader empty namespace
        $autoLoader = Zend_Loader_Autoloader::getInstance();
        $autoLoader->registerNamespace('NSC_');
        $resourceLoader = new Zend_Loader_Autoloader_Resource(array
            ('basePath' => APPLICATION_PATH."/modules/driver",
             'namespace' => 'driver_',
             'resourceTypes' => array(
                 'form' => array(
                     'path' => 'forms/',
                     'namespace' => 'Form_'
                 ),
                 'model' => array(
                     'path' => 'models/',
                     'namespace' => 'Model_'
                 )
             )
        )
        );
        // Return it so that it can be stored by the bootstrap
        return $autoLoader;
    }

}