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
 * Time: 4:05 PM
 */
require_once 'DB_login.php';

/*
 * 获取前端数据
 */

$id = $_POST['id'];
$money = $_POST['money'];


/*
 * 连接数据库
 */

$connect = new mysqli($DB_HOST, $DB_USER, $DB_PASSWD);

if (!$connect) {
    die("Connect DataBase Error");
}
$select = $connect->select_db($DB_NAME);
if (!$select) {
    die("Select Databases Error");
}

/*
 * 获取当前余额和用户名
 */

$query = 'select name,balance from info where id = ' . $id . ';';
$result = $connect->query($query);

$balance = 0; //历史余额
$name = ""; //用户名
while ($row = $result->fetch_array()) {
    $balance = $row['balance'];
    $name = $row['name'];
}

/*
 * 计算订餐后余额
 */

$balance2 = $balance + $money;  //现在余额

/*
 * 输出订单详情
 */
echo "<h2>充值详情：</h2>";
echo "<table>
        <tr>
            <td>
               <p>姓名：" . $name . "</p>
            </td>
        </tr>
        <tr>
            <td>
               <p>充值金额：" . $money . "</p>
            </td>
        </tr>
        <tr>
            <td>
               <p>历史余额：" . $balance . "</p>
            </td>
        </tr>
        <tr>
            <td>
               <p>当前余额：" . $balance2 . "</p>
            </td>
        </tr>
    </table>";

/*
 * 如果两类的数量都为0，则不进行数据库操作，不写入订餐记录
 */

if ($money > 0) {
    /*
     * 计算当前时间
     */
    $time = date("YmdHis");
    /*
     * 写入订餐记录
     */

    $query = "insert into recharge(user_id,money,balance,time) VALUES (" . $id . "," . $money . "," . $balance2 . ",\"" . $time . "\");";
    $result = $connect->query($query);
    /*
     * 更新余额
     */
    $query = "update info set balance=" . $balance2 . " where id = " . $id . ";";
    $result = $connect->query($query);
}

/*
 * 查询显示历史订餐记录
 */
$query = "select id,user_id,money,balance,time from recharge order by id desc;";
$result = $connect->query($query);

echo "<table border='1'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>用户名</th>";
echo "<th>充值金额</th>";
echo "<th>余额</th>";
echo "<th>时间</th>";
echo "</tr>";

$sum_money=0;
$count=0;

while ($row = $result->fetch_array()) {

    $query2 = 'select name from info where id=' . $row['user_id'] . ';';
    $result2 = $connect->query($query2);
    $name = "";
    while ($row2 = $result2->fetch_array()) {
        $name = $row2['name'];
    }
    echo "<tr align='center'>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $name . "</td>";
    echo "<td>" . $row['money'] . "</td>";
    echo "<td>" . $row['balance'] . "</td>";
    echo "<td>" . substr($row['time'], 0, 4) . "年" . substr($row['time'], 4, 2) . "月" . substr($row['time'], 6, 2) . "日" . substr($row['time'], 8, 2) . ":" . substr($row['time'], 10, 2) . ":" . substr($row['time'], 12, 2) . "</td>";
    echo "</tr>";
    $sum_money+=$row['money'];
    $count++;
}
echo "</table>";
echo "<h2>统计：</h2>";
echo "<p>共：" . $count . "条记录</p>";
echo "<p>累计：" . $sum_money . "元</p>";





