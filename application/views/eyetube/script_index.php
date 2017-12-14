<script>
$(function(){
	
	$(".mytab").click(function(){
		//alert("tes");
		//$(this).trigger("click");
		tabused=$(this).attr("totab");
		tabactive=$(this).attr("hreff");
		$("."+tabused).removeClass("active");
		$(tabactive).addClass("active");
		$(this).parent().addClass("active");
		$(this).focus();
	})
	$(".dropclick").click(function(){
		toclick=$(this).attr("todrop");
		$("."+toclick).show();
	})
	
	$(".mydroplist").click(function(){
		toclick=$(this).attr("todrop");
		$("."+toclick).hide();
	})
})
</script>