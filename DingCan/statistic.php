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
 * 获取当前时间
 */
$time = date("Ymd");
/*
 * 获取本日所有订单数量
 */
$query = "select id,user_id,type1,type2,balance,time from book where time like \"" . $time . "%\" order by id desc;";
$result = $connect->query($query);

echo "<table border='1' >";
echo "<tr><th>ID</th><th>用户名</th><th>两荤一素</th><th>一荤两素</th><th>余额</th><th>时间</th></tr>";

$type1 = 0; //第一类的数量
$type2 = 0; //第二类的数量

while ($row = $result->fetch_array()) {

    $query2 = 'select name from info where id=' . $row['user_id'] . ';';
    $result2 = $connect->query($query2);
    
    $name = "";
    while ($row2 = $result2->fetch_array()) {
        $name = $row2['name'];
    }
    $type1 += $row['type1'];
    $type2 += $row['type2'];
    
    echo "<tr align='center'>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $name . "</td>";
    echo "<td>" . $row['type1'] . "</td>";
    echo "<td>" . $row['type2'] . "</td>";
    echo "<td>" . $row['balance'] . "</td>";
    echo "<td>" . substr($row['time'], 0, 4) . "年" . substr($row['time'], 4, 2) . "月" . substr($row['time'], 6, 2) . "日" . substr($row['time'], 8, 2) . ":" . substr($row['time'], 10, 2) . ":" . substr($row['time'], 12, 2) . "</td>";
    echo "</tr>";
}

echo "</table>";
echo "<h2>统计：</h2>";
echo "<p>两荤一素：" . $type1 . "份</p>";
echo "<p>一荤两素：" . $type2 . "份</p>";

$count = $type1 + $type2;
echo "<p>共：" . $count . "份</p>";
$money = $type1 * 8 + $type2 * 7;
echo "<p>小计：" . $money . "元</p>";
?>
</body>
<html>

