<?php
class Category extends Tool
{
	public function __construct()
	{
		$this->db = Tool::init();
		$parse = Config::parse();
		$this->prefix = $parse['db']['prefix'];
		$this->page_size = $parse['pager']['page_size'];
		$this->page_url = $parse['pager']['page_url'];
	}
	
	public function show($cid,$p)
	{
		//$cid = $_GET['cid'];
		//$cid = $args['cate'];
		$p = $p ? $p : '1';
		$articles = $this->db->get_all("select B.aid,B.title,B.content,B.timestamp from relation as A,leoshen_article as B where A.cid = '$cid' and A.aid = B.aid and is_show = '1' order by A.aid desc LIMIT ".($p-1)*$this->page_size.", {$this->page_size}");
		
		$cate_name = $this->db->get_one("SELECT name FROM leoshen_category WHERE cid = '$cid' LIMIT 1");
		$cate_name = $cate_name['name'];
		$total_num = $this->db->get_col("select count(B.aid) from relation as A,leoshen_article as B where A.cid = '$cid' and A.aid = B.aid and is_show = '1'");
		$page_size = $this->page_size;
		$page_url = $this->page_url;
		include 'template/Category.php';
	}
}