<?php 

class Template
{
    private $vars = array();

    /**
     * __construct
     */
    function __construct() {}

    /**
     * __set
     * @param $index
     * @param $value
     */
    public function __set($index, $value)
    {
        $this->vars[$index] = $value;
    }

    /**
     * __get
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        $this->vars[$name];
    }

    /**
     * show
     * @param $view
     * @return bool
     * @throws Exception
     */
    public function render($view)
    {
        $path = __SITE_PATH . '/views/' . $view . '.php';

        if(file_exists($path))
        {
            extract($this->vars);
            include_once($path);
        }
        else
        {
            throw new Exception('Template not found in '.$path);
            return false;
        }
    }
}
