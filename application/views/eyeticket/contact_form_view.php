<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EYESOCCER</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="twitter:username" content="@eyesoccer_id" />
	<meta name="description" content="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia">
	<meta name="keywords" content="eyesoccer,bola,soccer,sepakbola,bolasepak">
	<meta name="author" content="Eyesoccer Indonesia">
    <meta property="og:image" content="<?php echo base_url("img/tab_icon.png"); ?>" />
	<meta name="twitter:description" content="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia" />
	<meta property="og:type" content="article" />
	<meta property="og:description" content="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia" />
	
	<link href="<?php echo base_url("bs/css/bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url("bs/fa/css/font-awesome.min.css"); ?>" rel="stylesheet" type="text/css" />	
	<link href="<?php echo base_url("bs/css/mycss.css"); ?>" rel="stylesheet" type="text/css" />	
	<link rel="icon" type="image/png" href="<?php echo base_url("img/tab_icon.png"); ?>" />	
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 well">
            <?php $attributes = array("class" => "form-horizontal", "name" => "contactform");
            echo form_open("contactform/index", $attributes);?>
            <fieldset>
            <legend>Ticket Information</legend>
			<div class="form-group">
                <div class="col-md-12">

                </div>
                <div class="col-md-12">
                    <input class="form-control" name="nameapplicant" placeholder="Name of Ticket Applicant" type="text" value="<?php echo set_value('nameapplicant'); ?>" />
                    <span class="text-danger"><?php echo form_error('nameapplicant'); ?></span>
                </div>
            </div>			
            <div class="form-group">
                <div class="col-md-12">

                </div>
                <div class="col-md-12">
                    <input class="form-control" name="stadium" placeholder="Stadium" type="text" value="<?php echo set_value('stadium'); ?>" />
                    <span class="text-danger"><?php echo form_error('stadium'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">

                </div>
                <div class="col-md-12">
                    <input class="form-control" name="matchnumber" placeholder="Match Number" type="text" value="<?php echo set_value('matchnumber'); ?>" />
                    <span class="text-danger"><?php echo form_error('matchnumber'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">

                </div>
                <div class="col-md-12">
                    <input class="form-control" name="matchdate" placeholder="Match Date" type="text" value="<?php echo set_value('matchdate'); ?>" />
                    <span class="text-danger"><?php echo form_error('matchdate'); ?></span>
                </div>
            </div>
			<div class="form-group">
                <div class="col-md-12">

                </div>
                <div class="col-md-12">
					<select name="seatcategory" class="form-control" id="set8">
					<option value="">Seat Category</option>
					<option value="">VIP</option>
					<option value="">NON VIP</option>					
					<?php
					?>
					</select>
                </div>
            </div>	
			<div class="form-group">
                <div class="col-md-12">

                </div>
                <div class="col-md-12">
                    <input class="form-control" name="kickoff" placeholder="Kick Off Time" type="text" value="<?php echo set_value('kickoff'); ?>" />
                    <span class="text-danger"><?php echo form_error('kickoff'); ?></span>
                </div>
            </div>		
			<div class="form-group">
                <div class="col-md-12">

                </div>
                <div class="col-md-12">
                    <input class="form-control" name="price" placeholder="Price" type="text" value="<?php echo set_value('price'); ?>" />
                    <span class="text-danger"><?php echo form_error('price'); ?></span>
                </div>
            </div>		
			<div class="form-group">
                <div class="col-md-12">

                </div>
                <div class="col-md-12">
                    <input class="form-control" name="fixture" placeholder="Match Fixture" type="text" value="<?php echo set_value('fixture'); ?>" />
                    <span class="text-danger"><?php echo form_error('fixture'); ?></span>
                </div>
            </div>				
			<div class="form-group">
                <div class="col-md-12">

                </div>
                <div class="col-md-12">
                    <input class="form-control" name="seatnumber" placeholder="Seat Number" type="text" value="<?php echo set_value('seatnumber'); ?>" />
                    <span class="text-danger"><?php echo form_error('seatnumber'); ?></span>
                </div>
            </div>			
			<!--
            <div class="form-group">
                <div class="col-md-12">

                </div>
                <div class="col-md-12">
                    <textarea class="form-control" name="message" rows="4" placeholder="Pesan"><?php echo set_value('message'); ?></textarea>
                    <span class="text-danger"><?php echo form_error('message'); ?></span>
                </div>
            </div>
			-->
            <div class="form-group">
                <div class="col-md-12">
                    <input name="submit" type="submit" class="btn btn-primary" value="Send" />
                </div>
            </div>
            </fieldset>
            <?php echo form_close(); ?>
            <?php echo $this->session->flashdata('msg'); ?>
        </div>
    </div>
</div>
<script src="<?=base_url()?>assets/jquery/jquery-3.2.1.min.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/matchheight.js"></script>
<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=596cf64cb69de60011989f08&product=inline-share-buttons' async='async'></script>
<script type="text/javascript" language="javascript" src="<?=base_url()?>assets/js/build/jquery.datetimepicker.full.js"></script>
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
</body>
</html>