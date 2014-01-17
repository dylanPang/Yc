<?php
/**
 * 应用入口类
 */
class CApplication extends CComponent
{
	public function __construct($config)
	{
		Yc::setApplication($this);
		$this->preload();
		//$this->setHandler();		
		if(is_string($config))
		{
			$config = require_once($config);
			$this->config()->setConfig($config);
			unset($config);
		}
		
		//设置网站入口
		$basePath = $this->config()->getConfig('basePath');
		if(!$basePath)
		{
			$basePath = 'site';
		}
		$this->url()->setBasePath($basePath);
		//var_dump($basePath);exit;
		$this->init();
	}
	
	/**
	 * 预先加载
	 */
	public function preload()
	{
		//暂无
	}
	
	public function setHandler()
	{
		
	}
	
	public function module($config=null)
	{
		return $this->CModule($config);
	}
	
	public function config($config=null)
	{
		return $this->CConfig($config);
	}
	
	public function url($config=null)
	{
		return $this->CUrlManager($config);
	}
	
	public function uri($config=null)
	{
		return $this->CUriManager($config);
	}
	
	public function router($config=null)
	{
		return $this->CRouterManager($config);
	}
	
	public function httpRequest($config=null)
	{
		return $this->CHttpRequest($config);
	}
	
	public function session($config=null)
	{
		return $this->CHttpSession($config);
	}
	
	public function controller($config=null)
	{
		return $this->CController($config);
	}
	
	public function ar($config=null)
	{
		return $this->CActiveRecord($config);
	}
	
	public function init()
	{
		//var_dump($this->router());exit;
		$this->httpRequest()->request();
		$this->router()->setRouter();
		//$this->session()->start();
		$controller = $this->router()->controller();
		$action = $this->router()->action();
		//var_dump($controller,$action);exit;
		$this->$controller()->$action();
	}
	
}



