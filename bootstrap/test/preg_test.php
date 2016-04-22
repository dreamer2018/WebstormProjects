<?php
/**
 * Created by PhpStorm.
 * User: zhoupan
 * Date: 4/22/16
 * Time: 8:20 PM
 */
$str="12345678911";
echo strlen($str);
if(preg_match("/[1-9]{11}/",$str)){
  echo "success!";
}else{
    echo "error";
}

?>