<?php 
$no=$_POST["last_id"];
$html2='<div class="thumbnail drop-shadow form-'.$no.' col-lg-12" no="'.$no.'" style="display:none">
		<div class="form-group text-left col-lg-12" id="t1">Title<input type="text" name="title['.$no.']" class="form-control" id="ipt1"></div>
	 
		<div class="form-group text-left col-lg-12" id="t1">Tags<input type="text" name="tags['.$no.']" class="form-control" value="'.$_POST["tags"].'" id="ipt1" ></div>
		<div class="form-group text-left col-lg-12" id="t1">Description<textarea name="description['.$no.']" class="form-control" maxlength="500" rows="5"></textarea></div>
		<div class="form-group text-left col-lg-6" id="t1">Upload Image<input type="file" name="pic['.$no.']" class="form-control" id="set8"></div>
		<div class="form-group text-left col-lg-6 pull-right text-right" id="t1"><button type="button" class="add-more add-button btn btn-info pull-right" no="'.$no.'">Add More</button></div>
	</div>';


$data["html1"]=$html2;
echo json_encode($data);
?>