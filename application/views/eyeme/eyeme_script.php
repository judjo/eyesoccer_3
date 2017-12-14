<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script>
var geocoder =  new google.maps.Geocoder();
var lats = 0;
var lngs = 0;
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
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
             url: "eyeme_upload.php",  
             data: formData,
             async: false,
             cache: false,
             contentType: false,
             processData: false,
			 beforeSend: function() {
				 $("#loader_img").show();
				 $("body").addClass("modal-open");
			 }, 
			 complete: function() {
				 $("#loader_img").hide();
				 $("body").removeClass("modal-open");
				 $("#blah").attr("src","img/no_avatar.png");
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
</script>