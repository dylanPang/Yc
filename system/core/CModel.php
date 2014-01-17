<?php
/**
 * 模型
 * 
 */
 class CModel extends CComponent
 {
 	protected $db=null;
 	
 	public function __construct()
 	{
 		if($this->db === null)
 		{
 			$this->db = $this->instanceDb();
 		}
 	}
 	
 	private function instanceDb()
 	{
 		return Yc::app()->ar();
 	}
 }
