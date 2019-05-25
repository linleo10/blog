<?php
class Admin_Manage extends Tool
{
	public function __construct()
	{
		$this->db = Tool::init();
		$parse = Config::parse();
		$this->prefix = $parse['db']['prefix'];
	}
	
	public function get_cate($aid) {
		$cates = $this->db->get_all("select B.cid,B.name from relation as A,leoshen_category as B where A.aid = '$aid' and A.cid = B.cid order by A.cid desc");
		return $cates;
	}
	
	public function show()
	{
		$data = $this->db->get_all("SELECT aid,title FROM {$this->prefix}article");
		include 'template/Admin/public_header.php';
		include 'template/Admin/Manage.php';
	}
}