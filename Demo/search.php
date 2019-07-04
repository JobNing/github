<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2019/7/4
 * Time: 9:40
 */
include "PdoClass.php";
$pdo = new PdoClass();
$title = $_POST['title'];
if ($title==''){
    echo "<script>location.href='showSection.php'</script>";
}

$data = $pdo->showSections($title);

$pdo->admins();

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim 和 Respond.js 是为了让 IE8 支持 HTML5 元素和媒体查询（media queries）功能 -->
    <!-- 警告：通过 file:// 协议（就是直接将 html 页面拖拽到浏览器中）访问页面时 Respond.js 不起作用 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<br>
<br>
<center><h3>展示页</h3></center>
<form class="form-inline" method="post" action="search.php">
    <div class="form-group">
        <label class="sr-only" for="exampleInputEmail3">搜索</label>
        <input type="text" class="form-control" name="title" id="exampleInputEmail3" placeholder="根据“卧室个数检索”搜索">
    </div>
    <button type="submit" class="btn btn-default">点击搜索</button>
</form>
<table class="table table-bordered;" style="table-layout: fixed;">
    <tr style="background: aqua">
        <td>户型面积区间</td>
        <td>户型长宽</td>
        <td>卧室数量</td>
        <td>门的位置</td>
        <td>客厅数量</td>
        <td>厨房数量</td>
        <td>卫生间数量</td>
        <td>cad链接</td>
        <td>图片</td>
        <td>操作</td>
    </tr>
    <?php foreach ($data as $k=>$v){?>
        <tr>
            <td><?php echo $v['house_type']?></td>
            <td><?php echo $v['length_width']?></td>
            <td><?php echo $v['bedroom']?></td>
            <td><?php echo $v['door']?></td>
            <td><?php echo $v['drawing_room']?></td>
            <td><?php echo $v['cookhouse']?></td>
            <td><?php echo $v['toilet']?></td>
            <td style="white-space:nowrap;overflow:hidden;text-overflow:ellopsis;-moz-text-overflow: ellipsis; "><?php echo $v['cad']?></td>
            <td><img src="<?php echo $v['images']?>" alt="" width="100"></td>
            <td><a href="delSection.php?id=<?php echo $v['id']?>">删除</a>|<a href="updSection.php?id=<?php echo $v['id']?>">修改</a></td>
        </tr>
    <?php } ?>
</table>
<a class="btn btn-default" href="insertSection.php" role="button">添加户型</a>
<a class="btn btn-default" href="key.php" role="button">查看激活码</a>
<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
</body>
</html>
