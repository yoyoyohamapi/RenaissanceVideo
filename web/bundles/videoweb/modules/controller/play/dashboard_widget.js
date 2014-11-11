define(function(require, exports, module){
	var Widget = require('arale-widget');
	require('videojs');
	var CanvasEditModal = require('./canvasEditModal_widget.js');
	var AddTokenModal = require('./addTokenModal_widget.js');
	var VideoPreview = require('./videoPreview_widget.js');
	var canvasEditModal;
	var addTokenModal;
	var videoPreview;
	//创建Dashboard这个Widget
	var Dashboard = Widget.extend({
		//Widget操作DOM
		element: "#dashboard",
		//该Wigdet事件绑定
		events: {
			'click #upVideoBtn,#upVideoCoverBtn': 'openSelectDialog',
			'change #form_video,#form_cover': 'showTitle',
			'click #toSubmit': 'form_submit',
			'click #openCanvasEditDlg': 'initCanvasEditModal',
			'click #showTokenModal': 'initAddTokenModal',
			'click #showTokenList': 'showTokenList',
			'click #vfileList table tbody tr': 'previewVideo',
			'click #recreateToken': 'recreateToken',
		},

		//打开文件选择框
		openSelectDialog: function(event){
			//根据触发按钮选择应当打开哪个文件选择框
			var btn_id = event.currentTarget.id;
			switch(btn_id){
				case 'upVideoBtn':
				//打开视频选择框
					$('#form_video').trigger('click');
					break;
				case 'upVideoCoverBtn':
				//打开封面选择框
					$('#form_cover').trigger('click');
					break;
				default:break;

			}	
		},
		//在状态栏显示上传文件信息
		showTitle: function(event){
			var input_id = event.currentTarget.id;
			switch(input_id){
				case 'form_video':
				// 状态栏显示视频名
					var file=document.getElementById('form_video').files[0];
					$('#videoName').text(file.name); 
					break;
				case 'form_cover':
				//状态栏显示封面名
					var file=document.getElementById('form_cover').files[0];
					$('#coverName').text(file.name);
					break;
				default:break;

			}
			this.submitBtnRefresh();				
		},
		//判断是否可执行上传
		submitBtnRefresh: function(){
			if( $("#videoName").text().length && $("#videoName").text().length ){
				$("#toSubmit").text('确认上传');
				$("#toSubmit").attr('disabled',false);
			}
			else{
				$("#toSubmit").text('暂无文件');
				$("#toSubmit").attr('disabled',true);
			}
		},
		//提交表单
		form_submit:function(){
			//判断是否可上传
			var videoFile = document.getElementById('form_video').files[0];
			var videoCoverFile = document.getElementById('form_cover').files[0];
			if(!videoFile || !videoCoverFile)
				return;
			else
				$('#form_upload').trigger('click');
		},
		//打开Modal编辑框时更改当前操作视频号
		initCanvasEditModal:function(event){
			//获取当前操作视频ID
			var video_id = event.currentTarget.attributes['data-videoId'].value;
			//打开modal层判断widget的对象是否存在
			if(!canvasEditModal)
				canvasEditModal = new CanvasEditModal();
			//为其附上属性
			canvasEditModal.set('video_id',video_id);

		},
		initAddTokenModal:function(){
			if(!addTokenModal)
				addTokenModal = new AddTokenModal();
		},
		//显示tokenList
		showTokenList: function(){
			$("#tokenList").toggle();
		},
		//视频预览
		previewVideo: function(event){
			var tr = event.currentTarget;
			var video_url = tr.getAttribute('data-videoUrl');
			var video_cover = tr.getAttribute('data-videoCover'); 
			if(!videoPreview){
				videoPreview = new VideoPreview({
					video_obj: _V_("#videoPlayer"),
					video_div: $('#videoPlayer')
				});
			}
			videoPreview.set('video_url',video_url);
			videoPreview.set('video_cover',video_cover);
			videoPreview.refresh();
		},
		//重新生成Token
		recreateToken: function(event){
			var token_id = event.currentTarget.getAttribute('data-tokenId');
			var path = '/api/recreate/accesstoken';
			$.ajax({
				url:path,
				data:{
						token_id:token_id
					},
					type:'post',
					dataType:'json',
					success:function(data){
						if(data=="success"){
							window.location.reload();
						}
					}
			});
		}

	});
	
	module.exports = Dashboard;

});