<?php
error_reporting( E_ALL | E_STRICT );

define('BASE_PATH', realpath(dirname(__FILE__) . '/../../'));
define('APPLICATION_PATH', BASE_PATH . '/application');

set_include_path(
    '.'
    . PATH_SEPARATOR . BASE_PATH . '/library'
    . PATH_SEPARATOR . get_include_path()
);

define('APPLICATION_ENV', 'testing');

require_once 'Zend/Application.php';
require_once 'ControllerTestCase.php';