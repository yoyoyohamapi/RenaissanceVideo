define(function(require,exports,module){
	//下拉列表插件
	require('selectInspiration-classie');
	require('selectInspiration-selectFx');
	var Widget = require('arale-widget');
	
	var CanvasEditModal = Widget.extend({
		element:"#up2canvasModal",
		attrs: {
			video_id:-1,
			course_id: -1,
			chapter_id: -1,
			lesson_name: '',
			add_external_url_path: '/addExUrl',
			find_chapters_path: '/findchapters',
		},
		events: {
			'click div.cs-select': 'emersion',
			'click #addToCanvas': 'addToCanvas',
			'change #lesson_name': 'setLessonName',
		},
		setup:function(){
			var this_el = this;
			//初始化下拉列表
			[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
				new SelectFx(el, {
					stickyPlaceholder: false,
					//绑定选择事件
					onChange:function(val){
						if(el.id=="courses"){
							// 清空单元列表
							$('#chapters').html('<option value="-1" disabled selected="selected">--请选择章节--</option>');
							this_el.set('course_id',val);
							//发送ajax请求
							this_el.findChapters();
						}
						$("div.cs-select").removeAttr("style");
						
					},
				});
			} );			
		},
		
		//浮起
		emersion: function(event){
			$("div.cs-select").removeAttr("style");
			event.currentTarget.style.zIndex=5000;			
		},

		findChapters: function(){
				var this_el = this;
				var course_id = this.get('course_id');
				var path = this.get('find_chapters_path');
				$.ajax({
					url:path,
					data:{course_id:course_id},
					type:'get',
					dataType:'html',
					success:function(data){
						$("#chapters").parent().remove();
						$("#courses").parent().parent().next().html(data);
						[].slice.call( document.querySelectorAll( '#chapters' ) ).forEach( function(el) {	
							new SelectFx(el, {
								stickyPlaceholder: false,
								//绑定选择事件
								onChange:function(val){
									this_el.set('chapter_id',val);
									$("div.cs-select").removeAttr("style");
								},
							});
						} );									
					}
				});
		},

		setLessonName: function(event){
			var lesson_name = event.currentTarget.value;
			this.set('lesson_name',lesson_name);
		},

		addToCanvas: function(){
			var video_id = this.get('video_id');
			var course_id = this.get('course_id');
			var chapter_id = this.get('chapter_id');
			var lesson_name = this.get('lesson_name');
			var path = this.get('add_external_url_path');
			if( chapter_id<0 || video_id<0 || course_id<0 || lesson_name.length<=0)
				return;
			else
				$.ajax({
					url:path,
					data:{
						video_id: video_id,
						course_id: course_id,
						chapter_id: chapter_id,
						lesson_name: lesson_name,
					},
					type:'post',
					dataType:'json',
					success:function(data){
						if(data=="success"){
							$("#successModal").modal('show');
							setTimeout(function(){
								$("#successModal").modal('hide');
							},1000);
						}
					}
				});
			return;
		}
	});

	module.exports = CanvasEditModal;
});