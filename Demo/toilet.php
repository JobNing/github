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
$cookhouse = $_POST['cookhouse'];
$data = $pdo->toilet($house_type,$length_width,$bedroom,$door,$drawing_room,$cookhouse);

foreach ($data as $k=>$v){
    $arr[] = $v['toilet'];
}
$str = implode(",",$arr);
echo $str;