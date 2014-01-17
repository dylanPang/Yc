<?php
class CComponent
{
	public function __set($name,$value)
	{		
		$this->$name = $value;
	}
	
	public function __get($name)
	{
		return $this->$name;
	}
	
	public function __call($name,$args=null)
	{
		if(strpos($name,'C') === 0 && class_exists($name))
		{
			return Yc::createComponent($name,$args);;
		}
		if(stripos($name,'Controller') !== false)
		{
			return Yc::createComponent($name,$args);
		}
	}
}