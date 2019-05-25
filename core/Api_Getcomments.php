<?php
class Api_Getcomments extends Tool
{
	public function __construct()
	{
		$this->db = Tool::init();
		$parse = Config::parse();
		$this->prefix = $parse['db']['prefix'];
		
	}
	
	public function respond()
	{
		$aid = $_GET['aid'];
		header('Content-Type:application/json; charset=utf-8');
		header('Expires:-1');
		header('Cache-Control:no_cache');
		header('Pragma:no-cache');
		$result = $this->db->get_all("select content,username,website,time from comments where aid = '$aid'");
		foreach ($result as $row) {
			$datas[] = array(
			'username'=>$row['username'],
			'content'=>$row['content'],
			'time'=> date('Y-m-d H:i:s',$row['time']));
		}
		exit(json_encode($datas));
	}
}