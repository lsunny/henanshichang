$(document).ready(function(){

	$(".menu").css("display","none");
    $(".mhead").hover(function(){$(this).css("color","red")},function(){$(this).css("color","black")});
	
	$(".mytr:odd").css({"background-color":"#f2f2f2","cursor":"pointer"});
	$(".mytr:even").css({"background-color":"white","cursor":"pointer"});

     var color = "";
	$(".mytr").hover(function(){
		color = $(this).css("background-color");
	    $(this).css({"color":"red","background-color":"#E2EAF1"});	
	},function(){
	    $(this).css({"color":"black","background-color":color});	
	});
	
	$(".mytr").click(function(){
	    var o = $(this).find(":checkbox").first();
		o.attr("checked",!o.attr("checked"));	
	});
	
	
	$(".mhead").toggle(function(){
		$(this).next("div").slideDown("slow");
	},function(){
		$(this).next("div").slideUp("slow");
	});

	$("#imgmenu").click(function(){
		if($(top.frames["myframe"]).attr("cols")=="195,*"){
			$(top.frames["myframe"]).attr("cols","0,*");
		}else{
			$(top.frames["myframe"]).attr("cols","195,*");
		}		
	});
	
	$("#hdel").click(function(){
		if($(this).attr('checked')){
			$('input[name=del]').attr('checked',true);
		}else{
			$('input[name=del]').attr('checked',false);	
		}
	});
});


//删除所选
function delall(){
	var id = "";
	$(':checkbox[name=del][checked]').each(function(){
		id += $(this).val()+",";
	});
	id=id.substring(0,id.length-1);
	return id;
}