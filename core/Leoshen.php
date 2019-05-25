<?php

/**
 * Class Leoshen 统一入口文件
 */
class Leoshen
{
    public static function run($tag = '',$pr = '')
    {
        if ($tag == 'index') {
            $index = Factory::create('Index');
            $index->index($pr['pid']);
        } else if ($tag == 'Article') {
            $post = Factory::create('Article');
            $post->show($pr['aid']);
        } else if ($tag == 'Cate') {
            $cate = Factory::create('Category');
            $cate->show($pr['cate'],$pr['pid']);
        } else if ($tag == 'api_getcomments') {
        	$comment_api = Factory::create('Api_Getcomments');
        	$comment_api->respond();
        }else if ($tag == 'api_addcomments') {
        	$add_comment_api = Factory::create('Api_Addcomments');
        	$add_comment_api->respond();
        } else if ($tag == 'getwords') {
        	$words_api = Factory::create('Api_Getwords');
        	$words_api->respond();
        } else if ($tag == 'about') {
        	$about = Factory::create('About');
        	$about->show();
        }
    }
    public static function admin($tag = '', $pr = '')
    {
    	switch($tag)
    	{
    		case 'index':
    		$index = Factory::create('Admin_Index');
    		$index->show();
    		break;
    		
    		case 'manage':
    		$manage = Factory::create('Admin_Manage');
    		$manage->show();
    		break;
    		
    		case 'edit':
    		$edit = Factory::create('Admin_Edit');
    		$edit->show();
    		break;
    		
    		case 'edit_post':
    		$edit = Factory::create('Admin_Edit');
    		$edit->action();
    		break;
    		
    		case 'settings':
    		$settings = Factory::create('Admin_Settings');
    		$settings->show();
    		break;
    		
    		case 'settings_post':
    		$settings = Factory::create('Admin_Settings');
    		$settings->action();
    		break;
    		
    		case 'login':
    		$login = Factory::create('Admin_Login');
    		$login->show();
    		break;
    		
    		case 'login_check':
    		$login = Factory::create('Admin_Login');
    		$login->check();
    		break;
    	}
    	
    }
}
