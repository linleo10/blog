<?php
class Admin_Edit extends Tool
{
	public function __construct()
	{
		$this->db = Tool::init();
		$parse = Config::parse();
		$this->prefix = $parse['db']['prefix'];
	}
	
	public function show()
	{
		$aid = $_GET['aid'];
		$data = $this->db->get_all("SELECT aid,title,content FROM {$this->prefix}article WHERE aid = '$aid'");
		$get_cate = $this->db->get_all("SELECT cid,name FROM {$this->prefix}category ORDER BY cid DESC");
		include 'template/Admin/public_header.php';
		include 'template/Admin/Edit.php';
	}
	
	public function action()
	{
		$aid = $_GET['aid'];
		$title = $_POST['title'];
		$content = $_POST['content'];
		$cate = $_POST['cid'];
		//更新title和content
		$this->db->update($this->prefix.'article', array('title' => $title, 'content' => $content), array('aid'=>$aid));
		//删除原有cate
		$this->db->delete('relation', 'aid', $aid);			
		//更新cate
		foreach ($cate as $v) {
			$arr = array(
			'aid' => $aid,
			'cid' => $v
			);
$this->db->insert('relation', $arr);
		}
		header('HTTP/1.1 301 Moved Permanently'); 
		header('Location: /admin_v2/manage');
	}
}