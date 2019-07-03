<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2019/7/1
 * Time: 21:20
 */
include "PdoClass.php";
$pdo = new PdoClass();
$id = $_POST['id'];
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
$pdo->updsSection(
    $id,
    $_POST['house_type'],
    $_POST['length_width'],
    $_POST['bedroom'],
    $_POST['door'],
    $_POST['drawing_room'],
    $_POST['cookhouse'],
    $_POST['toilet'],
    $_POST['cad'],
    $_POST['images']
);
echo "<script>alert('修改成功');location.href='./showSection.php'</script>";