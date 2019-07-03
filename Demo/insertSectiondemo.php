<?php
include "PdoClass.php";
$pdo = new PdoClass();
if (
    $_POST['house_type']==''||
    $_POST['length_width']==''||
    $_POST['bedroom']==''||
    $_POST['door']==''||
    $_POST['drawing_room']==''||
    $_POST['cookhouse']==''||
    $_POST['toilet']==''||
    $_POST['cad']==''||
    $_POST['images']==''
){
    echo "<script>alert('任何一项内容都不能为空');location.href='./insertSection.php'</script>";
}
$data = $_POST;
$pdo->insertSection($data);
echo "<script>alert('添加成功');location.href='./showSection.php'</script>";