<?php
/**
 * 解析URL参数
 */
class CUriManager
{
	private $_parseUrl = array();
	
	public function parseUrl()
	{
		if($this->_parseUrl)
		{
			
			return $this->_parseUrl;
		}
		$uriProtocol = Yc::app()->config()->getConfig('uriProtocol');
		if($uriProtocol && isset($_SERVER['PATH_INFO']))
		{
			$pathInfo = trim($_SERVER['PATH_INFO'],'/');
			$this->_parseUrl = explode($uriProtocol,$pathInfo);
			
			return $this->_parseUrl;
		}else{
	
		}
		//var_dump($_SERVER['']);
	}
	
}
