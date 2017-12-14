<?php require "../config/connect.php";

require "check_login.php";

$admin_id=$_GET['admin_id'];
$karir_klub_id=$_GET['karir_klub_id'];
$club_id=$_GET['club_id'];

$cmd=mysqli_query($con,"select * from tbl_karir_klub where karir_klub_id='$karir_klub_id'");

$row=mysqli_fetch_array($cmd);
//$_SESSION['admin_id']; 

?>

<!DOCTYPE html>

<html>

<head>

<title>Eyesoccer</title>

<link rel="stylesheet" type="text/css" href="../bs/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="../bs/fa/css/font-awesome.min.css">

<link rel="icon" type="image/png" href="../img/tab_icon.png">

<link rel="stylesheet" type="text/css" href="../bs/css/mycss.css">

<link rel="stylesheet" type="text/css" href="<?=$base_url?>/bs/datatables/media/css/dataTables.bootstrap4.css">
<style>
	.remove-me,.add-more,.remove-me-timnas,.add-more-timnas,.remove-me-prestasi,.add-more-gallery,.remove-me-gallery,.add-more-lampiran,.remove-me-lampiran,.add-more-prestasi{
		float: right;
		margin-top: -35px;
	}
</style>
</head>

<body>



<div class="container-fluid">

<div class="row">

<div class="col-lg-2 col-md-2">

<?php require "vertical_menu.php"; ?>

</div>

<div class="col-lg-10 col-md-10"><br>

<h1 id="t2"><i class="fa fa-user fa-lg"></i> UPDATE KARIR KLUB</h1>

<hr></hr>
<a href='<?=$base_url."/systems/club_player?admin_id=".$_SESSION['admin_id']."&club_id=".$club_id."#player";?>' class="btn btn-danger">Kembali</a>
<form method="post" enctype="multipart/form-data">

      	<?php

      	if(isset($_POST['opt2'])){

			$bulan=$_POST['bulan'];

			$tahun=$_POST['tahun'];

			$turnamen=$_POST['turnamen'];

			$peringkat=$_POST['peringkat'];	

			$pelatih=$_POST['pelatih']; 
			
			$cmd=mysqli_query($con,"update tbl_karir_klub set bulan='".$bulan."',tahun='".$tahun."',turnamen='".$turnamen."',peringkat='".$peringkat."',pelatih='".$pelatih."',updateon='".date('Y-m-d H:i:s')."' where karir_klub_id='".$karir_klub_id."'");
			header("location:club_player?admin_id=$admin_id&club_id=$club_id");
		}

      	?> 

      <div class="form-group text-left" id="t1">Bulan<input type="text" name="bulan" value="<?php print $row['bulan']; ?>" class="form-control" id="ipt1"></div>
	  
      <div class="form-group text-left" id="t1">Tahun<input type="text" name="tahun" value="<?php print $row['tahun']; ?>" class="form-control" id="ipt1"></div>
	  
	  <div class="form-group text-left" id="t1">Turnamen<input type="text" name="turnamen" value="<?php print $row['turnamen']; ?>" class="form-control" id="ipt1"></div>
	  
	  <div class="form-group text-left" id="t1">Peringkat<input type="text" name="peringkat" value="<?php print $row['peringkat']; ?>" class="form-control" id="ipt1"></div>
	  
	  <div class="form-group text-left" id="t1">Pelatih<input type="text" name="pelatih" value="<?php print $row['pelatih']; ?>" class="form-control" id="ipt1"></div>
	  
	  
		<div class="form-group" id="t1"><input type="submit" name="opt2" value="UPDATE" class="btn btn-success">&emsp;</div><br><br>     

      </form>

</div>

</div>

</div>



<script src="tinymce_dev/js/tinymce/tinymce.min.js"></script>

<script type="text/javascript">

tinyMCE.init({

    mode : "textareas"

});

</script>

<script src="../bs/jquery/jquery-3.2.1.min.js"></script>

<script src="../bs/js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="<?=$base_url?>/bs/datatables/media/js/dataTables.responsive.min.js"></script>	<script type="text/javascript" language="javascript" src="<?=$base_url?>/bs/datatables/media/js/jquery.dataTables.js">	</script>	
<script type="text/javascript" language="javascript" src="<?=$base_url?>/bs/datatables/media/js/dataTables.bootstrap4.js"></script>
<script>
$(document).ready(function() {	
	$('.datatables').DataTable();
	
	var nextgallery = 1;
    $(".add-more-gallery").click(function(e){
        e.preventDefault();
        var addto = "#gallery_player" + nextgallery;
        var addRemove = "#gallery_player" + (nextgallery);
        nextgallery = nextgallery + 1;
        var newIn = '<input type="file" class="form-control" id="gallery_player' + nextgallery + '" name="gallery_player[]">';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (nextgallery - 1) + '" class="btn btn-danger remove-me-gallery" >-</button></div><div id="gallery_player">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#gallery_player" + nextgallery).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(nextgallery);  
        
            $('.remove-me-gallery').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#gallery_player" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });
})
</script>
</body>

</html>