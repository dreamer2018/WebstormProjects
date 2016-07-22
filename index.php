<!DOCTYPE html>
<html>
<head>
	<meta name="name" content="content" charset="utf-8">
	<title></title>
</head>
<body>
	<?php
	$name = $_POST['name'];
	if($name=='name'){
		echo "<p>doc1<a href=\"https://www.baidu.com\">www.baidu.com</a></p>";
		echo "<p>doc1<a href=\"https://www.baidu.com\">www.baidu.com</a></p>";
		echo "<p>doc1<a href=\"https://www.baidu.com\">www.baidu.com</a></p>";
	}else{
		echo "<form action=\"index.php\" method=\"POST\">";
			if(!is_null($name)){
				echo "<p>Name Error</p>";
			}
			echo "<input name =\"name\" type=\"text\">";
			echo "<input type=\"submit\" value=\"yanzheng\">";
		echo "</form>";
	}
	?>
</form>
</body>
</html>