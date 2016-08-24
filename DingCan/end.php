<html>
<head>
    <meta charset="utf-8">
    <title>西邮Linux兴趣小组暑假订餐系统</title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: zhoupan
 * Date: 7/18/16
 * Time: 7:07 PM
 */

/*
 * 连接数据库
 */
require_once "DB_login.php";

$connect = new mysqli($DB_HOST, $DB_USER, $DB_PASSWD);
if (!$connect) {
    die("Connect DataBase Error");
}

$select = $connect->select_db($DB_NAME);
if (!$select) {
    die("Select Databases Error");
}
/*
 * 获取本日所有订单数量
 */
$query = "select id,name,balance from info";
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
?>
</table>
</body>
<html>

