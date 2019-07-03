<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2019/7/3
 * Time: 10:41
 */
include "../phpqrcode/phpqrcode.php";
session_start();
$father=$_SESSION['user'];
//$value = "http://www.git.com?father=$father";         ///二维码内容
//$errorCorrectionLevel = 'H';  //容错级别
//$matrixPointSize = 10;      //生成图片大小
//生成二维码图片
//$filename = 'qrcode/'.microtime().'.png';
//QRcode::png($value,$filename , $errorCorrectionLevel, $matrixPointSize, 2);
//$QR = $filename;        //已经生成的原始二维码图片文件
//$QR = imagecreatefromstring(file_get_contents($QR));
//输出图片
//imagepng($QR, 'qrcode/qrcode.png');
//imagedestroy($QR);
echo "<img src='qrcode/qrcode.png'>";