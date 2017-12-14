<?php
	if($_SERVER['SERVER_PORT'] !== 443 &&
	   (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off'))
	{
		header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
		exit;
	}

	function getUserIP()
	{
		$client  = @$_SERVER['HTTP_CLIENT_IP'];
		$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
		$remote  = $_SERVER['REMOTE_ADDR'];

		if(filter_var($client, FILTER_VALIDATE_IP))
		{
			$ip = $client;
		}
		elseif(filter_var($forward, FILTER_VALIDATE_IP))
		{
			$ip = $forward;
		}
		else
		{
			$ip = $remote;
		}

		return $ip;
	}

	$_SESSION["ip"] = getUserIP();
	$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
	$actual_link = "http://".$_SERVER["HTTP_HOST"].$uri_parts[0];
	$device_detail=$_SERVER["HTTP_USER_AGENT"];
	$_SESSION["device_detail"]=$_SERVER["HTTP_USER_AGENT"];
	$_SESSION["device_detail"]="Dekstop";

	function isMobile() {
    return preg_match("/(iPhone|iPod|iPad|Android|BlackBerry|android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
	}
	if(isMobile()){
	$_SESSION["device_detail"]="Mobile";
	}
	$cek=$this->db->query("SELECT * FROM tbl_analytic WHERE session_ip='".$_SESSION["ip"]."' AND url='".$actual_link."' AND date='".date("Y-m-d")."'")->num_rows();
	if($cek<1)
	{
		$this->db->query("INSERT INTO tbl_analytic SET session_ip='".$_SESSION["ip"]."',url='".$actual_link."',date='".date("Y-m-d")."',device='".$_SESSION["device_detail"]."',device_detail='".$device_detail."'");
	}

	$cmd_ads=$this->db->query("select * from tbl_ads");

	foreach($cmd_ads->result_array() as $row_ads){
	$array[] =  $row_ads; 
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
		if(!isset($meta["share"]))
		{
	?>

<!-- Begin of SEO Meta Tags -->
<title>EyeSoccer: Portal Database & Berita Sepak Bola Terlengkap di Indonesia</title>
<meta name="title" content="EyeSoccer: Portal Database & Berita Sepak Bola Terlengkap di Indonesia" />
<meta name="description" content="Berita sepak bola terbaru, jadwal dan hasil pertandingan, live score, transfer, klasemen liga Indonesia dan dunia & profil pemain & klub dari seluruh Indonesia." />
<meta name="news_keywords" content="jadwal bola, berita bola, sepak bola, jadwal siaran bola, jadwal sepak bola, berita bola terkini, berita bola terbaru, berita sepak bola, info bola, berita bola hari ini, bola hari ini">
<meta name="googlebot-news" content="index,follow" />
<meta name="googlebot" content="index,follow" />
<meta name="robots" content="index,follow, noodp, noydir" />
<meta name="author" content="EyeSoccer.id" />
<meta name="language" content="id" />
<meta name="geo.country" content="id" name="geo.country" />
<meta http-equiv="content-language" content="In-Id" />
<meta name="geo.placename"content="Indonesia" />
<link rel="publisher" href="https://plus.google.com/u/1/105520415591265268244" />
<link rel="canonical" href="https://www.eyesoccer.id" />
<meta name="google-site-verification" content="EdjwDGdhwMeQEVZLYz7a3obpjM7g2yMDB899fGBG26c" />
<!-- End of SEO Meta Tags-->

<!-- Begin of Facebook Open graph data-->
<meta property="fb:app_id" content="140611863350583" />
<meta property="og:site_name" content="EyeSoccer" />
<meta property="og:url" content="https://www.eyesoccer.id" />
<meta property="og:type" content="article" />
<meta property="og:title" content="EyeSoccer: Portal Database & Berita Sepak Bola Terlengkap di Indonesia" />
<meta property="og:description" content="Berita sepak bola terbaru, jadwal dan hasil pertandingan, live score, transfer, klasemen liga Indonesia dan dunia & profil pemain & klub dari seluruh Indonesia." />
<meta property="og:locale" content="id_ID" />
<meta property="og:image" content="<?=base_url()?>img/tab_icon.png" />
<!--End of Facebook open graph data-->
   
<!--begin of twitter card data-->
<meta name="twitter:card" content="summary" />    
<meta name="twitter:site" content="@eyesoccer_id" />
<meta name="twitter:creator" content="@eyesoccer_id" />
<meta name="twitter:domain" content="EyeSoccer"/>
<meta name="twitter:title" content="EyeSoccer: Portal Database & Berita Sepak Bola Terlengkap di Indonesia" />
<meta name="twitter:description" content="Berita sepak bola terbaru, jadwal dan hasil pertandingan, live score, transfer, klasemen liga Indonesia dan dunia & profil pemain & klub dari seluruh Indonesia." />
<meta name="twitter:image" content="<?=base_url()?>img/tab_icon.png" />
<!--end of twitter card data-->

<link rel="stylesheet" type="text/css" href="<?=base_url()?>bs/fa/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="<?=base_url()?>img/tab_icon.png">
<!--
<link rel="stylesheet" type="text/css" href="bs/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="bs/css/mycss.css">
<link rel="stylesheet" type="text/css" href="bs/css/soccer-field.css">
<link rel="stylesheet" type="text/css" href="bs/css/arf-styles.css">
<link rel="stylesheet" type="text/css" href="bs/jquery/jquery-ui.css">
<link rel="stylesheet" href="assets/dist/css/bootstrap-select.css">
<link rel="stylesheet" type="text/css" href="bs/css/circle-menu.min.css">
<link rel="stylesheet" type="text/css" href="bs/css/jquery.bxslider.css">
<link rel="stylesheet" type="text/css" href="bs/css/main.css">
<link rel="stylesheet" type="text/css" href="bs/css/datatables.css">
<link rel="stylesheet" type="text/css" href="bs/jquery/jquery-ui.css">
-->
<!-- update yudi -->
<link href="<?=base_url()?>assets/css/bs.css" rel="stylesheet">
<link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
<!-- -->
	<?php
		}
		else{
			echo $meta["share"];
		}
		?>
		
	<style>
		.tab-pane{
		  border-top:none;
		  border-radius: 15px; 
		}
		.tab-content{
		  margin-bottom:4%;
		}
		.mytab{
		  border:thin solid #DA3030 !important;
		  border-bottom: solid #f00333 1px !important;
		  background-color:white !important;
		  color:#3d3d3d !important;
		  cursor: pointer;
		  font-family: 'Roboto-Black'; 
		}
		.nav li.active .mytab{
		  background-color:#DA3030 !important;
		  color:white !important;
		  cursor: pointer;  
		}
		/* End Landing Page */

		.btn-circle {
			width: 30px;
			height: 30px;
			padding: 6px 0px;
			border-radius: 15px;
			text-align: center;
			font-size: 12px;
			line-height: 1.42857;
		}
		.clickable{
			cursor:pointer;
		}
		.img-circle{
			width:30px !important;
			height:30px !important;
		}
	</style>	
	<?php
		if(isset($_SERVER['HTTP_USER_AGENT'])){
			$agent = $_SERVER['HTTP_USER_AGENT'];
		}	
		if (stripos( $agent, 'Chrome') !== false)
		{
		}
		elseif (stripos( $agent, 'Safari') !== false)
		{
		   echo '<style type="text/css">.mobile-view{margin-top:6em}</style>';
		}
	?>
</head>

<body>

<!--<div id="mdl1" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content" id="set2">
      <div class="modal-body">
		<img src="../systems/eyeads_storage/<?php print $array[14][3]; ?>" width="100%" />
		<div id="topright" data-dismiss="modal"><i class="fa fa-times-circle" style="color:#F27A36;"></i></div>
      </div>
    </div>
  </div>
</div>-->  
<nav>
            <div class="dekstop">
                <div class="center-dekstop m-0">
                    <div class="logo">
                        <img src="https://www.eyesoccer.id/img/logo2.png" alt="" height="40px">
                    </div>
                    <div class="btn-login">
                        <span class="btn-reg">Pendaftaran Liga</span>
						<span class="btn-btn-login">
						<a data-toggle="modal" data-target="#mlogin">Masuk</a></span>
                    </div>                
                </div>                
            </div>
        </nav>
        <!-- MENU -->
        <div class="menu">
            <div class="dekstop">
                <div class="center-dekstop m-0">
                    <span class="x-m">
                        <ul>
                            <li><a href="">EyeProfile</a>
                                <ul>
                                    <li><a href="">Klub</a></li>
                                    <li><a href="">Pemain</a></li>
                                    <li><a href="">Ofisial</a></li>
                                    <li><a href="">Perangkat Pertandingan</a></li>
                                </ul>
                            </li>
                            <li><a href="">EyeTube</a></li>
                            <li><a href="">EyeNews</a></li>
                            <li><a href="">EyeMe</a></li>
                            <li><a href="">EyeEvent</a></li>
                            <li><a href="">EyeTransfer</a></li>
                            <li><a href="">EyeTiket</a></li>
                            <li><a href="">EyeMarket</a></li>
                            <li><a href="">EyeWallet</a></li>
                        </ul>
                        <i id="src" class="material-icons">search</i>
                    </span>
                </div>
            </div>
        </div>
<?=$body?>
<br style="clear:both"/>
<!-- end of desktop view -- >

        <!-- FOOTER -->
        <footer>
            <div class="f-w">
                <a class="p-d-l-0" href="">Tentang Kami</a>
                <a href="">Tim EyeSoccer</a>
                <a href="">Pedoman Media Siber</a>
                <a href="">Kebijakan Privasi</a>
                <a href="">Panduan Komunitas</a>
                <a href="">Kontak</a>
                <a href="">Karir</a>
                <div class="container">
                    <div class="center50 c-l">
                        Copyright 2017 eyesoccer.com. All Rights Reserved.
                    </div>
                    <div class="center50">
                        <a href="" id="i-fb"><img class="first" src="assets/img/ic_facebook.png" alt=""><img class="scond" src="assets/img/ic_facebook_selected.png" alt=""></a>
                        <a href="" id="i-tw"><img class="first" src="assets/img/ic_twitter.png" alt=""><img class="scond scond-t" src="assets/img/ic_twitter-selected.png" alt=""></a>
                        <a href="" id="i-in"><img class="first" src="assets/img/ic_instagram.png" alt=""><img class="scond" src="assets/img/ic_instagram-selected.png" alt=""></a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- SEARCHBOX -->
        <div id="srcbox" class="searchbox">
            <input type="text"><button id="srcSub" type="submit">Cari</button>
        </div>
		
		
<!-- update rizki start-->
<nav class="c-circle-menu js-menu">
<img style="width: 48px;" src="<?=base_url()?>img/imageedit_6_8277776047.png" class="c-circle-menu__toggle2 js-menu-toggle">
  <button class="c-circle-menu__toggle js-menu-toggle" style="display:none">
    <span>Toggle</span>
  </button>
  <ul class="c-circle-menu__items" style="display:none">
    <li class="c-circle-menu__item" style="display:none">
      <a href="<?=base_url()?>home" class="c-circle-menu__link">
        <img src="<?=base_url()?>img/tab_icon.png" alt="">
      </a>
    </li>
    <li class="c-circle-menu__item" style="transform:translate(-113px, -10px)">
      <a href="<?=base_url()?>home" class="c-circle-menu__link">
        <img src="<?=base_url()?>img/tab_icon.png" alt="" style="max-width: 100%;">
      </a>
    </li>
    <li class="c-circle-menu__item" style="transform: translate(-72px, -61px);">
      <a href="<?=base_url()?>eyenews" class="c-circle-menu__link">
        <img src="<?=base_url()?>img/icon-eyenews.png" alt="">
      </a>
    </li>
    <li class="c-circle-menu__item" style="transform: translate(-17px, -112px);">
      <a href="<?=base_url()?>eyevent" class="c-circle-menu__link">
        <img src="<?=base_url()?>img/icon-eyevent.png" alt="">
      </a>
    </li>
    <li class="c-circle-menu__item" style="display:none">
      <a href="<?=base_url()?>home" class="c-circle-menu__link">
        <img src="<?=base_url()?>img/tools.svg" alt="">
      </a>
    </li>
  </ul>
  <ul class="c-circle-menu__items" style="left: -45px;position: absolute;top: 16px;display:none">
    <li class="c-circle-menu__item circle-menu2-1" style="display:none;">
      <a href="<?=base_url()?>home" class="c-circle-menu__link">
        <img src="<?=base_url()?>img/house.svg" alt="">
      </a>
    </li>
    <li class="c-circle-menu__item circle-menu2-2" style="transform: translate(-130px, -26px);">
      <a href="<?=base_url()?>eyeme/home" class="c-circle-menu__link">
        <img src="<?=base_url()?>img/icon-eyeme.png" alt="">
      </a>
    </li>
    <li class="c-circle-menu__item circle-menu2-3" style="transform: translate(-95px, -95px);">
     <a href="<?=base_url()?>" class="c-circle-menu__link">
        <img src="<?=base_url()?>img/icon-eyemarket.png" alt="">
      </a>
    </li>
    <li class="c-circle-menu__item circle-menu2-4" style="transform: translate(-44px, -156px);">
      <a href="<?=base_url()?>eyetube" class="c-circle-menu__link">
        <img src="<?=base_url()?>img/icon-eyetube.png" alt="">
      </a>
    </li>
    <li class="c-circle-menu__item circle-menu2-5" style="transform: translate(24px, -195px);">
      <a href="<?=base_url()?>eyeprofile/eyeprofile_tab" class="c-circle-menu__link">
        <img src="<?=base_url()?>img/icon-eyeprofile-putih.png" alt="">
      </a>
    </li>
	<li class="c-circle-menu__item circle-menu2-6" style="transform: translate(70px, -205px);display:none">
      <a href="#" class="c-circle-menu__link">
        <img src="<?=base_url()?>img/tools.svg" alt="">
      </a>
    </li>
  </ul>
  <div class="c-circle-menu__mask js-menu-mask"></div>
</nav>
<!-- update rizki end-->

<script src="<?=base_url()?>bs/jquery/jquery-3.2.1.min.js"></script>
<script src="<?=base_url()?>bs/js/datatables.js"></script>
<script src="<?=base_url()?>bs/jquery/jquery-ui.js"></script>
<script src='<?=base_url()?>bs/js/infiniteScroll.js'></script>
<script src="<?=base_url()?>bs/js/dist/circleMenu.min.js"></script>
<script src="<?=base_url()?>bs/jquery/jquery-3.2.1.min.js"></script>
<script src="<?=base_url()?>bs/jquery/jquery-ui.js"></script>
<script src="<?=base_url()?>bs/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>bs/js/jquery.bxslider.js"></script>
<script src="<?=base_url()?>bs/js/directorySlider.js"></script>
<script src="<?=base_url()?>bs/js/main.js"></script>
<script src="<?=base_url()?>bs/js/matchheight.js"></script>
<script type='text/javascript' src='<?=base_url()?>bs/js/sharethis.js#property=596cf64cb69de60011989f08&product=inline-share-buttons' async='async'></script>
<script type="text/javascript" language="javascript" src="<?=base_url()?>bs/js/build/jquery.datetimepicker.full.js"></script>
<script src='<?=base_url()?>bs/js/bootstrapvalidator.min.js'></script>
<script src="<?=base_url()?>assets/dist/js/bootstrap-select.js"></script>
<script src='<?=base_url()?>bs/js/jquery.chained.js'></script>
<script src='<?=base_url()?>bs/js/infiniteScroll.js'></script>
<!-- update yudi -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/home.js"></script>
<!-- update yudi -->
	<?php
		if(isset($extrascript))
		{
			echo $extrascript;
		}
	?>
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

<!--<div class="col-lg-12 col-xs-12" style="background-color:#A6A6A6;border-color:#2ED1A2;position:relative;bottom:0px;left:0px;display:block;width:100%"><center><h5 style="color:white;line-height:200%">&copy; eyesoccer.id 2016 | <a href="<?=base_url()?>home/tentang_kami" style="text-decoration:none;color:white">Tentang Kami</a></h5></center></div>-->


<!-- Histats.com  START  (aync)-->
<script type="text/javascript">var _Hasync= _Hasync|| [];
_Hasync.push(['Histats.start', '1,3847420,4,0,0,0,00010000']);
_Hasync.push(['Histats.fasi', '1']);
_Hasync.push(['Histats.track_hits', '']);
(function() {
var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
hs.src = ('//s10.histats.com/js15_as.js');
(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
})();</script>
<noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?3847420&101" alt="free geoip" border="0"></a></noscript>
<!-- Histats.com  END  -->

<script type="text/javascript"> 
   $(document).ready(function() {
	   
	$("body").on("focus","#userPw",function(){
		$(this).val("");
	})	
$('#reg_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
         
            
	 email: {
                validators: {
                    notEmpty: {
                        message: 'Mohon isi E-mail anda sebagai Username anda '
                    },
                    emailAddress: {
                        message: 'Mohon isi valid E-mail'
                    }
                }
            },
					
	password: {
            validators: {
				 notEmpty: {
                        message: 'Mohon isi E-mail anda sebagai Username anda '
                    },
                identical: {
                    field: 'confirmPassword',
                    message: 'Mohon konfirmasi Password anda di bawah ini'
                }
            }
        },
        confirmPassword: {
            validators: {
                identical: {
                    field: 'password',
                    message: 'Konfirmasi Password tidak sama'
                }
            }
         },
			
            
            }
        }).on('success.form.bv', function(e) {

			  alert("tes");
           // $('#success_message').slideDown({ opacity: "show" }, "slow");
            $('#submit-button').removeAttr("disabled");

			
        });

		$('body').on("click","#submit-button",function(event){
            // Get the BootstrapValidator instance
$.ajax({       
				type: "POST",   
				url: $('#reg_form').attr( 'action' ),
				data: $('#reg_form').serialize(),
				dataType: "json",  
				success:function(data){  
				if(data.html1!="existed")
				{
					alert("Terima kasih "+data.html1+" anda sudah terdaftar sebagai member kami");
					$(location).attr('href', $("#redirect-url").val());
				}
				else{
					$(".email").val("");
					$(".email").focus();
					alert("E-mail anda sudah terdaftar !");
					
				}
				}   
			});
			event.preventDefault();
	   })
    
});

</script>
<script>
if(window.outerWidth < 780){
	$(".desktop-view").hide();
	$(".desktop-view img").attr("src","");
	$(".mobile-view").show();
}else{
	$(".js-menu").hide();
	$(".mobile-view").hide();
	$(".desktop-view").show();
}
</script>
<script> 
$(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideToggle("slow");
                $("#panel").css("display","inline-block");
    });
});
$(document).ready(function(){
    $("#flip1").click(function(){
        $("#panel1").slideToggle("slow");
                $("#panel1").css("display","inline-block");
    });
});
$(window).scroll(function() {

    if ($(this).scrollTop()>0)
     {
        $('.navbar-fixed-top').css("position","fixed");
     }
    else
     {
        $('.navbar-fixed-top').css("position","relative");
     }
 });
</script>
</body>
</html>