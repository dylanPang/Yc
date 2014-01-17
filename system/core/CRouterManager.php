<?php
/**
 * 路由功能
 */
class CRouterManager extends CComponent
{
	private $_defaultController = 'home';
	private $_defaultAction = 'index';
	private $_module = null;
	private $_action;
	private $_controller;
	
	
	public function __construct()
	{
		
	}
	
	public function setRouter()
	{
		$route = Yc::app()->config()->getConfig('defaultController');
		if($route)
		{
			$this->_defaultController = $route;
		}
		
		$this->_module = Yc::app()->module()->getModule();
		$parseUrl = Yc::app()->uri()->parseUrl();
		if($this->_module)
		{			
			if(isset($parseUrl[1]))
			{
				$this->_controller = $this->_module.'/'.ucfirst($parseUrl[1]).'Controller';
				if(isset($parseUrl[2]))
				{
					$this->_action = $parseUrl[2].'Action';
				}else{
					$this->_action = $this->_defaultAction.'Action';
				}
			}else{
				$this->_controller = $this->_module.'/'.ucfirst($this->_defaultController).'Controller';
				$this->_action = $this->_defaultAction.'Action';
			}
			
		}else{
			if(isset($parseUrl[0]))
			{
				$this->_controller = ucfirst($parseUrl[0]).'Controller';
				if(isset($parseUrl[1]))
				{
					$this->_action = $parseUrl[1].'Action';
				}else{
					$this->_action = $this->_defaultAction.'Action';
				}
			}else{
				$this->_controller = ucfirst($this->_defaultController).'Controller';
				$this->_action = $this->_defaultAction.'Action';
			}
		}	
	}
	
	public function module()
	{
		return $this->_module;
	}
	
	public function controller()
	{
		return $this->_controller;	
	}
	
	public function action()
	{
		return $this->_action;
	}
}
