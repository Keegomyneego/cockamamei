<?php

abstract class BaseController
{
    protected $template;

    /**
     * __construct
     * @param $template
     */
    function __construct($template)
    {
        $this->template = $template;
    }

    /**
     * index
     */
    abstract function index();

    /**
     * curl
     * @param string $url
     * @return json
     */
    protected function curl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = json_decode(curl_exec($ch));
        curl_close($ch);

        return $data;
    }

    /**
     * unsetCookies
     * @param array $cookies
     */
    protected function unsetCookies(array $cookies)
    {
        foreach($cookies as $cookie)
        {
            setcookie($cookie, null, time() - 3600, "/");
        }
    }

    /**
     * redirect
     * @param string $location
     */
    protected function redirect($location)
    {
        header("Location: $location");
        exit();
    }

    /**
     * redirectIfNullOrEmpty
     * @param mixed $var
     * @param string $location
     */
    protected function redirectIfNullOrEmpty($var, $location)
    {
        if(is_null($var) || empty($var))
        {
            $this->redirect($location);
        }
    }

    /**
     * TODO: update Log object to use static method
     * @param string $method
     * @return json
     */
    protected function log($method)
    {
        $remote_addr = filter_input(INPUT_SERVER, "REMOTE_ADDR");
        $user_agent = filter_input(INPUT_SERVER, "HTTP_USER_AGENT");
        $data = $this->curl('http://ipinfo.io/' . $remote_addr);

        if($remote_addr != "::1" && 0 !== strpos($remote_addr, "192.168.")) {
            $log = new log($this->template);
            $log->created_on = date("Y-m-d h:i:s");
            $log->viewed = $method;
            $log->remote_addr = $remote_addr;
            $log->user_agent = $user_agent;
            $log->loc = $data->{"loc"};
            $log->country = $data->{"country"};
            $log->state = $data->{"region"};
            $log->city = $data->{"city"};
            $log->save();
        }

        return $data;
    }
}