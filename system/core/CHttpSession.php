<?php
/**
 * session
 */
 class CHttpSession
 {
 	private $_start = false;
 	private $_time;
 	
 	public function __construct()
 	{
 		if($this->_start === false)
 		{
 			$this->_start = true;
 			session_start(); 			
 		}
 		
 		$this->init();
 	}
 	
 	public function init()
 	{
 		
 		
 	}
 	
 }

