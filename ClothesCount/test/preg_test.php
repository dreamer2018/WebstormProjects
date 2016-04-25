<?php
/**
 * Created by PhpStorm.
 * User: zhoupan
 * Date: 4/22/16
 * Time: 8:20 PM
 */
$str="18345668911";
echo strlen($str);
if(preg_match("/(13\d|14[57]|15[^4,\D]|17[678]|18\d)\d{8}|170[059]\d{7}/",$str)){
  echo "success!";
}else{
    echo "error";
}
$name="周攀";
if(preg_match('/^[\x{4e00}-\x{9fa5}]+$/u',$name)){
    echo "IS";
}else{
    echo "NOT";
}

$passwd="rgewghetg";
echo strlen($passwd);
$address="     wff e d f";
$address_str =preg_replace("/\s/","",$address);
echo "<br/>len=".strlen($address_str)."<br/>";
echo "address_str=".$address_str.";";