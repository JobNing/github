<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2019/7/2
 * Time: 16:46
 */
include "PdoClass.php";
$pdo = new PdoClass();
$house_type = $_POST['house_type'];
$length_width = $_POST['length_width'];
$bedroom = $_POST['bedroom'];
$door = $_POST['door'];
$data = $pdo->drawing_room($house_type,$length_width,$bedroom,$door);

foreach ($data as $k=>$v){
    $arr[] = $v['drawing_room'];
}
$str = implode(",",$arr);
echo $str;