<?php
/**
 *
 * Created by PhpStorm.
 * User: zhoupan
 * Date: 4/9/16
 * Time: 8:42 PM
 */
    $DB_USER='root';
    $DB_NAME='test';
    $DB_PASSWD='zhoupan';
    $DB_HOST='localhost';
    $DB_PORT="3306";
    $conn=null;
    $dsn="mysql:host=".$DB_HOST.";port=".$DB_PORT.";dbname=".$DB_NAME.";charset=utf8";

    try{
        $conn= new \PDO(
            $dsn,
            $DB_USER,
            $DB_PASSWD,
            array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
            )
        );
    }catch(PDOException $e){
        echo "数据库连接失败".$e->getMessage();
        exit();
    }
?>