<?php
class Api_AddComments extends Tool
{
	public function __construct()
	{
		$this->db = Tool::init();
		$parse = Config::parse();
		$this->prefix = $parse['db']['prefix'];
		
	}
	
	
	/*安全过滤*/
	public function filter($str)
	{
		$str = strip_tags($str);
		$str = str_replace('%20', '', $str);
 		$str = str_replace('%27', '', $str);
 		$str = str_replace('%2527', '', $str);
 		$str = str_replace('*', '', $str);
 		$str = str_replace('"', '&quot;', $str);
 		$str = str_replace("'", '', $str);
 		$str = str_replace('"', '', $str);
 		$str = str_replace(';', '', $str);
 		$str = str_replace('<', '&lt;', $str);
 		$str = str_replace('>', '&gt;', $str);
 		$str = str_replace("{", '', $str);
 		$str = str_replace('}', '', $str);
		return $str;
	}
	
	/**
 * 获取ip地址
 * @return string
 */
public function get_ip()
{
    $ip = '';
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ips = explode(', ', $_SERVER['HTTP_X_FORWARDED_FOR']);
        foreach ($ips as $v) {
            $v = trim($v);
            if (!preg_match('/^(10|172\.16|192\.168)\./', $v)) {
                if (strtolower($v) != 'unknown') {
                    $ip = $v;
                    break;
                }
            }
        }
    } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    if (!preg_match('/[\d\.]{7,15}/', $ip)) {
        $ip = '';
    }
    return $ip;
}
	
	public function respond()
	{
		$aid = $this->filter($_POST['aid']);
		$content = $this->filter($_POST['content']);
		$username = $this->filter($_POST['username']);
		$email = $this->filter($_POST['email']);
		$website = $this->filter($_POST['website']);
		$time = $this->filter($_POST['time']);
		$data_arr = array(
		'aid' => $aid,
		'content' => $content,
		'username' => $username,
		'email' => $email,
		'website' => $website,
		'time' => $time,
		'ip' => $this->get_ip()
		);
		$add = $this->db->insert('comments',$data_arr);
	}
	
}