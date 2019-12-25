$(function(){
	
    //频道选项
    $('#nav li').hover(function(){
    	$(this).addClass('cur_over');
    },function(){
    	$(this).removeClass('cur_over');
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