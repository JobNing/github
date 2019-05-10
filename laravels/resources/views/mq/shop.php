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
    <form class="form-inline" action="/mq/shop">
        <div class="form-group">
            <label for="exampleInputName2">搜索</label>
            <input type="text" name="search" class="form-control" id="exampleInputName2" placeholder="商品名">
        </div>
        <button type="submit" class="btn btn-default">搜索</button>
    </form>
<table class="table table-striped">
    <tr>
        <td>商品编号</td>
        <td>商品名</td>
        <td>商品图片</td>
        <td>商品库存</td>
        <td>商品价格</td>
        <td>操作</td>
    </tr>
    <?php foreach ($data as $k=>$v){ ?>
        <tr>
            <td><?php echo $v->_source->id?></td>
            <td><?php echo $v->_source->name?></td>
            <td><img src="<?php echo $v->_source->image ?>" alt="" width="150px" height="100px"></td>
            <td><?php echo $v->_source->inventory ?></td>
            <td><?php  ?></td>
            <td><a href="/mq/shoping?id=<?php echo $v->_source->id ?>">购买</a></td>
        </tr>
    <?php } ?>
</table>
<?php for ($i=0;$i<$num;$i++){ ?>
    <a href="/mq/shop?path=<?php echo $i?>">第<?php echo $i+1 ?>页</a>
<?php } ?>
</body>
</html>
