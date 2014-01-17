<?php
/**
 * http请求
 */
class CHttpRequest
{
	public function __construct()
	{
		
	}
	
	public function request()
	{
		if(function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc())
		{
			if(isset($_GET))
			{
				$_GET=$this->stripSlashes($_GET);				
			}
			if(isset($_POST))
			{
				$_POST=$this->stripSlashes($_POST);				
			}
			if(isset($_REQUEST))
			{				
				$_REQUEST=$this->stripSlashes($_REQUEST);
			}
			if(isset($_COOKIE))
			{				
				$_COOKIE=$this->stripSlashes($_COOKIE);
			}
		}
	}
	
	public function stripSlashes(&$data)
	{
		return is_array($data)?array_map(array($this,'stripSlashes'),$data):stripslashes($data);
	}
}
