<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>XiyouLinuxGroup</title>
    <style>
        body{
            background-image: url("image/backgroud5.jpg");
            margin-top: 7%;
        }
        .table table{
            background-color: #2aabd2;
        }
    </style>
</head>
<body>
<h3>小组服装订购情况：</h3>
<div class="top">
    <?php
    /**
     * Created by PhpStorm.
     * User: zhoupan
     * Date: 4/23/16
     * Time: 12:22 PM
     */

    require_once "DB_login.php";
    $DB_NAME = "Clothes";
    $DB_TABLE_NAME = "clothes";

    $connect = new mysqli($DB_HOST, $DB_USER, $DB_PASSWD);
    if (!$connect) {
        die("Connect DataBses Error");
    }

    $select = $connect->select_db($DB_NAME);
    if (!$select) {
        die("Select DataBase Error");
    }
    echo '<div class="table">';
    echo "<table border='1' width='1500px' bordercolor=\"#c7254e\">";
    echo "<tr>";
    echo "<th>订购ID</th>";
    echo "<th>姓名</th>";
    echo "<th>手机号</th>";
    echo "<th>地址</th>";
    echo "<th>款式</th>";
    echo "<th>尺寸</th>";
    echo "<th>样式一(白)数量</th>";
    echo "<th>样式二(黑)数量</th>";
    echo "</tr>";
    $query = "select * from " . $DB_TABLE_NAME . ";";
    $result = $connect->query($query);
    while ($row = $result->fetch_array()) {

        if ($row["style"] == 1) {
            $style_name = "男款";
        } elseif ($row["style"] == 2) {
            $style_name = "女款";
        } else {
            $style_name = " ";
        }
        switch ($row["size"]) {
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
	$number_1=$row["phone"]/100000000;
	$number_1=intval($number_1);
	$number_2=$row["phone"]%10000;
	if(strlen($number_2)==3){
		$number_2="0".$number_2;
	}elseif(strlen($number_2)==2){
		$number_2="00".$number_2;
	}elseif(strlen($number_2)==1){
		$number_2="000".$number_2;
	}elseif(strlen($number_2)==0){
		$number_2="0000".$number_2;
	}
	$number=$number_1."****".$number_2;
	
        echo "<tr>";
        echo "<td align='center' >" . $row["id"] . "</td>";
        echo "<td align='center' >" . $row["name"] . "</td>";
        echo "<td align='center' >" . $number. "</td>";
        echo "<td align='center' >" . $row["address"] . "</td>";
        echo "<td align='center' >" . $style_name . "</td>";
        echo "<td align='center' >" . $size_name . "</td>";
        echo "<td align='center' >" . $row["design_1"] . "</td>";
        echo "<td align='center' >" . $row["design_2"] . "</td>";
        echo "</tr>";
    }
    echo "<p>如发现信息错误，请点击<a href='reset.html'>重置</a>修改信息</p>";
    echo "</div>"
    ?>
</div>
</body>
</html>
