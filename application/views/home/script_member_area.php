
<script>

$(function(){
	
	last_no=1;
	
	$("body").on("click",".add-button",function(){
		last_no++;
		last_id=last_no;
		tags=$(".tags").val();
		$.ajax({       
		type: "POST",   
		data: { 'last_id': last_id,'tags': tags},  
		url: "<?=$base_url?>/systems/getGallery.php",   
		dataType: "json",  
		success:function(data){  
			
			$(".form-replace").append(data.html1); 
			$(".form-"+last_no).slideDown("normal");
			tinyMCE.init({
				mode : "textareas"
			});
			}   
		});
	})
	 $('.panel').matchHeight({
                    byRow: true,
                    property: 'height',
                    target: null,
                    remove: false
                });
				
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
			
//alert( e.target.result);
            $('.blah').attr('src', e.target.result);
			//$("#profil_pic_button").hide();
			$("#submit_pic").show();
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#file_pic").change(function(){
	//alert($(this).val());
	//$("#submit_pic").show();
    readURL(this);
});
jQuery.get("https://ipinfo.io", function (response)
{
   lats = response.loc.split(',')[0]; 
   lngs = response.loc.split(',')[1];
   $(".lat").val(lats);
   $(".lon").val(lngs);

}, "jsonp");
$("#change_profil").submit(function(e) {
        e.preventDefault();
        var formData = new FormData($(this)[0]);
//alert("tes");
        $.ajax({  
             type: "POST",  
             url: "profile_upload.php",  
             data: formData,
             async: false,
             cache: false,
             contentType: false,
             processData: false,
			 beforeSend: function() {
				// $("#loader_img").show();
				 $("body").addClass("modal-open");
			 }, 
			 complete: function() {
				 //$("#loader_img").hide();
				 $("body").removeClass("modal-open");
				 $(".blah").attr("src","img/no_avatar.png");
				 window.location.replace("/member-area");
				//alert("tes2");
			 },
             success: function(data) {
				// alert("tes3");
                // alert(data);
				alert("Success.");
             },
			 error: function(err){
				 //alert("tes4");
				// $.each(err, function(key, value){
				//	 alert(key+"--"+value);
				// })
				// alert(err);
			 }
        }); 
        return false;
})

$("#profil_pic_button").click(function () {
    $("#file_pic").trigger('click');
});
})



</script>