<?php require "../config/connect.php";
require "check_login.php";
$admin_id=$_SESSION["admin_id"];
?>
<!DOCTYPE html>
<html>
<head>
<title>Eyesoccer</title>
<link rel="stylesheet" type="text/css" href="<?=$base_url?>/bs/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?=$base_url?>/bs/fa/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="<?=$base_url?>/img/tab_icon.png">
<link rel="stylesheet" type="text/css" href="<?=$base_url?>/bs/css/mycss.css">
<link rel="stylesheet" type="text/css" href="<?=$base_url?>/bs/js/jquery.datetimepicker.css">	
<link rel="stylesheet" type="text/css" href="<?=$base_url?>/bs/datatables/media/css/dataTables.bootstrap4.css">
<style>
 .img-chooser,.img-chooser2{
	 opacity:0.5;
	 cursor:pointer;
 }
 .active{
	 opacity:1 !important;
 }
 
.drop-shadow {
        -webkit-box-shadow: 0 0 5px 0px rgba(0, 0, 0, .5);
        box-shadow: 0 0 5px 0px rgba(0, 0, 0, .5);
    }
</style>
</head>
<body>

<div class="container-fluid">
<div class="row">
<div class="col-lg-2 col-md-2">

<?php require "vertical_menu.php"; ?>

</div>
<div class="col-lg-10 col-md-10">
<h1 id="t2"><i class="fa fa-newspaper-o"></i> EYEGALLERY
</h1>
<hr></hr>
<div class="row form-group">
<div class="col-lg-9 col-md-9"><a data-toggle="modal" data-target="#m1" class="btn" id="btn5">ADD</a></div>
<div class="col-lg-3 col-md-3">
<form method="get" action="lists_eyevent">
<input type="hidden" name="admin_id" value="<?php print $admin_id ?>"><!--
<div class="form-group">
<div class="input-group">
<input type="search" name="search" placeholder="Search" class="form-control" id="set8" required>
<div class="input-group-btn">
<button type="submit" name="submit" class="btn btn-info" id="set8"><span class="fa fa-search"></span></button>
</div>
</div>
</div>	-->
</form>
</div>
</div>	
 <?php
      if(isset($_POST['opt1'])){
		  //print_r($_POST);
		  $date=date("Y-m-d H:i:s");
		 $cmd=mysqli_query($con,"insert into tbl_folder_gallery (title,description,cover_pic,folder_type,folder_category,create_date,create_by,creator_type) values ('".$_POST["title"]."','".$_POST["description"]."','".$_POST["cover_pic"]."','".$_POST["folder_type"]."','admin_gallery','". $date."','".$_SESSION["admin_id"]."','admin')"); 
			//echo "insert into tbl_gallery (title,description,pic,thumb1,upload_date,upload_user,publish_by,publish_type) values ('$title','$description','$pic','$thumb1','$now','".$_SESSION["admin_id"]."','admin','private')";
			$id=mysqli_insert_id($con);
			print_r($_POST["id_gallery"]);
			foreach($_POST["id_gallery"] as $key => $val){
				$cmd=mysqli_query($con,"insert into tbl_list_gallery (id_folder_gallery,id_gallery,create_on) values ('".$id."','".$val."','".$date."')"); 
			}
		//exit;
		header("refresh:0");
      }
      ?>
<div id="m1" class="modal fade" role="dialog">
  <div class="modal-dialog" id="set9">
    <div class="modal-content" id="set8">
    <div class="modal-header text-center"><h1 id="t3">Add Folder</h1></div>
      <div class="modal-body">
      <form method="POST" enctype="multipart/form-data">
     	
	<div class="thumbnail drop-shadow form-1 col-lg-12" no="1">
		<div class="form-group text-left col-lg-12" id="t1">Title<input type="text" name="title" class="form-control" id="ipt1" required></div>	 
		<div class="form-group text-left col-lg-12" id="t1">Description<textarea name="description" class="form-control" maxlength="500" rows="5"></textarea></div>
		<div class="form-group text-left col-lg-6" id="t1">Type<select class="form-control" name="folder_type"><option value="private">Private</option><option value="public">Public</option></select></div>
		<div class="form-group text-left col-lg-6 pull-right text-right" id="t1"><a data-toggle="modal" data-target="#m2" class="btn" id="btn5">Choose</a></div>
		<div class="form-replace pre-scrollable col-lg-12">
	
		</div>
		<input type="hidden" name="cover_pic" class="cover-pic" value="" />
	</div>
	
      <div class="form-group" id="t1"><input type="submit" name="opt1" value="ADD" class="btn btn-block" id="btn1"></div><br><br>      
      </form>
      </div>
    </div>

    
  </div>
</div>

<div id="m2" class="modal fade col-lg-10" role="dialog">
  <div class="modal-dialog col-lg-10" >
    <div class="modal-content" >
    <div class="modal-header text-center"><h1 id="t3">Choose Gallery</h1></div>
      <div class="modal-body">
      
	<div class="drop-shadow col-lg-12 pre-scrollable">
	<?php
	$image=mysqli_query($con,"SELECT * FROM tbl_gallery ORDER BY id_gallery DESC");
	$i=1;
	while($img=mysqli_fetch_array($image))
	{
		?>
		<div class="col-lg-3 ">
		<div class="thumbnail drop-shadow img-chooser" id="chooser-<?=$i?>" no="<?=$i?>">
		<img src="img_storage/<?=$img["pic"]?>" id="img4">
		<input type="checkbox" class="hidden img-check check-<?=$i?>" img-url="img_storage/<?=$img["pic"]?>" value="<?=$img["id_gallery"]?>" >
		</div>
		</div>
		
		<?php
		$i++;
	}
	?>
	</div>
      <div class="form-group" id="t1"><input type="button" name="opt2" value="Choose" class="btn btn-block choose-photo" id="btn1"></div><br><br>      
     </div>
    </div>

    
  </div>
