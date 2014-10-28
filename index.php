<?php

$sitePath = realpath(dirname(__FILE__));
define('__SITE_PATH', $sitePath);

$parts = explode("/", dirname(__FILE__));
define("__PROJECT_NAME", $parts[count($parts) - 1]);

require_once 'application/BaseController.php';
require_once 'application/BaseDataAccess.php';
require_once 'application/Config.php';
require_once 'application/Router.php';
require_once 'application/Template.php';

/**
 * __autoload
 * @param $className
 */
function __autoload($className)
{
    $filename = ($className) . '.php';
    $file = 'models/' . $filename;

    if(file_exists($file))
    {
        include_once $file;
    }
}

$db = DB::getInstance();
$router = new Router(new Template());
$router->setPath('controllers');
$router->loader();
