<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2019/7/2
 * Time: 10:59
 */
include "PdoClass.php";
$pdo = new PdoClass();
$house_type = $_POST['house_type'];
$data = $pdo->length_width($house_type);

foreach ($data as $k=>$v){
    $arr[] = $v['length_width'];
}
$str = implode(",",$arr);
echo $str;


