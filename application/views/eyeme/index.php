<script type="text/javascript"
      src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<link rel="stylesheet" type="text/css" href="bs/css/camera.css">

<div class="row">

<div class="hidden-md hidden-lg"><img src="systems/eyeads_storage/<?php print $array[3][3]; ?>" class="img img-responsive" style="padding-top:10px;padding-left:5px;padding-right:5px;"></div>
<h1 class="text-center" id="t2">EYEME</h1><br> 

<form id="form_camera" method="post" enctype="multipart/form-data">	
	<i class="fa fa-camera" id="upfile1" style="cursor:pointer;font-size:30px;"></i><br>
	<input type='file' id="imgInp" accept="image/*" capture="camera" style="display:none" name="cameracapture"/>
	<img id="blah" src="img/no_avatar.png" alt="your image" style="width:300px;"/>
	<br>
	<input class="lat" name="lat" style="display:none"/>
	<input class="lon" name="lon" style="display:none"/>
	<div class="form-group" style="margin-left: 30px;margin-right: 30px;margin-bottom:-10px;">
	<label for="usr"></label>
	<input type="text" class="form-control" id="eyeme_nama" placeholder="nama" name="nama">
	</div>
	<div class="form-group" style="margin-left: 30px;margin-right: 30px;margin-bottom:10px;">
	<label for="pwd"></label>
	<input type="text" class="form-control" id="eyeme_caption" placeholder="caption" name="caption">
	</div> 
	<input value="Post" type="submit" class="btn btn-success">
	<br>
	<br>
	<div class="col-md-11">
	<div class="row">
	<a href="eyeme_list" class="btn btn-primary see_all_eyeme" style="width: 300px;">See All</a>
	</div>
	</div>
</form>
</div>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>