<html>
<head>
    <meta charset="utf-8">
    <title>XiyouLinuxGroup</title>
</head>
<body>
<?php

$DB_USER = 'root';
$DB_NAME = 'Clothes';
$DB_PASSWD = 'zhoupan';
$DB_HOST = 'localhost';
$DB_PORT = "3306";
$DB_TABLE_NAME = "clothes";

$connect = new mysqli($DB_HOST, $DB_USER, $DB_PASSWD);
if (!$connect) {
    die("Connect Error");
}

$select = $connect->select_db($DB_NAME);

if (!$select) {
    die("Select Databases Error");
}

//姓名
$name = $_POST["name"];
//电话号码
$phone = $_POST["phone"];
//地址
$address = $_POST["address"];
//款式
$style = $_POST["style"];
//尺寸
$size = $_POST["size"];
//样式
$design = $_POST["design"];
//数量
$number = $_POST["number"];

if ($style == 1) {
    $style_name = "男款";
} elseif ($style == 2) {
    $style_name = "女款";
} else {
    $style_name = " ";
}
if ($design == 1) {
    $design_name = "样式一（白）";
} elseif ($design == 2) {
    $design_name = "样式二（黑）";
} else {
    $design_name = " ";
}
echo "<p>你的信息如下：</p>";
echo "<ul>";
echo "    <li>姓名：" . $name . "</li>";
echo "    <li>手机号：" . $phone . "</li>";
echo "    <li>地址：" . $address . "</li>";
echo "    <li>款式：" . $style_name . "</li>";
echo "    <li>尺寸：" . $size . "</li>";
echo "    <li>样式：" . $design_name . "</li>";
echo "    <li>数量：" . $number . "</li>";
echo "</ul> ";
$name= htmlentities($name,ENT_QUOTES,'UTF-8');
$phone= htmlentities($phone,ENT_QUOTES,'UTF-8');
$address= htmlentities($address,ENT_QUOTES,'UTF-8');
$style= htmlentities($style,ENT_QUOTES,'UTF-8');
$size= htmlentities($size,ENT_QUOTES,'UTF-8');
$design= htmlentities($design,ENT_QUOTES,'UTF-8');
$number= htmlentities($number,ENT_QUOTES,'UTF-8');


/**
 *简单字符判断
 **/
//判断姓名是否为空或者过长
if(strlen($name) > 20 || strlen($name) < 1){
    die("<p>您输入的姓名太长或太短，请修改后重试！</p>");
}
//判断手机号是否
if(strlen($phone) != 11 ){
    die("<p>您输入的手机号不正确，请修改后重试!</p>");
}
//判断地址是否过长或为空
if(strlen($address) <1 || strlen($address) > 100){
    die("<p>您输入的地址太长或太短，请修改后重试！</p>");
}
//判断款式
if($style < 0 || $style > 2){
    die("<p>您选择的款式不存在，请修改后重试！</p>");
}
//判断尺寸
if($size < 0 || $size > 4){
    die("<p>您选择的尺寸不存在，请修改后重试！</p>");
}
//判断样式
if($design < 0 || $design > 2){
    die("<p>你选择的样式不存在，请修改后重试！</p>");
}
/**
  *正则判断
 **/
//判断手机号是否为全部数字
if(preg_match("/[1-9]{11}/",$number)){
    die("<p>您输入的手机号不正确，请修改后重试!</p>");
}
//判断款式
if(preg_match("/[1-9]{1}/",$style)){
    die("<p>您选择的款式不存在，请修改后重试！</p>");
}
//判断样式
if(preg_match("/[1-9]{1}/",$design)){
    die("<p>你选择的样式不存在，请修改后重试！</p>");
}
//判断尺寸
if(preg_match("/[1-9]{1}/",$size)){
    die("<p>您选择的尺寸不存在，请修改后重试！</p>");
}


//查找姓名
$select_name = "select count(name) from ".$DB_TABLE_NAME." where name=\"".$name."\";";
//查找电话号码
$select_phone = "select count(phone) from ".$DB_TABLE_NAME." where phone=".$phone.";";

//获取结果
$result_name = $connect->query($select_name);
$result_phone = $connect->query($select_phone);


$r1 = $result_name->fetch_array();

$r2 = $result_phone->fetch_array();

if ($r1[0] != '0' or $r2[0] != '0') {
    echo "<p>您的姓名或电话号码已存在,请联系管理员！</p>";
} else {
    $query = "insert into " . $DB_TABLE_NAME . "(name,phone,address,style,size,design,number)  values( \"" . $name . "\"," . $phone . ",\"" . $address . "\"," . $style . "," . $size . "," . $design . "," . $number . ");";
    $result = $connect->query($query);
    if (!$result) {
        echo "<p>插入数据失败，请重试或联系管理员！</p>";
    }else{
        echo "<p>提交成功！</p>";
    }
}
?>
</body>
</html>
