<?php
if(!isset($_SESSION["member_id"]))
{
	?>
	<a class="fixed-icon-camera" data-toggle="modal" data-target="#mlogin"><i class="fa fa-camera"></i></a>
	<?php
}else{
	?>
	<a href="" data-toggle="modal" data-target="#theModal" class="fixed-icon-camera"><i class="fa fa-camera"></i></a>
	<?php
}
?>
		
<div id="theModal" class="modal fade text-center">
    <div class="modal-dialog">
		<div class="modal-content">
			<div>
				<span id="fileselector">
					<label onclick="$('#browseInp').click();" class="btn btn-block btn-success btn-browse-pict" style="margin: 10px auto;width: 90%;" for="upload-file-selector">
						<!--<input id="upload-file-selector" type="file" accept="image/*">-->
						<i class="fa fa-folder"></i>&nbsp;Browse
					</label>
				</span>
				
				<button class="btn btn-block btn-primary btn-take-pict" style="margin: 10px auto;width: 90%;" data-dismiss="modal" onclick="$('#upfile1').click()">
					<i class="fa fa-camera">&nbsp;Take Picture</i>
				</button>
			</div>
		</div>
	</div>
</div>


<div id="camera-modal" class="modal fade text-center">
    <div class="modal-dialog">
      <div class="modal-content">
		<form id="form_camera" method="post" enctype="multipart/form-data">	
			<br>
			<!--<i class="fa fa-camera" id="upfile1" style="cursor:pointer;font-size:30px;"></i><br>-->
			<input type='file' id="imgInp" accept="image/*;capture=camera" class="hidden" name="cameracapture"/>
			<img id="upfile1" class="blah" src="img/camera.png" alt="your image" style="width:300px;background-color: lavender;"/>
			<br>
			<input class="lat" name="lat" style="display:none"/>
			<input class="lon" name="lon" style="display:none"/>
			<div class="form-group" style="margin-left: 30px;margin-right: 30px;margin-bottom:-10px;">
			<label for="usr"></label>
			<!--<input type="text" class="form-control" id="eyeme_nama" placeholder="nama" name="nama">-->
			</div>
			<div class="form-group" style="margin-left: 30px;margin-right: 30px;margin-bottom:10px;">
			<label for="pwd"></label>
			<input type="text" class="form-control" id="eyeme_caption" placeholder="caption" name="caption">
			</div> 
			<div class="col-md-11">
			<div class="row">
			<input value="Post" type="submit" class="btn btn-success" style="width: 300px;">
			</div>
			</div>
			<br>
			<div class="col-md-11">
			<div class="row">
			<a data-dismiss="modal" class="btn btn-primary see_all_eyeme" style="width: 300px;">Close</a>
			</div>
			</div>
			<br>
		</form>
	</div>
	</div>
</div>
<div id="browse-modal" class="modal fade text-center">
    <div class="modal-dialog">
      <div class="modal-content">
		<form id="browse_camera" method="post" enctype="multipart/form-data">	
			<br>
			<!--<i class="fa fa-camera" id="upfile1" style="cursor:pointer;font-size:30px;"></i><br>-->
			<input type='file' id="browseInp" accept="image/*;capture=camera;"  class="hidden" name="browsecapture"/>
			<img id="upfile1" class="blah" src="img/camera.png" alt="your image" style="width:300px;background-color: lavender;"/>
			<br>
			<input class="lat" name="lat_browse" style="display:none"/>
			<input class="lon" name="lon_browse" style="display:none"/>
			<div class="form-group" style="margin-left: 30px;margin-right: 30px;margin-bottom:-10px;">
			<label for="usr"></label>
			<!--<input type="text" class="form-control" id="eyeme_nama" placeholder="nama" name="nama">-->
			</div>
			<div class="form-group" style="margin-left: 30px;margin-right: 30px;margin-bottom:10px;">
			<label for="pwd"></label>
			<input type="text" class="form-control" id="eyeme_caption" placeholder="caption" name="caption_browse">
			</div> 
			<div class="col-md-11">
			<div class="row">
			<input value="Post" type="submit" class="btn btn-success" style="width: 300px;">
			</div>
			</div>
			<br>
			<div class="col-md-11">
			<div class="row">
			<a data-dismiss="modal" class="btn btn-primary see_all_eyeme" style="width: 300px;">Close</a>
			</div>
			</div>
			<br>
		</form>
	</div>
	</div>
