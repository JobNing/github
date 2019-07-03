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
$drawing_room = $_POST['drawing_room'];
$data = $pdo->cookhouse($house_type,$length_width,$bedroom,$door,$drawing_room);
//var_dump($data);die;
foreach ($data as $k=>$v){
    $arr[] = $v['cookhouse'];
}
//var_dump($arr);die;
$str = implode(",",$arr);
echo $str;