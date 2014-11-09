<?php
namespace Video\CommonBundle\REST\Canvas;

class ModuleREST extends CanvasBaseREST{
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