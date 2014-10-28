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
		dataType:'json',
		success:function(data){
			var isNull=data['isNull'];
			var chapters=data['chapters'];
			if(isNull==true){
		                    $("#chapters").append("<option value=-1>"+chapters+"</option>");
			}
			else {
			       $("#chapters").append("<option value=-1>--请选择课程--</option>");
			       for(var i=0;i<chapters.length;i++){
			       	//alert(chapters[i].name);
			       	$("#chapters").append("<option value="+chapters[i].id+" >"+chapters[i].name+"</option>");
			       }	      
			       
			}
		}
	});
}