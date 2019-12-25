var DoAjax = new function (){
	
	this.params = {};
	this.url = '';
	this.method = 'get';
	this.isAllowSubmit = true;
	this.requestHeader = {};
	
	this.getResponse = function(params)
	{
		try{
			
			if( !this.checkAbled() ) {
				return;
			}
			
			this.init(params);
			this.disAbled();
			this.request();
			
			
		} catch(err){
			console.log(err);
		}
		
	}
	
	
	this.init = function(params){
		
		if( typeof(params) !== 'object') {
			throw new Error('params must be json');
		}
		
		if ( !params.url ) {
			throw new Error('url not define');
		}
		
		this.url = params.url;
		delete(params.url);
		
		if( params.method ) {
			this.method = params.method.toLocaleLowerCase();
			delete(params.method);
		}
		
		if(  typeof(params.params) == 'object' && params.params != '{}' ) {
			this.params = params.params;
		}
		
		if( typeof(params.headers) == 'object' ) {
			this.requestHeaders = params.headers
		}
		
	}
	
	this.request = function()
	{
		this.loading();
		var that = this;
		
		var method = this.method;
		var url  = this.url;
		
		var params = this.params;
		this.ajaxSetup();
		$.ajax({
			type: method,
			url: url,
			data: params,
			success: function(data){
				that.success(data)
			},
			error: function () {
				that.error();
			}
		});
		
	}
	
	this.ajaxSetup = function (){
		$.ajaxSetup({
			headers: this.requestHeaders,
		})
	}
	
	this.checkAbled = function()
	{
		return this.isAllowSubmit;
	}
	
	this.enAbled = function()
	{
		this.isAllowSubmit = true;
	}
	
	this.disAbled = function()
	{
		this.isAllowSubmit = false;
	}
	
	this.loading = function()
	{
		
	}
	
	this.success = function(data)
	{
		this.enAbled();
		
		if( data.code == 200){
			alert('操作成功');
		} else {
			alert(data.msg);
		}		
		
	}
	
	this.error = function()
	{
		this.enAbled();
		alert('error');
	}
	
}
