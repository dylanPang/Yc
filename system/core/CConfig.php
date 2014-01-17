<?php
/**
 * 配置类
 */
class CConfig extends CComponent
{
	//private $_config = array();
	public function __construct()
	{
		//var_dump('CConfig is loaded!');
	}
	
	public function setConfig($config)
	{		
		if(is_array($config))
		{
			foreach($config as $key => $value) 
			{
	       		$this->$key = $value;
			}
			$this->_config = $config;
		}
		
		//var_dump($this);exit;
	}
	
	public function unsetConfig($key)
	{
		unset($this->$key);
	}
	
	public function getConfig($key)
	{
		return isset($this->$key) ? $this->$key : null;
	}
	
	public function getAllConfig()
	{
		return $this->_config;
	}
}

