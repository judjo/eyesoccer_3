<script>
$(function(){
	
//var geocoder =  new google.maps.Geocoder();
var lats = 0;
var lngs = 0;

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
	$('#camera-modal').modal('show');
	readURL(this);
});

function readURL2(input) {
	alert("masuk");
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#browseInp").change(function(){
	alert("tes");
	alert($(this).val());
	$('#browse-modal').modal('show');
	readURL2(this);
});

$("#upload-file-selector").change(function(){
	$('#theModal').modal('hide');
	$('#camera-modal').modal('show');
	readURL(this);
});
jQuery.get("http://ipinfo.io", function (response)
{
   lats = response.loc.split(',')[0]; 
   lngs = response.loc.split(',')[1];
   $(".lat").val(lats);
   $(".lon").val(lngs);

}, "jsonp");
$("#form_camera").submit(function(e) {
        e.preventDefault();
        var formData = new FormData($(this)[0]);

        $.ajax({  
             type: "POST",  
             url: "<?=base_url()?>eyeme/upload",  
             data: formData,
             async: false,
             cache: false,
             contentType: false,
             processData: false,
			 beforeSend: function() {
				 // $("#loader_img").show();
				 // $("body").addClass("modal-open");
			 }, 
			 complete: function() {
				//  $("#loader_img").hide();
				 // $("body").removeClass("modal-open");
				 $(".blah").attr("src","img/no_avatar.png");
				 window.location.replace("<?=base_url()?>eyeme/home");
			 },
             success: function(data) {
                 alert(data);
             }
        }); 
        return false;
})

$("#browse_camera").submit(function(e) {
        e.preventDefault();
        var formData = new FormData($(this)[0]);

        $.ajax({  
             type: "POST",  
             url: "<?=base_url()?>eyeme/upload_browse",  
             data: formData,
             async: false,
             cache: false,
             contentType: false,
             processData: false,
			 beforeSend: function() {
				 // $("#loader_img").show();
				 // $("body").addClass("modal-open");
			 }, 
			 complete: function() {
				 // $("#loader_img").hide();
				 // $("body").removeClass("modal-open");
				 // $("#blah").attr("src","img/no_avatar.png");
				 window.location.replace("<?=base_url()?>eyeme/home");
			 },
             success: function(data) {
                 alert(data);
             }
        }); 
        return false;
})

$("#upfile1").click(function () {
    $("#imgInp").trigger('click');
});
})
</script>