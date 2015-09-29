<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 06.03.15
 * Time: 19:59
 */
class db_connect_singleton
{
    protected static $instance = array();
    private static $db;
    public $pdo;

    private function __clone() {}

    private function __construct($db, $db_host = null, $db_user = null, $db_password = null, $db_host = null)
    {
        self::$db = $db;
        $dsn = 'mysql:host=' . ( $db_host ? $db_host : DB_HOST ) . ';dbname=' . ( $db ? $db : DB_NAME );
        try {
            $this->pdo = new mypdo($dsn, $db_user ? $db_user : DB_USER, $db_password ? $db_password : DB_PASSWORD);
        } catch (PDOException $e) {
            echo "Failed Connection to Database";
            exit;
        }
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_ORACLE_NULLS ,PDO::NULL_TO_STRING);
        $this->pdo->exec("SET NAMES utf8");
    }

    public static function getInstance($db)
    {
        if(!array_key_exists($db, self::$instance)) {
            self::$instance[$db] = new self($db);
        }
        return self::$instance[$db];
    }
}