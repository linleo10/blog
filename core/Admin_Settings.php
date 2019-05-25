<?php
class Admin_Settings extends Tool
{
	public function __construct()
	{
		$this->db = Tool::init();
		$parse = Config::parse();
		$this->prefix = $parse['db']['prefix'];
	}
	
	public function show()
	{
		$data = yaml_parse_file('core/config/config.yaml');
		//website
		$website = $data['website'];
		$domain = $website['domain'];
		$is_ssl_on = $website['is_ssl_on'];
		$force_ssl = $website['force_ssl'];
		$cdn_host1 = $website['cdn_host1'];
		$cdn_host2 = $website['cdn_host2'];
		//db
		$db = $data['db'];
		$dsn = $db['dsn'];
		$user = $db['user'];
		$pass = $db['pass'];
		$prefix = $db['prefix'];
		//pager
		$pager = $data['pager'];
		$page_size = $pager['page_size'];
		$page_url = $pager['page_url'];
		//route
		$route = $data['route'];
		$words_api = $data['words_api'];
		$getcomments_api = $route['getcomments_api'];
		$addcomments_api = $route['addcomments_api'];
		$stat_api = $route['stat_api'];
		include 'template/Admin/public_header.php';
		include 'template/Admin/Settings.php';
	}
	
	public function action()
	{
		$domain = $_POST['domain'];
		$is_ssl_on = $_POST['is_ssl_on'];
		$force_ssl = $_POST['force_ssl'];
		$cdn_host1 = $_POST['cdn_host1'];
		$cdn_host2 = $_POST['cdn_host2'];
		$dsn = $_POST['dsn'];
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$prefix = $_POST['prefix'];
		$page_size = $_POST['page_size'];
		$page_url = $_POST['page_url'];
		$words_api = $_POST['words_api'];
		$getcomments_api = $_POST['getcomments_api'];
		$addcomments_api = $_POST['addcomments_api'];
		$stat_api = $_POST['stat_api'];
		$data['website'] = array(
		'domain' => $domain,
		'is_ssl_on' => $is_ssl_on,
		'force_ssl' => $force_ssl,
		'cdn_host1' => $cdn_host1,
		'cdn_host2' => $cdn_host2,
		);
		$data['db'] = array(
		'dsn' => $dsn,
		'user' => $user,
		'pass' => $pass,
		'prefix' => $prefix
		);
		$data['pager'] = array(
		'page_size' => $page_size,
		'page_url' => $page_url
		);
		$data['route'] = array(
		'words_api' => $words_api,
		'getcomments_api' => $getcomments_api,
		'addcomments_api' => $addcomments_api,
		'stat_api' => $stat_api
		);
		$yaml = yaml_emit($data);
		print_r($yaml);
		$confile = fopen("core/config/config.yaml", "w") or die("Unable to open file!");
		fwrite($confile, $yaml);
		fclose($confile);
	}
}