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
<form class="form-horizontal" action="insertSectiondemo.php" method="post">
    <center><h3>添加户型</h3></center>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">户型面积区间</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" name="house_type" placeholder="请用“-”隔开  如100-200">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">户型长宽</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" name="length_width" placeholder="请用“*”隔开 比如10*10和20*5">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">卧室数量</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="bedroom" id="inputEmail3" placeholder="">
        </div>
    </div>

    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">门的位置</label>
        <div class="col-sm-10">
            <select class="form-control" name="door">
                <option value="东">东</option>
                <option value="南">南</option>
                <option value="西">西</option>
                <option value="北">北</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">客厅数量</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="drawing_room" id="inputEmail3" placeholder="">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">厨房数量</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="cookhouse" id="inputEmail3" placeholder="">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">卫生间数量</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="toilet" id="inputEmail3" placeholder="">
        </div>
    </div>

    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">cad文件链接</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="cad" id="inputEmail3" placeholder="">
        </div>
    </div>

    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">图片链接</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="images" id="inputEmail3" placeholder="">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">添加</button>
            <a class="btn btn-default" href="showSection.php" role="button">返回</a>
        </div>
    </div>

</form>

<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
</body>
</html>