<?php
$tool = new Tool;
$config = new Config;
$arrt = $config->parse();
$cdn_host1 = $arrt['website']['cdn_host1'];
$cdn_host2 = $arrt['website']['cdn_host2'];
$stat_api = $arrt['route']['stat_api'];
$words_api = $arrt['route']['words_api'];
if (!$_COOKIE['un']) {
	exit('please login first');
}else if ($_COOKIE['un'] != md5(md5(md5('wxjscl747604')))) {
	//header('HTTP/1.1 301 Moved Permanently'); 
  //  header('Location: /?from=/admin_v2');
    exit;
}
?>
<!Doctype html>
<html>
<meta charset="UTF-8">
<meta data-n-head="true" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=0">
    <meta name="description" content="每一个你不满意的现在都有一个不够努力的曾经">
<meta name="keywords" content="LeoShen，沈成林，小沈">
<title>LeoShen's Blog</title>
<link rel="stylesheet" href="<?= $cdn_host1 ?>/sc/css/c.css">
<link rel="stylesheet" href="<?= $cdn_host1 ?>/sc/css/public.css">
<link rel="stylesheet" href="<?= $cdn_host1 ?>/sc/css/grid.css">
<link rel="stylesheet" href="<?= $cdn_host1 ?>/sc/css/style.css">
<style>
.date {
float: left;
margin-left: 5px;
}

.cate {
	float: right;
	margin-right: 5px;
}

.f1 {
	text-align: center;
}
.f2 {
	font-size: 16px;
}

.btn {
	width: 70px; /* 宽度 */
	height: 30px; /* 高度 */
	-webkit-appearance: none;
	border-radius: 0;
	border: 0;
	border-radius: 0; /* 边框半径 */
	background: #469DFF; /* 背景颜色 */
	outline: none; /* 不显示轮廓线 */
	color: white; /* 字体颜色 */
	font-size: 17px; /* 字体大小 */
}
</style>
</head>
<body>
<br><center><nav class="f1"><a class="f2" href="/admin_v2">后台首页 </a>
<a class="f2" href="/admin_v2/manage">文章列表 </a>
<a class="f2" href="/admin_v2/new_post">发布文章 </a>
<a class="f2" href="/admin_v2/settings">网站设置</a>
</nav></center><br>