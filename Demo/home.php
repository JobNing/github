<?php
include "PdoClass.php";
$pdo = new PdoClass();
$house_type = $pdo->house_type();
$pdo->logins();
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
    <div
            class="col-md-4"
            style="position:absolute;
            left:0; top:0; width:100%;
            height:100%;background-image:
            url(images/92824.jpg);
            background-repeat: no-repeat;
            background-size: 100% 100%;
            -moz-background-size: 100% 100%;color: white"
            id="img"
    >
        <br>
        <br>
        <form class="form-horizontal" action="submit.php" method="get">
            <center><h3>欢迎光临</h3></center>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">户型面积区间</label>
                <div class="col-sm-10">
                    <select class="form-control" id="house_type" name="house_type">
                        <option value="">----请选择----</option>
                        <?php foreach ($house_type as $k=>$v){ ?>
                            <option class="house_type" value="<?php echo $v['house_type'] ?>"><?php echo $v['house_type'] ?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group" >
                <label for="inputEmail3" class="col-sm-2 control-label">户型长宽</label>
                <div class="col-sm-10" >
                    <select class="form-control" id="length_width" name="length_width">
                        <option value="">请先选择“户型面积区间”</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">卧室数量</label>
                <div class="col-sm-10">
                    <select class="form-control" id="bedroom" name="bedroom">
                        <option value="">请先选择“户型长宽”</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">门的位置</label>
                <div class="col-sm-10">
                    <select class="form-control" id="door" name="door">
                        <option value="0">请先选择“卧室数量”</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">客厅数量</label>
                <div class="col-sm-10">
                    <select class="form-control" id="drawing_room" name="drawing_room">
                        <option value="0">请先选择“门的位置”</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">厨房数量</label>
                <div class="col-sm-10">
                    <select class="form-control" id="cookhouse" name="cookhouse">
                        <option value="0">请先选择“客厅数量”</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">卫生间数量</label>
                <div class="col-sm-10">
                    <select class="form-control" id="toilet" name="toilet">
                        <option value="0">请先选择“厨房数量”</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="button" id="btn" class="btn btn-default">查看户型图</button>
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
<script>
    var house_type;
    var length_width;
    var bedroom;
    var door;
    var drawing_room;
    var cookhouse;
    var toilet;
    $("#house_type").bind("change",function () {
        house_type = $(this).val()
        $.ajax({
            url:'homephp.php',
            data:{house_type:house_type},
            method:'post'
        }).done(function (d) {

            var i = 0;
            var new_arr = d.split(",");
            var num = d.split(",").length;
            var str = "<option>----请选择----</option>";
            for(i=0;i<num;i++) {
                str += "<option value="+new_arr[i]+">"+new_arr[i]+"</option>";
            }
            $("#length_width").html(str);

        })
    })
    $("#length_width").bind("change",function () {
        length_width = $(this).val()
        $.ajax({
            url:'bedroom.php',
            data:{house_type:house_type,length_width:length_width},
            method:'post'
        }).done(function (d) {
            var i = 0;
            var new_arr = d.split(",");
            var num = d.split(",").length;
            var str = "<option>----请选择----</option>";
            for(i=0;i<num;i++) {
                str += "<option value="+new_arr[i]+">"+new_arr[i]+"</option>";
            }
            $("#bedroom").html(str);
        })
    })
    $("#bedroom").bind("change",function () {
        bedroom = $(this).val()
        $.ajax({
            url:'door.php',
            data:{house_type:house_type,length_width:length_width,bedroom:bedroom},
            method:'post'
        }).done(function (d) {
            var i = 0;
            var new_arr = d.split(",");
            var num = d.split(",").length;
            var str = "<option>----请选择----</option>";
            for(i=0;i<num;i++) {
                str += "<option value="+new_arr[i]+">"+new_arr[i]+"</option>";
            }
            $("#door").html(str);
        })
    })
    $("#door").bind("change",function () {
        door = $(this).val()
        $.ajax({
            url:'drawing_room.php',
            data:{house_type:house_type,length_width:length_width,bedroom:bedroom,door:door},
            method:'post'
        }).done(function (d) {
            var i = 0;
            var new_arr = d.split(",");
            var num = d.split(",").length;
            var str = "<option>----请选择----</option>";
            for(i=0;i<num;i++) {
                str += "<option value="+new_arr[i]+">"+new_arr[i]+"</option>";
            }
            $("#drawing_room").html(str);
        })
    })
    $("#drawing_room").bind("change",function () {
        drawing_room = $(this).val()
        $.ajax({
            url:'cookhouse.php',
            data:{house_type:house_type,length_width:length_width,bedroom:bedroom,door:door,drawing_room:drawing_room},
            method:'post'
        }).done(function (d) {
            var i = 0;
            var new_arr = d.split(",");
            var num = d.split(",").length;
            var str = "<option>----请选择----</option>";
            for(i=0;i<num;i++) {
                str += "<option value="+new_arr[i]+">"+new_arr[i]+"</option>";
            }
            $("#cookhouse").html(str);
        })
    })
    $("#cookhouse").bind("change",function () {
        cookhouse = $(this).val()
        $.ajax({
            url:'toilet.php',
            data:{house_type:house_type,length_width:length_width,bedroom:bedroom,door:door,drawing_room:drawing_room,cookhouse:cookhouse},
            method:'post'
        }).done(function (d) {
            var i = 0;
            var new_arr = d.split(",");
            var num = d.split(",").length;
            var str = "<option>----请选择----</option>";
            for(i=0;i<num;i++) {
                str += "<option value="+new_arr[i]+">"+new_arr[i]+"</option>";
            }
            $("#toilet").html(str);

        })
    })
    $("#toilet").bind("change",function () {
        toilet=$(this).val();
    })
    $("#btn").click(function () {
        if (!house_type||!length_width||!bedroom||!door||!drawing_room||!cookhouse||!toilet){
            alert("请选择全部选项以后提交");
        }else {
            $("#btn").attr('type','submit');
        }
    })
</script>