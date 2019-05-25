<?php
class Admin_Index extends Tool
{
	public function __construct()
	{
		$this->db = Tool::init();
		$parse = Config::parse();
		$this->prefix = $parse['db']['prefix'];
	}
	
	public function show()
	{
		$total_article = $this->db->get_col("SELECT COUNT(aid) FROM {$this->prefix}article");
		include 'template/Admin/public_header.php';
		include 'template/Admin/Index.php';
	}
	
	public function action()
	{
	}
}