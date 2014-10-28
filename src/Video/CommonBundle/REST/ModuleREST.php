<?php
namespace Video\CommonBundle\REST;
use Video\CommonBundle\REST\REST_Base;

class ModuleREST extends BaseREST{
	public function getModulesByCourseId($id){
		$this->api = "courses/".$id."/modules?include[]=items";
		$chapters = $this->execute();
		return $chapters;
	}
	public function addModuleItem($course_id,$module_id,$module_item){
		$this->api= "courses/".$course_id."/modules/".$module_id."/items";
		$this->data_field=array(
			"module_item"=>$module_item,
			);
		$page=$this->execute('POST');
	}
}