</div>

<div class="table table-responsive">
<table class="table table-striped table-bordered " id="example">
<thead id="back900">
<th>Image</th>
<th>Title</th>
<th>Description</th>
<th>Create On</th>
<th>Create By</th>
<th>User Type</th>
<th>Action</th>	
</thead>
<tbody>
<?php
$result=mysqli_query($con,"SELECT a.*,d.pic,d.thumb1,
CASE  
  WHEN b.fullname!='' THEN b.fullname
 ELSE b.fullname
 END as upload_name FROM tbl_folder_gallery a LEFT JOIN tbl_admin b ON (b.admin_id=a.create_by AND a.creator_type='admin') LEFT JOIN tbl_member c ON (c.id_member=a.create_by AND a.creator_type='member') LEFT JOIN tbl_gallery d ON d.id_gallery=a.cover_pic order by id_folder desc");
 
while($data = mysqli_fetch_array($result))
{	
$id_folder=$data['id_folder'];	
$title=$data['title'];
$news_type=$data['description'];
$createon=$data['create_date'];
$pic=$data['thumb1'];
print'<tr>
<td><div class="thumbnail drop-shadow"><img src="img_storage/'.$pic.'" id="img4"></div></td>
<td>'.$title.'</td>
<td>'.$news_type.'</td>
<td>'.$createon.'</td><td>'.$data["upload_name"].'</td><td>'.$data["creator_type"].'</td>
<td><a href="eyefolder_edit?admin_id='.$admin_id.'&id_folder='.$id_folder.'" class="btn" id="btn3">EDIT</a>&emsp;<a href="eyefolder_delete?admin_id='.$admin_id.'&id_folder='.$id_folder.'" class="btn" id="btn4" onclick=\'confirm("Apa anda yakin untuk menghapus ?")\'>DELETE</a></td>
</tr>';
}
print'</tbody></table></div><br><br>';/*
$query=mysqli_query($con,"SELECT * FROM tbl_eyevent where id_event order by id_event desc");
$hasil=mysqli_num_rows($query);
$jumPage = ceil($hasil/$dataPerPage);
echo "<center><ul class='pagination'>";
if ($noPage > 1) echo  "<a href='eyevent?page=".($noPage-1)."&admin_id=$admin_id' id='pg1'>Prev</a>&nbsp;";
for($page = 1; $page <= $jumPage; $page++)
{
if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
{   
if (($page == 1) && ($page != 2))  echo ""; 
if (($page != ($jumPage - 1)) && ($page == $jumPage))  echo "";
if ($page == $noPage) echo "<a href='' id='pg2'><b>".$page."</b></a>&nbsp;";
else echo "<a href='eyevent?page=$page&admin_id=$admin_id' id='pg1'>".$page."</a>&nbsp;";
$page = $page;          
}
}
if ($noPage < $jumPage) echo "<a href='eyevent?page=".($noPage+1)."&admin_id=$admin_id' id='pg1'>Next</a>&nbsp;";
echo "</ul></center>";   */
?>	
</div>
</div>
</div>

<script src="tinymce_dev/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinyMCE.init({
    mode : "textareas"
});
</script>
<script src="<?=$base_url?>/bs/jquery/jquery-3.2.1.min.js"></script>
<script src="<?=$base_url?>/bs/js/bootstrap.min.js"></script>	
<script type="text/javascript" language="javascript" src="<?=$base_url?>/bs/datatables/media/js/dataTables.responsive.min.js"></script>	<script type="text/javascript" language="javascript" src="<?=$base_url?>/bs/datatables/media/js/jquery.dataTables.js">	</script>	
<script type="text/javascript" language="javascript" src="<?=$base_url?>/bs/datatables/media/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript" language="javascript" src="<?=$base_url?>/bs/js/build/jquery.datetimepicker.full.js"></script>
<script>
$(document).ready(function() {	
$('#example').DataTable();
} );
$(function(){
	$(".datetimepicker").datetimepicker({
		 format: 'Y-m-d H:i:s'
	});
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
	});
	$("body").on("click",".img-chooser",function(){
		imgid=$(this).attr("no");
		if($(this).hasClass("active"))
		{
			$(this).removeClass("active");
			$(".check-"+imgid).removeAttr("checked");
		}
		else{
			$(this).addClass("active");
			$(".check-"+imgid).attr("checked","checked");
		}
	});
	$("body").on("click",".img-chooser2",function(){
		imgid2=$(this).attr("no");
		
			$(".img-chooser2").removeClass("active");
			
			$(this).addClass("active");
			coverpic=$(".chooser2-"+imgid2).val();
			$(".cover-pic").val(coverpic);
		
	});
	$("body").on("click",".choose-photo",function(){
		i=1;
		//alert("tes");
		$(".form-replace").slideUp();
		$(".form-replace").empty()
		$(".img-check:checked").each(function(){
			urlimg=$(this).attr("img-url");
			image_id=$(this).val();
			//alert(image_id)
			$(".form-replace").append('<div class="col-lg-3 img-chooser2" no="'+i+'"><div class="thumbnail drop-shadow"><img src="'+urlimg+'" id="img4"><input type="hidden" name="id_gallery['+i+']" class="chooser2-'+i+'"  value="'+image_id+'" ></div></div>');
			i++;
			
		})
		$(".form-replace").slideDown();
		$("#m2").modal("hide");
		
	})
})
</script>
</body>
</html>