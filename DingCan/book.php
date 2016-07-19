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
$type1 = $_POST['type1'];
$type2 = $_POST['type2'];

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
 * 计算总价钱
 */
$price=0;
$price = $type1 * 8 + $type2 * 7;

/*
 * 计算订餐后余额
 */

$balance2 = $balance - $price;  //现在余额

/*
 * 输出订单详情
 */
echo "<h2>订单详情：</h2>";
echo "<table>
        <tr>
            <td>
                <p>两荤一素：" . $type1 . "份</p>
            </td>
        </tr>
        <tr>
            <td>
               <p>两素一荤：" . $type2 . "份</p>
            </td>
        </tr>
        <tr>
            <td>
               <p>总价：" . $price . "</p>
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

if ($type2 > 0 || $type1 > 0) {
    /*
     * 计算当前时间
     */
    $time = date("YmdHis");
    /*
     * 写入订餐记录
     */

    $query = "insert into book(user_id,type1,type2,balance,time) VALUES (" . $id . "," . $type1 . "," . $type2 . "," . $balance2 . ",\"" . $time . "\");";
    $result = $connect->query($query);
    /*
     * 更新余额
     */
    $query = "update info set balance=" . $balance2 . " where id = " . $id . ";";
    $result = $connect->query($query);
}

/*
 * 报告余额不足！
 */
if($balance2 < 0){
    echo "<h1 style='color: #b90780'>您已欠费，请及时充值！</h1>";
}elseif ($balance2 < 7){
    echo "<h2 style='color: #b90c17'>您余额即将用完，请及时充值！</h2>";
}



/*
 * 查询显示历史订餐记录
 */
$query = "select id,type1,type2,balance,time from book where user_id=" . $id . " order by id desc;";
$result = $connect->query($query);

echo "<table border='1'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>用户名</th>";
echo "<th>两荤一素</th>";
echo "<th>一荤两素</th>";
echo "<th>余额</th>";
echo "<th>时间</th>";
echo "</tr>";

$type1 = 0; //第一类的数量
$type2 = 0; //第二类的数量

while ($row = $result->fetch_array()) {

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

/*
 * 查询显示历史充值记录
 */
$query = "select id,money,balance,time from recharge where user_id=" . $id . " order by id desc;";

$result = $connect->query($query);

echo "<table border='1'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>用户名</th>";
echo "<th>充值金额</th>";
echo "<th>余额</th>";
echo "<th>时间</th>";
echo "</tr>";

$count=0;       //充值次数
$all_money=0;   //总计钱数
while ($row = $result->fetch_array()) {

    echo "<tr align='center'>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $name . "</td>";
    echo "<td>" . $row['money'] . "</td>";
    echo "<td>" . $row['balance'] . "</td>";
    echo "<td>" . substr($row['time'], 0, 4) . "年" . substr($row['time'], 4, 2) . "月" . substr($row['time'], 6, 2) . "日" . substr($row['time'], 8, 2) . ":" . substr($row['time'], 10, 2) . ":" . substr($row['time'], 12, 2) . "</td>";
    echo "</tr>";
    $count++;
    $all_money+=$row['money'];
}

echo "</table>";
echo "<h2>小计：</h2>";
echo "<p>累计充值：" . $count . "次</p>";
echo "<p>累计充值：" . $all_money . "元</p>";






