<?php

$cek=$this->db->query("SELECT * FROM tbl_analytic WHERE session_ip='".$ip."' AND url='".$actual_link."' AND date='".date("Y-m-d")."'")->num_rows();
if($cek<1)
{
	$this->db->query("INSERT INTO tbl_analytic SET session_ip='".$ip."',url='".$actual_link."',date='".date("Y-m-d")."',device='".$device_agent."',device_detail='".$device_detail."'");
}

?>
<!DOCTYPE html>
<html>
<head>
<title><?=$meta["title"]?>Eyesoccer</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css"  href="<?=base_url()?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css"  href="<?=base_url()?>assets/fa/css/font-awesome.min.css">
<link rel="icon" type="image/png"  href="<?=base_url()?>assets/img/tab_icon.png">
<link rel="stylesheet" type="text/css"  href="<?=base_url()?>assets/css/mycss.css">
<link rel="stylesheet" type="text/css"  href="<?=base_url()?>assets/css/arf-styles.css">
<meta property="og:image" content="<?=$meta["image"]?>" />
<meta property="og:type" content="article" />
<meta property="og:description" content="<?=$meta["description"]?>" />
<style>
.carousel-indicators li{
	border-color:#7d7979;
	z-index:4;
}
.carousel-indicators{
	z-index:4;
}

.btn-circle {
    width: 30px;
    height: 30px;
    padding: 6px 0px;
    border-radius: 15px;
    text-align: center;
    font-size: 12px;
    line-height: 1.42857;
}
.img-hover img {
    -webkit-transition: all .3s ease; /* Safari and Chrome */
  	-moz-transition: all .3s ease; /* Firefox */
  	-o-transition: all .3s ease; /* IE 9 */
  	-ms-transition: all .3s ease; /* Opera */
  	transition: all .3s ease;
}
.img-hover img:hover {
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-transform:translateZ(0) scale(1.20); /* Safari and Chrome */
    -moz-transform:scale(1.20); /* Firefox */
    -ms-transform:scale(1.20); /* IE 9 */
    -o-transform:translatZ(0) scale(1.20); /* Opera */
    transform:translatZ(0) scale(1.20);
}
  

.drop-shadow {
        -webkit-box-shadow: 0 0 5px 0px rgba(0, 0, 0, .5);
        box-shadow: 0 0 5px 0px rgba(0, 0, 0, .5);
    }
