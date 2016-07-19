<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <title>西邮Linux兴趣小组暑假订餐充值系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSS -->
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/supersized.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<script src="js/jquery-1.8.2.min.js"></script>
<script src="js/supersized.3.2.7.min.js"></script>
<script src="js/supersized-init.js"></script>
<script src="js/scripts.js"></script>
<div class="page-container">
    <p style="font-size: 25px;margin-top: 8%;color: #ebe212 ;;">西邮Linux兴趣小组暑假订餐充值系统</p>
    <div style="margin-top: 10%">
        <form action="addcharge.php" method="POST" id="form1">
            <label style="margin-left:8%">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</label>
            <select name="id">
                <?php
                require_once "DB_login.php";
                $connect = new mysqli($DB_HOST, $DB_USER, $DB_PASSWD);
                if (!$connect) {
                    die("Connect DataBase Error");
                }
                $select = $connect->select_db($DB_NAME);
                if (!$select) {
                    die("Select Databases Error");
                }
                $query='select id,name from info;';
                $result=$connect->query($query);
                while ($row=$result->fetch_array()){
                    echo "<option value=".$row['id'].">".$row['name']."</option>";
                }
                ?>
            </select>
            <br/>
            <br/>
            <br/>
            <br/>
            <label style="margin-top: 20%">充值金额：</label>
            <input type="text" name="money">
            <br/>
            <button type="submit" style="margin-top: 30%">提交</button>
        </form>
    </div>
</div>
</body>
</html>

