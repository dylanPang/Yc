<?php
/**
 * 控制器
 */
 class CController extends CComponent
 {
 	public function model($model)
 	{
 		$class = $model.'Model';
 		$this->$model = new $class;
 		return $this->$model;
 	}
 	
 	public function component($component)
 	{
 		$this->$component = new $component;
 		return $this->$component;
 	}
 	
 	public function view($template,$args)
 	{
 		
 	}
 }


