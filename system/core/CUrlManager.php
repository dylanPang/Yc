<?php
/**
 * URL类
 */
class CUrlManager
{
	private $_basePath;
	
	/**
	 * 设置应用的根目录
	 */
	public function setBasePath($path)
	{
		$this->_basePath = realpath($path);
		//var_dump($this->_basePath);exit;
	}
	
	/**
	 * 获取应用的根目录
	 */
	public function getBasePath()
	{
		return $this->_basePath;
	}
	
	public function __construct()
	{
		//var_dump('url');
	}
}

