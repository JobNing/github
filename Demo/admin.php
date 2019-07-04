<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2019/7/4
 * Time: 8:35
 */
include "PdoClass.php";
$pdo = new PdoClass();
$user = $_POST['user'];
$pwd = $_POST['pwd'];
if ($user==''){
    echo "<script>alert('用户名不能为空');location.href='index.php'</script>";
}
if ($pwd==''){
    echo "<script>alert('密码不能为空');location.href='index.php'</script>";
}
$data = $pdo->admin($user,$pwd);
if (empty($data)){
    echo "<script>alert('用户名或密码不正确');location.href='index.php'</script>";
}else{
    session_start();
    $_SESSION['admin'] = $data['0']['user'];
    echo "<script>alert('登录成功');location.href='showSection.php'</script>";
}
