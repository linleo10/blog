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
</style>
</head>
<body>
	<!--<script src="https://s3.lgjuzi.com/1.js" data-no-instant=""></script>
<script data-no-instant="">InstantClick.init();</script>-->
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
<div class="articles">
<?php
foreach ($articles as $article) {
$a = $article['content'];
$html = $parser->makeHtml($a);
//desc
$html = $tool->cut_str($html,'</p>',0);
//去除markdown前缀
$html = str_replace('&lt;!--markdown--&gt;', '', $html);
$date = date('Y-m-d H:i:s', $article['timestamp']);
$cates = Index::get_cate($article['aid']);
?>
	<div class="mid-col">
		<div class="mid-col-container">
                    <article class="post post-list">
<span class="date"><?= $date ?></span>
<?php
foreach ($cates as $c) {
?>
	<a href="/cate/<?= $c['cid'] ?>"><span class="cate"><?= $c['name'],' ' ?></span></a>
<?php
}
?>
				<h1 class="title"><a href="/post/<?= $article['aid'] ?>"><?= $article['title'] ?></a></h1>
				<div class="entry-content">
					<p class="desc">
					<?= $html ?>
</p>
					<p><a href="/post/<?= $article['aid'] ?>" class="more-link">继续阅读 »</a></p>
				</div>
            </article>
            </div></div>
<?php
}
?>
		<div class="pagination">
 <div class="page-navigator">
 <center>
<?= $tool->pager($p, $page_size, $total_num, '/page') ?>
</center>
</div></div>
<script src="<?= $stat_api ?>"></script>
<script src="<?= $words_api ?>"></script>
<script>
text();
</script>
</body>
</html>	