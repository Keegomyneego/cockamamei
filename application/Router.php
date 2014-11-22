<?php

class Router
{
    private $path;
    private $template;
    public $args = array();
    public $file;
    public $controller;
    public $action;

    /**
     * __construct
     */
    function __construct($template)
    {
        $this->template = $template;
    }

    /**
     * setPath
     * @param $path
     * @throws Exception
     */
    function setPath($path)
    {
        if(is_dir($path) == false)
        {
            throw new Exception("Invalid controllers path: $path");
        }

        $this->path = $path;
    }

    /**
     * loader
     */
    public function loader()
    {
        $this->getController();


        if(is_readable($this->file))
        {
        print($this->file);
            include_once $this->file;

            $class = $this->controller.'Controller';
            $controller = new $class($this->template);

            $action = (is_callable(array($controller, $this->action)))
                ? $this->action
                : 'index';

            $controller->$action($this->args);
        }
        else
        {
            echo $this->file . ' ';
            die('404: File Not Found');
        }
    }

    /**
     * getController
     */
    private function getController()
    {
        if(empty($_GET['rt']))
        {
            $this->controller = 'index';
            $this->action = 'index';
        }
        else
        {
            $parts = explode('/', $_GET['rt']);
            $this->controller = $parts[0];
            $this->action = (empty($parts[1])) ? 'index' : $parts[1];

            for($i = 2; $i < count($parts); $i++)
            {
                $this->args[$i - 2] = (empty($parts[$i])) ? "" : $parts[$i];
            }
        }

        $this->file = $this->path.'/'.$this->controller.'Controller.php';
    }
}
