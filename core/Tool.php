<?php
class Tool extends Config
{
	public function init ()
	{
		$config = Config::parse();
		$db_dsn = $config['db']['dsn'];
		$db_user = $config['db']['user'];
		$db_pass = $config['db']['pass'];
		$this->prefix = $config['db']['prefix'];
		$db = new LDB($db_dsn, $db_user, $db_pass);
		$db->exec('SET NAMES utf8');
		$db_dsn = $db_user = $db_pass = NULL;
		return $db;
	}
	
	public function sys_msg($msg_detail, $link = '')
{
	echo "<script>alert(\"$msg_detail\");</script>";
	if(empty($link)) {
		echo "<script>history.go(-1);</script>";
	} else {
		echo "<script>location.href = '$link';</script>";
	}
    exit;
}
	
	/* 分页 */
	public function pager($page, $page_size, $total_num, $page_url = '')
	{
		if ($total_num <= $page_size) {
			return '';
		}
		$total_page = ceil($total_num/$page_size);
		if($total_page <= 1) {
			return '';
		}
		if ($page == $total_page) {
			$pagelist .= '<a href="/">首页</a>';
			$pagelist .= '&nbsp;<a href="'.$page_url.'/'.($page-1).'">上一页</a>';
		}else{
			$pagelist .= '<a href="/">首页</a>';
			$pagelist .= '&nbsp;<a href="'.$page_url.'/'.($page-1).'">上一页</a>';
			$pagelist .= '&nbsp;<a href="'.$page_url.'/'.($page+1).'">下一页</a>';
			$pagelist .= '&nbsp;<a href="'.$page_url.'/'.$total_page.'">尾页</a>';
		}
	return $pagelist;
	}
	
/**
 * 按符号截取字符串的指定部分
 * @param string $str 需要截取的字符串
 * @param string $sign 需要截取的符号
 * @param int $number 如是正数以0为起点从左向右截 负数则从右向左截
 * @return string 返回截取的内容
 */
 public function cut_str($str,$sign,$number){
  $array=explode($sign, $str);
  $length=count($array);
  if($number<0){
   $new_array=array_reverse($array);
   $abs_number=abs($number);
   if($abs_number>$length){
    return 'error';
   }else{
    return $new_array[$abs_number-1];
   }
  }else{
   if($number>=$length){
    return 'error';
   }else{
    return $array[$number];
   }
  }
 }
 
	
}