define(function(require,exports,module){
	//创建Dashboard这个Widget
	var Dashboard = require('./dashboard_widget.js');
	//暴露接口
	exports.run = function(){
		var dashboard = new Dashboard();
	}
});