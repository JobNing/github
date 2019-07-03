<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2019/7/2
 * Time: 16:18
 */
include "PdoClass.php";
$pdo = new PdoClass();
$house_type = $_POST['house_type'];
$length_width = $_POST['length_width'];
$data = $pdo->bedroom($house_type,$length_width);

foreach ($data as $k=>$v){
    $arr[] = $v['bedroom'];
}
$str = implode(",",$arr);
echo $str;