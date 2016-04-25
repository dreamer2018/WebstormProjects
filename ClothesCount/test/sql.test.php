<?php
/**
 * Created by PhpStorm.
 * User: zhoupan
 * Date: 4/25/16
 * Time: 5:08 PM
 */
$name="周攀";
$DB_TABLE_NAME="test";
$phone=12345678910;
$address="西安长安";
$style=1;
$size=2;
$design_1=1;
$design_2=2;
$query = "update ".$DB_TABLE_NAME." set name=\"".$name."\",phone=".$phone.",address=\"".$address."\",style=".$style.",size=".$size.",design_1=".$design_1.",design_2=".$design_2."  where name=\"".$name."\";";
echo $query;