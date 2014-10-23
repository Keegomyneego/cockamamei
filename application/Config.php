<?php

class Config
{
    const LOCAL = 'local.ini';
    const SITE = 'site.ini';
    private static $config = null;

    private function __construct() {}

    /**
     * getInstance
     * @return array
     */
    public static function getInstance()
    {
        return self::$config = parse_ini_file(
            file_exists('config/' . self::LOCAL)
                ? 'config/' . self::LOCAL
                : 'config/' . self::SITE
        );
    }
}
