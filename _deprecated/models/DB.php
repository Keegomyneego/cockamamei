<?php

class DB
{
    private static $dbInstance = null;

    /**
     * __construct
     */
    private function __construct() {}

    /**
     * getInstance
     * @return null|pdo
     */
    public static function getInstance()
    {
        /** @var Config $config */
        $config = Config::getInstance();

        try {
            if(!self::$dbInstance)
            {
                self::$dbInstance = new pdo(
                    'mysql:host='.$config['db_host'].';'.
                    'port='.$config['db_port'].';'.
                    'dbname='.$config['db_database'].';',
                    $config['db_username'],
                    $config['db_password']
                );
            }
        }
        catch(PDOException $e)
        {
            print($e);
            exit;
        }

        return self::$dbInstance;
    }
}