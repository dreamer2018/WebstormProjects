<?php
/**
 * Created by PhpStorm.
 * User: zhoupan
 * Date: 8/24/16
 * Time: 4:15 PM
 */
if ($_GET['name'] != null) {
    $name = $_GET['name'];
    $passwd = $_GET['passwd'];
    $connect = new mysqli('localhost', 'root', 'root');
    if (!$connect) {
        die('Connect DataBase Error!');
    }
    $select = $connect->select_db('SQLInjection');
    if (!$select) {
        die('Select DataBase Error!');
    }
    $quert = "select passwd from login where name = \"" . $name . "\" and passwd = \"".$passwd."\";";
    $result = $connect->query($quert);
    $arr = $result->fetch_array();
    if (is_array($arr)) {
        echo "登陆成功";
    } else {
        echo "登陆失败，用户名或密码错误！";
    }
}