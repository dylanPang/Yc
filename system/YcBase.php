<?php 
/**
 * 定义开发模式还是产品模式，TRUE 为开发模式，FALSE是产品模式
 */
defined('DEBUG') or define('DEBUG',FALSE);

if(DEBUG)
{
	error_reporting(E_ALL);	
}else{
	error_reporting(0);
}

/**
 * 定义系统路径
 */
 defined('SYSTEM') or define("SYSTEM",dirname(__FILE__));
 
/**
 * 入口基类 
 * 
 */
class YcBase
{
	private static $_app;	
	private static $_loadClass = array();
	private static $_includePaths = array();
	private static $_coreClass = array(
										'CException' => '/core/CException.php',
										'CModel' => '/core/CModel.php',
										'CModule' => '/core/CModule.php',
										'CTplEngine' => '/core/CTplEngine.php',
										'CApplication' => '/core/CApplication.php',
										'CComponent' => '/core/CComponent.php',
										'CUrlManager' => '/core/CUrlManager.php',
										'CAttribute' => '/core/CAttribute.php',
										'CController' => '/core/CController.php',
										'CFilter' => '/core/CFilter.php',
										'CHttpCookie' => '/core/CHttpCookie.php',
										'CHttpRequest' => '/core/CHttpRequest.php',
										'CHttpSession' => '/core/CHttpSession.php',
										'CLanguage' => '/core/CLanguage.php',
										'CRbacManager' => '/core/CRbacManager.php',
										'CRouterManager' => '/core/CRouterManager.php',
										'CUriManager' => '/core/CUriManager.php',
										'CUrlManager' => '/core/CUrlManager.php',
										'CUser' => '/core/CUser.php',
										'CView' => '/core/CView.php',
										'CConfig' => '/core/CConfig.php',
									);
	/**
	 * 初始化创建应用
	 * @param string $config 配置文件路径
	 */
	public static function createCApplication($config)
	{
		new CApplication($config);
	}
	
	public static function getLoadClass()
	{
		return self::$_loadClass;
	}
	
	/**
	 * 获取对象
	 */
	public static function app()
	{
		return self::$_app;
	}
	
	/**
	 * 设置入口操作对象
	 */
	public static function setApplication($obj)
	{
		if(self::$_app === null)
		{
			self::$_app = $obj;
		}else{
			//throw new CException('加载对象出错');
		}	
	}
	
	/*public static function addLoadClass($className,$object)
	{
		self::$_loadClass[$className] = $object;
	}*/
	
	public static function createComponent($class,$config=null)
	{
		if(!isset(self::$_loadClass[$class]))
		{		
			if(($pos = stripos($class,'/')) !== false)
			{
				self::$_loadClass[$class] = self::autoload($class,$config);
			}else{				
				self::$_loadClass[$class] = new $class($config);
			}	
		}
		
		return self::$_loadClass[$class];
	}

	/**
	 * 自动加载类
	 * @param string $className
	 * return void
	 */
	public static function autoload($className,$config=null)
	{
		if(isset(self::$_loadClass[$className]))
		{
			return self::$_loadClass[$className];
		}elseif(isset(self::$_coreClass[$className])){
			include(SYSTEM.self::$_coreClass[$className]);
		}else{
			if(stripos($className,'Controller') !== false)
			{
				$path = Yc::app()->url()->getBasePath();
				//var_dump($className);exit;
				$module = self::app()->router()->module();
				if(($pos = stripos($className,'/')) !== false)
				{
					$class = substr($className,$pos+1);
					if($module)
					{
						$path .= '/modules/'.substr($className,0,$pos).'/controllers/'.$class.'.php';						
					}else{
						$path .= '/'.substr($className,0,$pos).'/controllers/'.$class.'.php';
					}
				}else{
					if($module)
					{
						$path .= '/modules/controllers/'.$className.'.php';
					}else{
						$path .= '/controllers/'.$className.'.php';
					}
					
					$class = $className;
				}
				//var_dump($path);exit;
				include($path);
				//var_dump($path);exit;
				return new $class($config);
			}
			
			if(self::$_includePaths)
			{
				foreach(self::$_includePaths as $path)
				{
					$fileName = $path.$className.'.php'; 
					if(file_exists($fileName))
					{
						include($fileName);
						break;
					}
				}
			}else{
				//
			}
		}
	}
	
}
/**
 * 注册自动加载
 */
spl_autoload_register(array('YcBase','autoload'));