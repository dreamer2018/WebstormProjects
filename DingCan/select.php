<?php
/**
 * Created by PhpStorm.
 * User: zhoupan
 * Date: 8/24/16
 * Time: 11:40 AM
 */
if($_GET['id'] != null) {
    $id = $_GET['id'];
    echo $id;
    require_once "DB_login.php";
    $connect = new mysqli($DB_HOST, $DB_USER, $DB_PASSWD);
    if (!$connect) {
        die("Connect DataBase Error");
    }
    $select = $connect->select_db($DB_NAME);
    if (!$select) {
        die("Select Databases Error");
    }
    $query = "select id,name,balance from info where id = ".$id.";";
    $result = $connect->query($query);
    echo "<table border='1' >";
    echo "<tr><th>ID</th><th>用户名</th><th>余额</th></tr>";
    while ($row = $result->fetch_array()) {
        echo "<tr align='center'>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['balance'] . "</td>";
        echo "</tr>";
    }
}