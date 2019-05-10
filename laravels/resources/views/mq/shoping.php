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
<center>
<form action="/mq/indent" method="post">
    商品名：<?php echo $data[0]->name ?><br>
    <img src="<?php echo $data[0]->image ?>" alt="" width="150px" height="150px"><br>
    <input type="hidden" name="id" value="<?php echo $data[0]->id ?>"><br>
    数量：<select name="num" id="">
        <?php for ($i=1;$i<=50;$i++){ ?>
        <option value="<?php echo $i ?>"><?php echo $i ?></option>
        <?php } ?>
    </select><br>
    单价：<?php echo $data[0]->price ?><input type="hidden" name="price" value="<?php echo $data[0]->price ?>"><br>
    <input type="submit" value="提交订单">
</form>
</center>
</body>
</html>
