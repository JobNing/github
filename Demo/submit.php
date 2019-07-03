<?php
include "PdoClass.php";
$pdo = new PdoClass();
$start = $pdo->start();
if ($start[0]['end']>=$start[0]['start']){
    echo "<script>alert('三次机会用完（六张户型图机会用完）');location.href='../Demo/share.php'</script>";
}
$house_type = $_GET['house_type'];
$length_width = $_GET['length_width'];
$bedroom = $_GET['bedroom'];
$door = $_GET['door'];
$drawing_room = $_GET['drawing_room'];
$cookhouse = $_GET['cookhouse'];
$toilet = $_GET['toilet'];
$data = $pdo->submit($house_type,$length_width,$bedroom,$door,$drawing_room,$cookhouse,$toilet);
$cpage = $data['cpage'];
$start = $data['start'];
$end = $data['end'];
$pagenum = $data['pagenum'];
$prev = $data['prev'];
$next = $data['next'];
$total = $data['total'];
$pdo->end();
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
            height:100%;background-color: white;
            background-repeat: no-repeat;
            background-size: 100% 100%;
            -moz-background-size: 100% 100%;color: black"
        id="img"
>


    <div style="background-color: red;width: 100%;height: 90%">

        <div style="background-color: yellow;width: 50%;height: 100%;display:inline-block" >
            <img width="100%" height="100%" src="<?php echo $data['data'][0]['cad']?>" alt="">
        </div>
        <div style="float:left ;background-color: blue;width: 50%;height: 100%;display:inline-block;vertical-align: top;">
            <img width="100%" height="100%" src="<?php echo $data['data'][0]['images']?>" alt="">
        </div>
    </div>
    <div style="text-align: center;height: 10%;font-size: 25px">
        <?php echo "当前第".$cpage ."/".$pagenum."页      ";
        if ($cpage==1){
            echo "上一页";
        }else{
            echo "<a href='?
                    page=$prev&
                    house_type=$house_type&
                    length_width=$length_width&
                    bedroom=$bedroom
                    &door=$door&
                    drawing_room=$drawing_room&
                    cookhouse=$cookhouse&
                    toilet=$toilet'> 上一页</a>" ;
        }
        if ($cpage==$pagenum) {
            echo "下一页";
        }else{
            echo "<a href='?
                        page=$next&
                        house_type=$house_type&
                        length_width=$length_width&
                        bedroom=$bedroom&
                        door=$door&
                        drawing_room=$drawing_room&
                        cookhouse=$cookhouse&
                        toilet=$toilet'>下一页</a>" ;
        } ?>
    </div>


</div>

<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
</body>
</html>
