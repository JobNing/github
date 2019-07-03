<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2019/7/3
 * Time: 10:40
 */
include "PdoClass.php";
$pdo = new PdoClass();
$pdo->key();
echo "<script>alert('生成成功，请联系“QQ768227981”以获取');location.href='share.php'</script>";
