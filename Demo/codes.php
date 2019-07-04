<?php
include "PdoClass.php";
$pdo = new PdoClass();
session_start();
$user = $_SESSION['user'];
$activate = $_POST['key'];
if ($activate==''){
    echo "<script>alert('激活码不能为空');location.href='share.php'</script>";
}
$usery = $pdo->verifys($activate);
if (empty($usery)){
    echo "<script>alert('激活码不正确');location.href='share.php'</script>";
}else{
    $pdo->plus($user);
    $pdo->codedel($activate);
    echo "<script>alert('激活成功');location.href='home.php'</script>";
}