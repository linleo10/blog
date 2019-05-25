<?php
class Article extends Tool
{
	public function __construct()
	{
		$this->db = Tool::init();
		$parse = Config::parse();
		$this->prefix = $parse['db']['prefix'];
		
	}
	
	public function show($aid)
	{
		$content = $this->db->get_all("SELECT title,content,is_private FROM {$this->prefix}article WHERE aid = '$aid' LIMIT 1");
		if ($content[0]['is_private'] == '1' && $_COOKIE['un'] != md5(md5(md5('wxjscl747604')))) {
			Tool::sys_msg('您没有权限查看这篇文章！','/');
		}
		include 'template/Article.php';
	}
}