.drop-shadow2 {
        -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
	.thumbnails {
    text-align:center;
}
.thumbnail2{
	overflow-x:hidden;
}


</style>
</head>
<body>

<?php
if(isset($popup) && $popup!="")
{
?>
<div id="mdl1" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content" id="set2">

      <div class="modal-body">

        <div id="set3">

		
    <div class="embed-responsive embed-responsive-16by9" style="height:auto !important">
	<img src="<?=base_url()?>assets/eyeads_storage/<?php echo $popup; ?>" width="100%" />
  
  </div>

		<div id="topright" data-dismiss="modal"><i class="fa fa-times-circle" style="color:#F27A36;"></i></div>

		</div>

      </div>

    </div>

  </div>

</div>
<?php
}
?>
<div id="gotop"></div>
<nav class="navbar navbar-fixed-top">
<a  href="<?=base_url()?>home"><img src="<?=base_url()?>assets/img/h1.png" class="img img-responsive hidden-xs hidden-sm"></a>
<div class="hidden-md hidden-lg" id="header_mobile" style="background:url('<?=base_url()?>assets/img/h14.png')no-repeat center center;background-size:cover;padding:7px;">
<div class="container-fluid" >
<div class="row">
<div class="col-xs-6 col-sm-6 text-left"><div class="row" style="padding-top:5px"><a onclick="openNav1()"><img src="<?=base_url()?>assets/img/lg3.png" class="img img-responsive" style="width:40px;height:40px;padding-top:0px;"></a></div></div>
<div class="col-xs-6 col-sm-6 text-right"><a  href="<?=base_url()?>home" ><img src="<?=base_url()?>assets/img/m1.png" class="img img-responsive" id="img2"></a></div>
</div>
</div>
</div>
<div id="myNav1" class="overlay" style="z-index:6 !important">
  <a  href="javascript:void(0)" class="closebtn" onclick="closeNav1()">&times;</a>
 
  <div class="overlay-content">
  
<a  href="<?=base_url()?>../list_pemain" onclick="closeNav1()" class="btn col-xs-12 col-md-6 " id="a1"><div id="back5" class="text-left"><small>Pemain</small></div></a> 
 <a  href="<?=base_url()?>../list_klub" onclick="closeNav1()" class="btn col-xs-12 col-md-6 " id="a1" class="btn"><div id="back3" class="text-left"><small>Klub</small></div></a>
    <a  href="<?=base_url()?>eyeprofile/" class="btn col-xs-12 col-md-6 " onclick="closeNav1()" id="a1" class="btn "><div id="back2" class="text-left"><small>Pendaftaran</small></div></a>

   
  </div>
</div>

</nav><br><br><br>
<a   href="#gotop" ><div class="hidden-lg hidden-md btn btn-warning btn-large btn-circle gotop drop-shadow" style="background-color:#2ED1A2;border-color:#2ED1A2
;position:fixed;bottom:2%;left:5%; z-index:8;"><i class="glyphicon glyphicon-arrow-up"></i></div></a>


<div id="mdl2" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
      <h1 class="text-center" id="t1">SIGN IN</h1>
      <div class="form-group"><input type="text" name="username" class="form-control" id="ipt1"></div>
      </div>
    </div>
  </div>
</div>

<div id="m1" class="modal fade" role="dialog">
  <div class="modal-dialog" id="set7">
    <div class="modal-content" id="set8">
    <div class="modal-header text-center"><h1 id="t3">MASUK</h1></div>
      <div class="modal-body">
      <form method="post">
      <div class="form-group" id="t1"><input type="text" name="username" class="form-control" id="ipt1" placeholder="Username" required></div>
      <div class="form-group" id="t1"><input type="password" name="password" class="form-control" id="ipt1" placeholder="Password" required></div>
      <div class="form-group" id="t1"><input type="submit" name="opt1" value="LOGIN" class="btn btn-block" id="btn1"></div><br><br>
      <?php
      if(isset($_POST['opt1'])){
      $username=$_POST['username'];
      $password=$_POST['password'];
      $cmd=$this->db->query("select * from tbl_users where username='$username' and password='$password'");
      $row=$cmd->row_array();
      $user_id=$row['user_id'];
      if($row['username']=="" && $row['password']==""){
      header("refresh:0");  
      }
      else{
      session_start();
      $_SESSION['user_id']=$user_id;
      header("location:".base_url()."/eyeprofile/daftar/club");  
      }  
      }
      ?>
      </form>
      </div>
    </div>
  </div>
</div>

<div id="player_login" class="modal fade" role="dialog">
  <div class="modal-dialog" id="set7">
    <div class="modal-content" id="set8">
    <div class="modal-header text-center"><h1 id="t3">MASUK</h1></div>
      <div class="modal-body">
      <form method="post">
      <div class="form-group" id="t1"><input type="text" name="username" class="form-control" id="ipt1" placeholder="Username" required></div>
      <div class="form-group" id="t1"><input type="password" name="password" class="form-control" id="ipt1" placeholder="Password" required></div>
      <div class="form-group" id="t1"><input type="submit" name="opt1_player" value="LOGIN" class="btn btn-block" id="btn1"></div><br><br>
      <?php
      if(isset($_POST['opt1_player'])){
      $username=$_POST['username'];
      $password=$_POST['password'];
      $cmd=$this->db->query("select * from tbl_users a INNER JOIN tbl_club b ON b.user_id=a.user_id where a.username='$username' and a.password='$password'");
      $row=$cmd->row_array();
      $user_id=$row['user_id'];
      if($row['username']=="" && $row['password']==""){
      header("refresh:0");  
      }
      else{
      session_start();
      $_SESSION['user_id']=$user_id;
      $_SESSION['club_id']=$row["club_id"];
      header("location:ds_register/player_registration");  
      }   
      }
      ?>
      </form>
      </div>
    </div>
  </div>
</div>

<div id="official_login" class="modal fade" role="dialog">
  <div class="modal-dialog" id="set7">
    <div class="modal-content" id="set8">
    <div class="modal-header text-center"><h1 id="t3">MASUK</h1></div>
      <div class="modal-body">
      <form method="post">
      <div class="form-group" id="t1"><input type="text" name="username" class="form-control" id="ipt1" placeholder="Username" required></div>
      <div class="form-group" id="t1"><input type="password" name="password" class="form-control" id="ipt1" placeholder="Password" required></div>
      <div class="form-group" id="t1"><input type="submit" name="opt1_official" value="LOGIN" class="btn btn-block" id="btn1"></div><br><br>
      <?php
      if(isset($_POST['opt1_official'])){
      $username=$_POST['username'];
      $password=$_POST['password'];
      $cmd=$this->db->query("select * from tbl_users a INNER JOIN tbl_club b ON b.user_id=a.user_id where a.username='$username' and a.password='$password'");
      $row=$cmd->row_array();
      $user_id=$row['user_id'];
      if($row['username']=="" && $row['password']==""){
      header("refresh:0");  
      }
      else{
      session_start();
      $_SESSION['user_id']=$user_id;
      $_SESSION['club_id']=$row["club_id"];
      header("location:ds_register/official_registration");  
      }  
      }
      ?>
      </form>
      </div>
    </div>
  </div>
</div>



<div class="container-fluid">

<div class="row">

<div class="col-lg-1 col-md-1 hidden-xs hidden-sm" id="back1"><br><br>
<div class="bg-menu img-hover"><a  href="<?=base_url()?>../list_pemain" title="pemain"><img src="<?=base_url()?>assets/img/a11.png" class="img img-responsive" id="set4"></a></div>
<div class="bg-menu img-hover"><a  href="<?=base_url()?>../list_klub" title="klub"><img src="<?=base_url()?>assets/img/a33.png" class="img img-responsive" id="set4"></a></div>
<div class="bg-menu img-hover"><a  href="<?=base_url()?>eyeprofile/" title="pendaftaran"><img src="<?=base_url()?>assets/img/a55.png" class="img img-responsive" id="set4"></a></div>
<br><br>

</div>

<div class="col-lg-11 col-md-11">
<br>
<?=$body?>

</div>

</div>

</div>



<script src="<?=base_url()?>assets/jquery/jquery-3.2.1.min.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/matchheight.js"></script>
<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=596cf64cb69de60011989f08&product=inline-share-buttons' async='async'></script>
<script type="text/javascript" language="javascript" src="<?=base_url()?>assets/js/build/jquery.datetimepicker.full.js"></script>
<!--<script src='http://cdnjs.cloudflare.com/ajax/libootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>-->
<script> 

$(document).ready(function(){
   $('video').bind('contextmenu',function() { return false; });
}); 
$(document).ready(function(){
  pw=parseInt($(".parent-image").width());
  cw=parseInt($(".child-image").width());
  perpc=(cw/pw)*100;
  if(perpc>=50)
  {
    $(".child-image").width(pw);
  }
//alert(perpc);
  
})
</script>
<script>
function openNav1() {document.getElementById("myNav1").style.width = "100%";}
function openNav2() {document.getElementById("myNav2").style.width = "100%";}
function closeNav1() {document.getElementById("myNav1").style.width = "0%";}	
function closeNav2() {document.getElementById("myNav2").style.width = "0%";}  

$(document).ready(function(){

    // hide .navbar first
    $(".gotop").hide();

    // fade in .navbar
    $(function () {
        $(window).scroll(function () {

                 // set distance user needs to scroll before we start fadeIn
            if ($(this).scrollTop() > 100) {
                $('.gotop').fadeIn();
            } else {
                $('.gotop').fadeOut();
            }
        });
    });

});

$(window).on('load',function(){

$('#mdl1').modal('show');

});

$(function(){
	$(".datetimepicker").datetimepicker({
		 format: 'Y-m-d H:i:s'
	});
	
})
 $(function() {
	 
                $('.thumbnail').matchHeight({
                    byRow: true,
                    property: 'height',
                    target: null,
                    remove: false
                });
        $('.thumbnail3').matchHeight({
                    byRow: true,
                    property: 'height',
                    target: null,
                    remove: false
                });
            });  

</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-102907561-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- Start Alexa Certify Javascript -->
<script type="text/javascript">
_atrk_opts = { atrk_acct:"17gwp1IW1d104B", domain:"eyesoccer.id",dynamic: true};
(function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();
</script>
<noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=17gwp1IW1d104B" style="display:none" height="1" width="1" alt="" /></noscript>
<!-- End Alexa Certify Javascript --> 


<div class="col-lg-12 col-xs-12" style="background-color:#2ED1A2;border-color:#2ED1A2;position:relative;bottom:0px;left:0px;display:block;width:100%"><center><h5 style="color:white;line-height:200%">&copy; eyesoccer.id 2016 | <a  href="<?=base_url()?>home/tentang-kami" style="text-decoration:none;color:white">Tentang Kami</a></h5></center></div> 
<style>
#back1{
	-webkit-border-bottom-right-radius: 20px;
-moz-border-radius-bottomright: 20px;
border-bottom-right-radius: 20px;
}
</style>

<?php

?>
<script>
$(function(){
$("body").on("change",".liga_provinsi",function(){
		liga_id=$(this).val();
			$.ajax({
				type: "POST",
				data: { 'liga_id': liga_id},
				url: "<?=base_url()?>../getKabupaten2.php",
				dataType: "json",
				success:function(data){
						//$(".replace_liga2").empty();
						$(".kabupaten_replace").fadeOut("fast", function(){
						$(".kabupaten_replace").empty().html(data.html1);
						$(".kabupaten_replace").fadeIn("fast");
					});
				}

			});
	})
	})
</script>
<?php

?>
<?php

?>
<script>
 $(function() {
                $('.thumbnail').matchHeight({
                    byRow: true,
                    property: 'height',
                    target: null,
                    remove: false
                });
            });
 

</script>
</body>
</html>