</div>
<div class="col-lg-11 col-md-11"><br>

			<div class="eyeme_list_title"><h1 class="text-center" id="t2">EYEME</h1></div>
			
			<?php
				$y=0;
				$totalnews=0;
				$gettotal=$this->db->query("select * from tbl_gallery where tags ='eyeme' order by upload_date desc")->num_rows();
				$totalnews=$gettotal;

				$cmd1=$this->db->query("select g.*,m.name,m.id_member from tbl_gallery g left join tbl_member m on m.id_member = g.upload_user where tags ='eyeme' and publish_type = 'public' and m.name is not null order by upload_date desc LIMIT 10");

				foreach($cmd1->result_array() as $row1){
					$profile=$this->db->query("SELECT * FROM tbl_member a LEFT JOIN tbl_gallery b ON b.id_gallery=a.profile_pic WHERE id_member='".$row1["id_member"]."' LIMIT 1")->row_array();
					if(isset($profile["profile_pic"]) && $profile["profile_pic"]!="" && $profile["profile_pic"]!="1")
					{
						$pic=$profile["pic"];
						$profpict = base_url()."systems/img_storage/".$pic;
					}else{
						$profpict = base_url()."img/no_avatar.png";
					}
					$y++;
					echo '<div class="insta_img">
					<div>
						<div class="avatar_eyeme">
							<img src="'.$profpict.'" class="avatar-eyeme-img"/>
						</div>
						<div class="avatar_eyeme_name">
							'.$row1['name'].'
						</div>
					</div>
					<img src="'.base_url().'systems/img_storage/'.$row1['thumb1'].'" alt="'.$row1['title'].'" style="width:100%;">
					<div class="eyeme-list-lovecomment">
						<i style="" class="fa fa-heart" onclick="eyemeLove('.$row1['id_gallery'].');"></i>
						<div class="eyeme-love-notif eyeme-love-notif'.$row1['id_gallery'].'" style="display:none">1</div>
						<i style="" class="fa fa-comments-o" onclick="eyemeComment('.$row1['id_gallery'].');"></i>
						<!--<div class="eyeme-comment-notif" style="display:none">1</div>-->
					</div>
					<div class="caption-eyeme-listimg">
						<div class="sub-caption-eyemelistimg">'.$row1['title'].'</div>
					</div>
					
					</div>
					
					<div class="col-md-10 eyeme_comment eyeme_comment_'.$row1['id_gallery'].'">
						<div>
							<b>Eye</b>&nbsp;:&nbsp; seru bener ngga ngajak2 nih<br>
							<b>Soccer</b>&nbsp;:&nbsp; nice pict...!<br>
							<b>Arif</b>&nbsp;:&nbsp; keren beneerrr<br>
							<b>Yudi</b>&nbsp;:&nbsp; ini dimana?<br>
						</div>
						<form>
						<div class="form-group form-eyeme-comment">
							<input id="comment_eyeme" style="width: 100%;" name="eyeme_comment" placeholder="tulis komentar"/>
							
							
							';
							if(!isset($_SESSION["member_id"]))
							{
								echo '<a data-toggle="modal" data-target="#mlogin" type="submit" class="btn btn-block btn-success btn-post-eyemecomment">Post</a>';
								
							}else{
								echo '<button type="submit" class="btn btn-block btn-success btn-post-eyemecomment">Post</button>';
								
							}
						echo '	
						</div> 
						<form>
					</div>
					';
				}
			?>

		</div>
