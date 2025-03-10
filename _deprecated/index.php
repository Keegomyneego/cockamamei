<?php

$sitePath = realpath(dirname(__FILE__));
define('__SITE_PATH', $sitePath);

if (strpos(dirname(__FILE__), "/") === false) {
  $parts = explode("\\", dirname(__FILE__));
} else {
  $parts = explode("/", dirname(__FILE__));
}
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
// Database causing errors, we're going front end only from this point on
//$db = DB::getInstance();
$router = new Router(new Template());
$router->setPath('controllers');
$router->loader();
