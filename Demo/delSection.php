<?php
include "PdoClass.php";
$pdo = new PdoClass();
$id = $_GET['id'];
$pdo->deleteSection($id);
echo "<script>alert('删除成功');location.href='./showSection.php'</script>";