define(function(require,exports,module){
	var Widget = require('arale-widget');
	var VideoPreview = Widget.extend({
		element:'#vPreview',
		attrs: {
			video_url: '',
			video_cover: '',
			video_obj: '',
			video_div: '',
		},
		events:{

		},
		setup:function(){
		},
		refresh:function(){
			var video_url = this.get('video_url');
			var video_cover = this.get('video_cover');
			var video_obj = this.get('video_obj');
			var video_div = this.get('video_div');
			video_url = video_url;
			video_cover = 'http://'+window.location.host+'/'+video_cover;
			//Set the player
			video_div.children('video').attr('poster',video_cover);
			video_div.children('video').children('source').attr('src',video_url);
    		video_obj.ready(function() {
		      video_obj.pause();
		      video_obj.load();
			});
		},
	});
	module.exports = VideoPreview;
});