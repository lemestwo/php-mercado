<?php


namespace App\Core;


class Database
{
    /**
     * Variable that will hold the database connection
     * @var
     */
    private static $pgsql;

    /**
     * Generate an instance of the database connection
     */
    public static function getConnection()
    {
        if (is_null(self::$pgsql)) {
            self::$pgsql = pg_connect("host=" . $_ENV['DB_HOST'] . " dbname=" . $_ENV['DB_NAME'] . " user=" . $_ENV['DB_USER'] . " password=" . $_ENV['DB_PASS']);
        }
        return self::$pgsql;
    }

    /**
     * Destruct the connection
     */
    function __destruct()
    {
        pg_close(self::$pgsql);
        self::$pgsql = null;
    }
}