<?php
include 'md2html.php';
$parser = new HyperDown\Parser;
$tool = new Tool;
$config = new Config;
$arrt = $config->parse();
$cdn_host1 = $arrt['website']['cdn_host1'];
$cdn_host2 = $arrt['website']['cdn_host2'];
$stat_api = $arrt['route']['stat_api'];
$words_api = $arrt['route']['words_api'];
?>
<!Doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta data-n-head="true" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=0">
    <meta name="description" content="每一个你不满意的现在都有一个不够努力的曾经">
<meta name="keywords" content="LeoShen，沈成林，小沈">
<title>LeoShen's Blog</title>
<link rel="stylesheet" href="<?= $cdn_host1 ?>/sc/css/c.css">
<link rel="stylesheet" href="<?= $cdn_host1 ?>/sc/css/public.css">
<link rel="stylesheet" href="<?= $cdn_host1 ?>/sc/css/grid.css">
<link rel="stylesheet" href="<?= $cdn_host1 ?>/sc/css/style.css">
</head>
		<header id="header" class="clearfix">
    <div class="container">
        <div class="row">
            <div class="site-name col-mb-12 col-9">
                            <a id="logo" href="https://blog.leoshen.cn/">LeoShen's Blog</a>
        	    <p style="margin-bottom:8px;" id="one_sentence" class="description">加载中，请稍候...</p>
                        </div>
                        </div></div>
<center><nav class="f1"><a class="f2" href="/">Home&nbsp;&nbsp;</a>
<a class="f2" href="/about">About&nbsp;&nbsp;</a>
</nav></center><br></header>
<div class="main">
<h1>自我介绍</h1>
<p>我今年15岁,是一名初中生，准确的说是一名初三的学生。</p>
<p>我喜欢编程，在过去的六年里，我先后学了HTML、CSS、JavaScript、PHP 和 Python 等多种计算机语言。</p>
<h1>我的作品</h1>
<p><a href="https://www.leoshen.cn">我的个人主页</a></p>
<p><a href="http://www.lgjuzi.com">灵感句子</a></p>
</div>
<script src="<?= $stat_api ?>"></script>
<script src="<?= $words_api ?>"></script>
<script>
text();
</script>
</body>
</html>

