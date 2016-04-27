<?php
/**
 * Created by PhpStorm.
 * User: zhoupan
 * Date: 4/27/16
 * Time: 10:08 AM
 */
$number=18010830000;
$number_1=$number/100000000;
$number_1=intval($number_1);

$number_2=$number%10000;
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

$number=$number_1."****".$number_2;
echo $number_1;
echo $number_2;
echo $number;