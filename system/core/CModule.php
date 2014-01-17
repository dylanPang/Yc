<?php
/**
 * 模块
 * 
 */
 class CModule extends CComponent
 {
 	public function __construct()
 	{
 		
 	}
 	public function getModule()
 	{
 		$modules = Yc::app()->config()->getConfig('modules');
 		
 		if(is_array($modules) && !empty($modules))
 		{
 			$urlParams = Yc::app()->uri()->parseUrl();
 			if(array_key_exists($urlParams[0],$modules))
 			{
 				return $urlParams[0];
 			}
 		}
		
		return isset($_GET['m']) ? $_GET['m'] : null;
 	}
 	
 }