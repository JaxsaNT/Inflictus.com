<?php
namespace SSFTH;
class DBcon implements DBinfo
{
    private static $DB_HOST = DBinfo::DB_HOST;
    private static $DB_USER = DBinfo::DB_USER;
    private static $DB_PASS = DBinfo::DB_PASS;
    private static $DB_NAME = DBinfo::DB_NAME;
    private static $DB_PORT = DBinfo::DB_PORT;
    private static $DB_CHARSET = DBinfo::DB_CHARSET;
    private static $connection;


    public static function db_connect() { 
    if (null == self::$connection) {
        self::$connection = new \mysqli(self::$DB_HOST, self::$DB_USER, self::$DB_PASS, self::$DB_NAME, self::$DB_PORT);
     
    // Check 
    if (self::$connection->connect_errno > 0) { 
        echo "Failed to connect to MySQL: (" . self::$connection->connect_errno . ")" 
        . self::$connection->connect_error; 
    }; 
    // Sets the defualt client character to utf6 
    if (!self::$connection->set_charset(self::$DB_CHARSET)) { 
        echo "Error loading charset set utf8: (", self::$DB_CHARSET->error . ")"; 
    } 
    return self::$connection; 
}}}