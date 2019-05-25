<?php
class Index extends Tool
{
	
	public function __construct()
	{
		$this->db = Tool::init();
		$parse = Config::parse();
		$this->prefix = $parse['db']['prefix'];
		$this->page_size = $parse['pager']['page_size'];
		$this->page_url = $parse['pager']['page_url'];
	}
	
	public function index($p) {
		//$p = $_GET['page'];
		$p = $p ? $p : '1';
		$articles = $this->db->get_all("SELECT timestamp,title,content,aid FROM {$this->prefix}article WHERE is_show = '1' ORDER BY aid DESC LIMIT ".($p-1)*$this->page_size.", {$this->page_size} ");
		$total_num = $this->db->get_col("SELECT COUNT(aid) FROM {$this->prefix}article WHERE is_show = '1'");
		$page_size = $this->page_size;
		$page_url = $this->page_url;
		include "template/Index.php";
	}
	
	public function get_cate($aid) {
		$cates = $this->db->get_all("select B.cid,B.name from relation as A,leoshen_category as B where A.aid = '$aid' and A.cid = B.cid order by A.cid desc");
		return $cates;
	}
}