$(document).ready(function(e) {
    $(".focusBox").hover(function(){
		$(this).find(".prev,.next").stop(true,true).fadeTo("show",0.5);
	},function(){
		$(this).find(".prev,.next").fadeOut();
	});

	$(".focusBox").slide({
		titCell:".hd",
		mainCell:".pic",
		effect:"leftLoop",/*left leftLoop top topLoop fold fade*/ 
		autoPlay:true,
		autoPage:true,
		delayTime:600,
		interTime:3000,
		trigger:"click"
	});	
	
    $(".engcon").slide({
		mainCell:".bd ul",
		effect:"leftLoop",
		autoPlay:true,
		vis:4
	});


    $(".apcon").slide({
		mainCell:".bd ul",
		titCell:'.hd ul',
		autoPlay:true,
		autoPage:true,
		effect:"topLoop",
		easing:"easeOutCirc"
	});
	
	$(".apcon .bd ul li a").fancybox({
		    closeEffect : 'elastic',
		    openEffect : 'elastic',
			helpers : {
					title : true,
					overlay : {
						css : {'background' : 'rgba(0,0,0,0.35)'}
					}
			}
	});
	$("a[rel=box],a[rel=jp]").fancybox({
		closeEffect : 'elastic',
		openEffect : 'elastic',
		helpers : {
				title : true,
				overlay : {
					css : {'background' : 'rgba(0,0,0,0.35)'}
				}
		}
	});
		


});