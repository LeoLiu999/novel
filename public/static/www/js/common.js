$(function(){
    $('.for_search_suggest').focusout(function(){
    	var val = $(':input[name=search]').val();
    	if($.trim(val) == ''){
    		$(':input[name=search]').val('可通过影视、导演、演员名称进行查找');
    	}
    	setTimeout(function(){
    		$('.search_suggest').hide()
    	}, 300);
    })
    $('.for_search_suggest').focusin(function(){
    	var val = $(':input[name=search]').val();
    	if($.trim(val) == '可通过影视、导演、演员名称进行查找'){
    		$(':input[name=search]').val('');
    	}
    	
    	$('.search_suggest').show();
    })
    
    //频道选项
    $('#nav li').hover(function(){
    	$(this).addClass('cur_over');
    },function(){
    	$(this).removeClass('cur_over');
    })
    
    //当前页
    var page = 1;
    //总页数
    var total = 3;
    var dsq = null;
    
    var start = new Date();
    var Smillseconds = start.getTime();
    dsq = setInterval(function(){
    	$('#btn-next').click();
    }, 8000);	
    $('#btn-prev').hover(function(){
    	clearInterval(dsq);
    },function(){
    	dsq = setInterval(function(){
        	$('#btn-next').click();
        }, 8000);
    })
    $('#btn-next').hover(function(){
    	clearInterval(dsq);
    },function(){
    	dsq = setInterval(function(){
        	$('#btn-next').click();
        }, 8000);
    })
    //推荐左按钮　推荐右按钮
    $('#btn-prev').click(function(){
    	var end = new Date()
    	var Emillseconds = end.getTime();
    	var IntervalTime = Emillseconds - Smillseconds;

    	if(IntervalTime < 710)
    	{
    		return ;
    	}
    	page --;
    	var $width = $(".index_screening").width();
    	$(".index_screening").find('ul').animate({ 
        	    left : '-'+$width*page+'px'
        }, 700,function(){
        	if( $(this).css('left') === '0px' ){
        		$(this).css('left', '-'+(total*$width)+'px')
        	}
        	
        } );
    	if(page < 1){
    		page = total;
    	}
    	$('#ry_page').html(page);
    	start = new Date();
    	Smillseconds = start.getTime();
    })
    $('#btn-next').click(function(){
    	var end = new Date()
    	var Emillseconds = end.getTime();
    	var IntervalTime = Emillseconds - Smillseconds;

    	if(IntervalTime < 710)
    	{
    		return ;
    	}
    	page ++;
    	var $width = $(".index_screening").width();
    	$(".index_screening").find('ul').animate({
        	  left : '-'+$width*page+'px'
         }, 700, function(){
        	 if( parseInt($(this).css('left')) < '-'+(total*$width) ){
         		$(this).css('left', '-980px');
         	}
         });
    	if(page > total){
    		page = 1;
    	}
    	$('#ry_page').html(page);
    	start = new Date();
    	Smillseconds = start.getTime();
    })
    $('#forDownloadOrRecommend').find('span').click(function(){
    	$(this).addClass('bgfff').siblings().removeClass('bgfff');
    	if( $(this).index() == 0 ){
    		$('#download').show();
    		$('#recommend').hide();
    	}else{
    		$('#download').hide();
    		$('#recommend').show();
    	}
    })
   　$('.active').siblings('a').hover(function(){
	   $(this).css('color', '#699f00')
   　},function(){
	   $(this).css('color', '#333')
   　})
    $('.now_weizhi').find('a').hover(function(){
	   $(this).css('color', '#699f00')
   　},function(){
	   $(this).css('color', '#333')
   　})
   $('.for404').find('a').hover(function(){
	   $(this).css('color', '#699f00')
   　},function(){
	   $(this).css('color', '#333')
   　})
    $('.showAndHide').toggle(function(){
    	$(this).addClass('show').removeClass('hide');
    	$('.rmfl_b').hide();
    	$(this).text('展开');
    },function(){
    	$(this).addClass('hide').removeClass('show');
    	$('.rmfl_b').show();
    	$(this).text('收起');
    })
    
    
    $('#searchOn').click(function(){
    	var val = $(':input[name=search]').val();
    	
    	if( $.trim(val) == '' || $.trim(val) == '可通过影视、导演、演员名称进行查找')
    	{
    		return false;
    	}
    })
    $('#searchOn').keydown(function(event){
    	if(event.keyCode==13){
			$(this).click();
		 } 
    })
   
    
    //返回顶部
    $('.toTop').hover(function(){
    	$(this).removeClass('topPosition45');
    }, function(){
    	$(this).addClass('topPosition45');
    })
    $(".toTop").click(function(){ //当点击标签的时候,使用animate在200毫秒的时间内,滚到顶部

    	$("html,body").animate({scrollTop:"0px"},200);

    });
    $(window).scroll(function(){  
    	var windowS = $(this).scrollTop();
    	var windowH = $(this).height();
    	if(windowS > 50){
    		$(".toTop").fadeIn(400);
    	}else{
    		$(".toTop").fadeOut(400);
    	}
    })
    //广告关闭按钮
    $('.close').click(function(){
    	$(this).parent().parent().hide();
    })
    
})