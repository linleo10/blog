<?php
class Admin_Login extends Tool
{
	public function __construct()
	{
		$this->db = Tool::init();
		$parse = Config::parse();
		$this->prefix = $parse['db']['prefix'];
	}
	
	public function show()
	{
		//include 'template/Admin/public_header.php';
		include 'template/Admin/Login.php';
	}
	
	public function check()
	{
		$username = md5(md5(md5($_POST['username'])));
		$password = md5(md5(md5($_POST['password'])));
		$correct_username = md5(md5(md5('lin747604')));
		$correct_password = md5(md5(md5('wxjscl747604')));
		if ($username == $correct_username && $password = $correct_password) {
			setcookie("un", $password, time()+3600*2,"/","blog.leoshen.cn");
			header('HTTP/1.1 301 Moved Permanently'); 
    header('Location: /admin_v2'.$uri);
		}else{
			exit('illegal operation');
		}
	}
}