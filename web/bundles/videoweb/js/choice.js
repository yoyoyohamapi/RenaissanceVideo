$(function(){
	$("#courses").get(0).selectedIndex=0;
	$("#courses").change(function(){
		//alert(1);
		var dom=$(this);
		var course_id=dom.val();
		var path=dom.attr('path');
		$("#chapters").empty();		
		if(course_id!=-1)
		{
		    findChapters(course_id,path);
		}
		else
		$("#chapters").append("<option value=-1>--请选择课程--</option>");
	});
});
function findChapters(course_id,path){
	$.ajax({
		url:path,
		data:{course_id:course_id},
		type:'get',
		dataType:'html',
		success:function(data){
			alert(1);
			console.log(data);
		}
	});
}