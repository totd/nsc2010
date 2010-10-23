<?php

require_once 'Zend/Test/PHPUnit/ControllerTestCase.php';

/**
 * @author Andriy Ilnitskiy 22.10.2010
 * 
 * Abstract class from which all tests will be inherited.
 */
abstract class ControllerTestCase extends Zend_Test_PHPUnit_ControllerTestCase
{

    protected $application;

    public function setUp()
    {
        $this->bootstrap = array($this, 'appBootstrap');
        parent::setUp();
    }

    public function appBootstrap()
    {
        $this->application = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        $this->application->bootstrap();
    }

}