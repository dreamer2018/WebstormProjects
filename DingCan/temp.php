<!DOCTYPE html>
<html>
<head>
	<meta  content="content" charset="utf-8">
	<title>西邮Linux兴趣小组暑假订餐系统</title>
</head>
<body>
<?php
/*
 * 获取前端数据
 */

$id = $_POST['id'];
$type1 = $_POST['type1']; 
$type2 = $_POST['type2'];

?>
<br/>
<br/>
<h1>订单确认：</h1>
<div style="margin-left:5%">
<h3>两荤一素：<?php echo $type1 ?>份</h3>
<h3>两素一荤：<?php echo $type2 ?>份</h3>

<form action="book.php" method="POST">
	<input type="hidden" name="id" value="<?php echo $id ?>">
	<input type="hidden" name="type1" value="<?php echo $type1 ?>">
	<input type="hidden" name="type2" value="<?php echo $type2 ?>">
	<input type="submit"  value="确定">
	<a href="index.php"><input type="button" style="width:100px;height:50px;" value="重置"></a>
</form>
</div>
</body>
</html>
