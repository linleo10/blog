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
		/* $aid = $_GET['aid']; */
		$content = $this->db->get_all("SELECT title,content FROM {$this->prefix}article WHERE aid = '$aid' LIMIT 1");
		include 'template/Article.php';
	}
}