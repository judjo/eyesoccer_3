if(window.outerWidth < 780){
	$(".desktop-view").hide();
	$(".desktop-view img").attr("src","");
	$(".mobile-view").show();
}else{
	$(".mobile-view").hide();
	$(".desktop-view").show();
	$(".js-menu").hide();
}
var circleClick = 0;
$(function() {
	var el = '.js-menu';
	if(window.outerWidth < 780){
		var myMenu = cssCircleMenu(el);
	}else{
		$("#circle_menu").css("display","none");
	}
	$('.bxslider').bxSlider({
		auto: true,
		captions: true,
	});
	$(".js-menu-toggle").click(function(){
		if(circleClick == 0){
			$( ".sub-right-menu" ).first().show( 100, function showNext() {
				$( this ).next( ".sub-right-menu" ).show( 100, showNext );
			});
			$( ".sub-right-menu2" ).first().show( 100, function showNext2() {
				$( this ).next( ".sub-right-menu2" ).show( 100, showNext2 );
			});
			circleClick = 1;
		}else{
			$(".sub-right-menu,.sub-right-menu2").hide(1000);
			circleClick = 0;
		}
	});
	$( ".c-circle-menu__toggle2" ).click(function() {
		//alert($( this ).css( "transform" ));
		if (  $( this ).css( "transform" ) == 'none' ){
			$(this).css("transform","rotate(45deg)");
			$(".c-circle-menu__items").show();
		} else {
			$(this).css("transform","" );
			$(".c-circle-menu__items").hide();
		}
	});
	
	var timeOutId = 0;
	var ajaxFn = function () {
			$.ajax({
				url: 'eyeme_load_img.php',
				success: function (response) {
					/* if (response == 'True') {
						clearTimeout(timeOutId);
					} else {
						timeOutId = setTimeout(ajaxFn, 1000);
						console.log("call");
					} */
					// $(".eyeme_content_img").attr("src","systems/img_storage/"+response);
					// timeOutId = setTimeout(ajaxFn, 3000);
				}
			});
	}
	ajaxFn();
});
var showeyeme = 0;
function eyemeComment(id){
	if(showeyeme == 0){
		$(".eyeme_comment_"+id).show("fast");
		showeyeme = 1;
	}else{
		$(".eyeme_comment_"+id).hide();
		showeyeme = 0;
	}
};
var i = 1;
function eyemeLove(id){
	$(".eyeme-love-notif"+id).show();
	if($(".eyeme-love-notif"+id).html() >= 1){
		$(".eyeme-love-notif"+id).html($(".eyeme-love-notif"+id).html()++);
	}else{
		$(".eyeme-love-notif"+id).html(i++);
	}
	
}
var url_eyeme = window.location.href;
var url_split = url_eyeme.split("/")[3]
if(url_split == 'eyeme' || url_split == 'eyeme_list'){
	if(window.outerWidth > 780){
		window.location.replace("/index")
	}else{
		
	}
}