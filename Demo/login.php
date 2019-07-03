<?php
include "PdoClass.php";
$pdo = new PdoClass();
$user = $_POST['user'];
$pwd = $_POST['pwd'];
if ($user==''){
    echo "<script>alert('用户名不能为空');location.href='../login.php'</script>";
}
if ($pwd==''){
    echo "<script>alert('密码不能为空');location.href='../login.php'</script>";
}
$usery = $pdo->verify($user,md5($pwd));
if (empty($usery)){
    echo "<script>alert('用户名或密码不正确');location.href='../login.php'</script>";
}else{
    session_start();
    $_SESSION['user'] = $usery['0']['user'];
    echo "<script>alert('登录成功');location.href='../Demo/home.php'</script>";
}