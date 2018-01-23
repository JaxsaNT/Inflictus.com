<?php
namespace SSFTH;
interface DBinfo
{
    //Server database connnection//
    
    const DB_HOST = 'localhost';
    const DB_USER = 'SSFTH';
    const DB_PASS = '#SexShop';
    const DB_NAME = 'inflictus';
    const DB_PORT = '3306';
    const DB_CHARSET = 'utf8';
    
    //Local database connnection//
    
//    const DB_HOST = 'localhost';
//    const DB_USER = 'root';
//    const DB_PASS = '';
//    const DB_NAME = 'sandbox';
//    //const DB_PORT = '3306';
//    const DB_CHARSET = 'utf8';
    public static function db_connect();
} 