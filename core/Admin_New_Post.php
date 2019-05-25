<?php
class Admin_New_Post extends Tool
{
	public function __construct()
	{
		$this->db = Tool::init();
		$parse = Config::parse();
		$this->prefix = $parse['db']['prefix'];
	}
	
	public function show()
	{
		$get_cate = $this->db->get_all("SELECT cid,name FROM {$this->prefix}category ORDER BY cid DESC");
		include 'template/Admin/public_header.php';
		include 'template/Admin/New_Post.php';
	}
	
	public function action()
	{
		$title = $_POST['title'];
		$content = $_POST['content'];
		$cate = $_POST['cid'];
		$author = $_POST['author'];
		$timestamp = strtotime(date("Y-m-d H:i:s"));
		$is_show = $_POST['is_show'];
		$is_private = $_POST['is_private'];
		//插入title和content
		$arr = array(
		'title' => $title,
		'content' => $content,
		'author' => $author,
		'timestamp' => $timestamp,
		'is_show' => $is_show,
		'is_private' => $is_private
		);
		$this->db->insert($this->prefix.'article', $arr);
		//PDO获取刚刚插入的aid
		$aid = $this->db->lastInsertId();
		//如果之前存在意外情况，先删除原有cate
		$this->db->delete('relation', 'aid', $aid);			
		//更新cate
		foreach ($cate as $v) {
			$cate_arr = array(
			'aid' => $aid,
			'cid' => $v
			);
		$this->db->insert('relation', $cate_arr);
		}
		header('HTTP/1.1 301 Moved Permanently'); 
		header('Location: /admin_v2/manage');
	}
}