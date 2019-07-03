<?php
include "PdoClass.php";
$pdo = new PdoClass();
$data = $pdo->showkey();
$cpage = $data['cpage'];
$start = $data['start'];
$end = $data['end'];
$pagenum = $data['pagenum'];
$prev = $data['prev'];
$next = $data['next'];
$total = $data['total'];

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
<center><h3>激活码</h3></center>
<table class="table table-bordered">
    <tr style="background: aqua">
        <td>激活码</td>
        <td>时间</td>
    </tr>
    <?php foreach ($data['data'] as $k=>$v){?>
        <tr>
            <td><?php echo $v['key']?></td>
            <td><?php echo $v['time']?></td>
        </tr>
    <?php } ?>
</table>
<?php
echo '<table align="center" width="800" border="1">';
echo "共<b>$total</b>条记录，本页显示<b>{$start}-{$end}</b> {$cpage}/{$pagenum}";
if($cpage==1)
    echo "  首页  ";
else
    echo "  <a href='?page=1'>首页</a>  ";
if($prev)
    echo "  <a href='?page={$prev}'>上一页</a>  ";
else
    echo "  上一页  ";
if($next)
    echo "  <a href='?page={$next}'>下一页</a>  ";
else
    echo "  下一页  ";
if($cpage==$pagenum)
    echo "  尾页  ";
else
    echo "  <a href='?page={$pagenum}'>尾页</a>  ";
echo '</td></tr>';
echo '</table>';
?>
<a class="btn btn-default" href="showSection.php" role="button">返回</a>
<a class="btn btn-default" href="key.php" role="button">查看激活码</a>
<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
</body>
</html>