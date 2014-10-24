<?php
namespace Renaissance\CommonBundle\REST;
use Renaissance\CommonBundle\REST\REST_Base;

class ModulesREST extends BaseREST{
	public function getModulesByCourseId($id){
		$this->api = "courses/".$id."/modules?include[]=items";
		$chapters = $this->execute();
		return $chapters;
	}
	public function addMouduleItem($course_id,$module_id,$module_item){
		$this->data_field=array(
			"module_item"=>$module_item,
			);
		$page=$this->execute('POST');
	}
}