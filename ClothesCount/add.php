<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>XiyouLinuxGroup</title>
    <style>
        body {
            background-image: url("image/backgroud.jpg");
        }

        .top {
            margin-top: 10%;
            margin-left: 40%;
        }

        .top p1 {
            font-size: 20px;
        }

        .top li {
            font-size: 16px;
            margin-top: 8px;
            margin-left: 15px;
            list-style-type: circle;
        }

        .warning {
            color: #c7254e;
            font-size: 25px;
        }
    </style>
</head>
<body>
<div class="top">
    <p1>您的信息如下：</p1>
    <?php

    /**
     * Created by PhpStorm.
     * User: zhoupan
     * Date: 4/23/16
     * Time: 12:17 PM
     * Function:收集衣服数据的后台逻辑页面
     */


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
    $design_1 = $_POST["design_1"];
    //数量
    $design_2 = $_POST["design_2"];

    if ($style == 1) {
        $style_name = "男款";
    } elseif ($style == 2) {
        $style_name = "女款";
    } else {
        $style_name = " ";
    }
    switch ($size) {
        case 1:
            $size_name = "M";
            break;
        case 2:
            $size_name = "L";
            break;
        case 3:
            $size_name = "XL";
            break;
        case 4:
            $size_name = "XXL";
            break;
        default:
            $size_name = "";
    }
    echo "<ul>";
    echo "    <li>姓&nbsp;名：&nbsp;&nbsp;" . $name . "</li>";
    echo "    <li>手机号：&nbsp;&nbsp;" . $phone . "</li>";
    echo "    <li>地&nbsp;址：&nbsp;&nbsp;" . $address . "</li>";
    echo "    <li>款&nbsp;式：&nbsp;&nbsp;" . $style_name . "</li>";
    echo "    <li>尺&nbsp;寸：&nbsp;&nbsp;" . $size_name . "</li>";
    echo "    <li>样式一(白)数量：&nbsp;&nbsp;" . $design_1 . "</li>";
    echo "    <li>样式二(黑)数量：&nbsp;&nbsp;" . $design_2 . "</li>";
    echo "</ul> ";


    $name = htmlentities($name, ENT_QUOTES, 'UTF-8');
    $phone = htmlentities($phone, ENT_QUOTES, 'UTF-8');
    $address = htmlentities($address, ENT_QUOTES, 'UTF-8');
    $style = htmlentities($style, ENT_QUOTES, 'UTF-8');
    $size = htmlentities($size, ENT_QUOTES, 'UTF-8');
    $design_1 = htmlentities($design_1, ENT_QUOTES, 'UTF-8');
    $design_2 = htmlentities($design_2, ENT_QUOTES, 'UTF-8');


    /**
     *简单字符判断
     * 正则判断
     **/


    //判断姓名是否为空或者过长

    echo "<div class=\"warning\">";

    $name_str=preg_replace("/\s/
    ","",$name);
    if(strlen($name_str)<1){
        die("<p>您输入的姓名为空，请修改后重试！;</p>");
    }
    if (strlen($name) > 20  ) {
        die("<p>您输入的姓名太长，请修改后重试！</p>");
    }
    //判断姓名是否全为汉字
    if (!preg_match('/^[\x{4e00}-\x{9fa5}]+$/u', $name)) {
        die("<p>姓名必须全部是汉字!,请修改后重试！</p>");
    }

    /*
    //判断手机号是否是11位
    if(mb_strlen($phone) != 11 ){
        die("<p>您输入的手机号不正确，请修改后重试!</p>");
    }*/

    //判断手机号是否为全部数字，且为11位
    if (!preg_match("/(13\d|14[57]|15[^4,\D]|17[678]|18\d)\d{8}|170[059]\d{7}/", $phone)) {

        die("<p>您输入的手机号不正确，请修改后重试!</p>");
    }

    $address_str =preg_replace("/\s/","",$address);
    if(strlen($address_str)<1){
        die("<p>您输入的地址为空，请修改后重试！</p>");
    }
    //判断地址是否过长或为空
    if (strlen($address) < 1 || strlen($address) > 100) {
        die("<p>您输入的地址太长或太短，请修改后重试！</p>");
    }


    //判断款式
    if ($style != 1 && $style != 2) {
        die("<p>您选择的款式不存在，请修改后重试！</p>");
    }
    //判断款式
    if (!preg_match("/[1-9]{1}/", $style)) {
        die("<p>您选择的款式不存在，请修改后重试！</p>");
    }

    //判断样式数量
    if (strlen($design_1) < 1 || strlen($design_2) < 1) {
        die("<p>数量不能为空</p>");
    }
    //判断样式数量
    if ($design_1 < 1 && $design_2 < 1) {
        die("<p>那么漂亮的衣服一件都不买，请修改后重试！</p>");
    }
    //判断样式
    if (!preg_match("/[0-9]{1}/", $design_1)) {
        die("<p>您输入的数量不合法，请修改后重试！</p>");
    }
    if (!preg_match("/[0-9]{1}/", $design_2)) {
        die("<p>您输入的数量不合法，请修改后重试！</p>");
    }
    if($design_1 > 4 || $design_2 > 4){
        die("<p>小组衣服是全球限量产品，每人最多买四件！</p>");
    }


    require_once "DB_login.php";
    $DB_NAME = "Clothes";
    $DB_TABLE_NAME = "clothes";

    $connect = new mysqli($DB_HOST, $DB_USER, $DB_PASSWD);
    if (!$connect) {
        die("Connect DataBase Error");
    }

    $select = $connect->select_db($DB_NAME);

    if (!$select) {
        die("Select Databases Error");
    }

    //查找姓名
    $select_name = "select count(name) from " . $DB_TABLE_NAME . " where name=\"" . $name . "\";";
    //查找电话号码
    $select_phone = "select count(phone) from " . $DB_TABLE_NAME . " where phone=" . $phone . ";";

    //获取结果
    $result_name = $connect->query($select_name);
    $result_phone = $connect->query($select_phone);


    $r1 = $result_name->fetch_array();
    $r2 = $result_phone->fetch_array();

    if ($r1[0] != '0' or $r2[0] != '0') {
        die("<p>您的姓名或电话号码已存在,请联系小组负责人,或点击<a href='lookup.php'>已订查询</a></p>");
    } else {
        $query = "insert into " . $DB_TABLE_NAME . "(name,phone,address,style,size,design_1,design_2)  values( \"" . $name . "\"," . $phone . ",\"" . $address . "\"," . $style . "," . $size . "," . $design_1 . "," . $design_2 . ");";

        $result = $connect->query($query);
        if (!$result) {
            die("<p>插入数据失败，请重试或联系小组负责人！</p>");
        } else {
            echo "<p>提交成功,请静待衣服的到来，或点击<a href='lookup.php'>已订查询</a></p>";
        }
    }
    ?>
    </div>
</div>
</body>
</html>
