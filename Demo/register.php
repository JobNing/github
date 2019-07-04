<?php
include "PdoClass.php";
$pdo = new PdoClass();
session_start();
$father = $_SESSION['father'];
$user = $_POST['user'];
$usery = $pdo->user($user);
if (!empty($usery)){
    echo "<script>alert('用户名已被占用');location.href='../index.php?father=$father'</script>";
}
$pwd = $_POST['pwd'];
$pwds = $_POST['pwds'];
if ($user==''){
    echo "<script>alert('用户名不能为空');location.href='../index.php?father=$father'</script>";
}
if ($pwd==''){
    echo "<script>alert('密码不能为空');location.href='../index.php?father=$father'</script>";
}
if ($pwd!=$pwds){
    echo "<script>alert('两次密码不一致');location.href='../index.php?father=$father'</script>";
}
$data[0] = $user;
$data[1] = md5($pwd);

if ($father!=''){
    $pdo->registers($data);
    $_SESSION['user'] = $user;
    $pdo->plus($father);
    echo "<script>alert('注册成功,赠送您三次免费查看户型图机会');location.href='../Demo/home.php'</script>";
}else{
    $pdo->register($data);
    $_SESSION['user'] = $user;
    echo "<script>alert('注册成功,赠送您三次免费查看户型图机会');location.href='../Demo/home.php'</script>";
}
