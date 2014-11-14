define(function(require,exports,module){
	var Widget = require('arale-widget');
	require('polyfiller');
	var AddTokenModal = Widget.extend({
		element:'#addTokenModal',
		attrs:{
			limit_time:-1,
			app_name:'',
			add_token_path:'/api/create/accesstoken',
		},
		events:{
			'click button#addToken': 'addToken',
			'change input#app_name': 'setAppName',
			'change input#limit_time': 'setLimitTime',
		},
		setup:function(){
			//设置HTML5支持，主要针对日期
    		webshims.setOptions('forms-ext', {types: 'date'});
			webshims.polyfill('forms forms-ext');
		},
		setAppName:function(event){
			var app_name = event.currentTarget.value;
			this.set('app_name',app_name);
		},
		setLimitTime:function(event){
			var limit_time = event.currentTarget.value;
			this.set('limit_time',limit_time);
		},
		addToken:function(){
			var limit_time = this.get('limit_time');
			var app_name = this.get('app_name');
			var path = this.get('add_token_path');
			if(!limit_time.length || !app_name.length)
				return;
			else{
				limit_time = limit_time + " 00:00:00";
				$.ajax({
					url:path,
					data:{
						limit_time:limit_time,
						app_name:app_name,
					},
					type:'post',
					dataType:'json',
					success:function(data){
						var access_token = data.token;
						if(access_token){
							$("tr#new_token td#token_app").html(app_name);
							$("tr#new_token td#token_access").html(access_token);
							$("#addTokenModal").modal('hide');
							$("tr#new_token").fadeIn();
						}
					}
				});
			}
		},
	});
	module.exports = AddTokenModal;
});