<?php
/*ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);*/
define("CORE","core");
include 'core/Loader.php';
include 'core/LDB.php';
spl_autoload_register('Loader::load');

if (function_exists('header_remove')) {
header_remove('X-Powered-By');
} else {
@ini_set('expose_php', 'off');
}
//ini_set("display_errors", "On");
//error_reporting(E_ALL | E_STRICT);
/* error_reporting(0); */
include('vendor/autoload.php');
include('filter360.php');

use Leoshen\Dispatcher;
$dispatcher = new Dispatcher();
//itprint_r($args);
$dispatcher->get('/', function () {
    Leoshen::run('index');
});


$dispatcher->get('/page/{pid}', function ($args) {
	$arr = array(
	'pid' => $args['pid']
	);
    Leoshen::run('index',$arr);
});
$dispatcher->get('/post/{aid}', function ($args) {
	if ($args['aid'] == 28) {
		$args['aid'] = 29;
	}
	$arr = array(
	'aid' => $args['aid']
	);
    Leoshen::run('Article',$arr);
});
$dispatcher->get('/cate/{cate}', function ($args) {
	$arr = array(
	'cate' => $args['cate']
	);
    Leoshen::run('Cate', $arr);
});
$dispatcher->get('/cate/{cate}/page/{pid}', function ($args) {
	$arr = array(
	'cate' => $args['cate'],
	'pid' => $args['pid']
	);
    Leoshen::run('Cate', $arr);
});
$dispatcher->get('/api/getcomments', function () {
    Leoshen::run('api_getcomments');
});
$dispatcher->post('/api/addcomments', function () {
    Leoshen::run('api_addcomments');
});
$dispatcher->get('/api/getwords',
function () {
	Leoshen::run('getwords');
});
$dispatcher->get('/about',
function () {
	Leoshen::run('about');
});

$dispatcher->get('/admin_v2',
function () {
	Leoshen::admin('index');
});
$dispatcher->get('/admin_v2/manage',
function () {
	Leoshen::admin('manage');
});
$dispatcher->get('/admin_v2/edit',
function () {
	Leoshen::admin('edit');
});
$dispatcher->post('/admin_v2/edit/post',
function () {
	Leoshen::admin('edit_post');
});
/*$dispatcher->get('/admin_v2/settings',
function () {
	echo "tested";
	Leoshen::admin('settings');
});*/
$dispatcher->get('/admin_v2/settings', 
function () {
	Leoshen::admin('settings');
});
$dispatcher->post('/admin_v2/settings/post',
function () {
	Leoshen::admin('settings_post');
});
$dispatcher->get('/admin_v2/login', 
function () {
	Leoshen::admin('login');
});
$dispatcher->post('/admin_v2/login/check',
function () {
	Leoshen::admin('login_check');
});
// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// 去掉查询字符串
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
if ($uri == "/core" || $uri == "/template" || $uri == "/vendor" || $uri == "Leoshen") { 
    header('HTTP/1.1 301 Moved Permanently'); 
    header('Location: /?from='.$uri);
    exit;
}
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: /?from='.$uri);
    exit;
       
        
        break;
    case Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $handler($vars);
        break;
}