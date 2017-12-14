<?php require "../config/connect.php";
require "check_login.php";$admin_id=$_SESSION["admin_id"];
?>
<!DOCTYPE html>
<html>
<head>
<title>Eyesoccer</title>
<link rel="stylesheet" type="text/css" href="../bs/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../bs/fa/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="../img/tab_icon.png">
<link rel="stylesheet" type="text/css" href="../bs/css/mycss.css">
</head>
<body>

<div class="container-fluid">
<div class="row">
<div class="col-lg-2 col-md-2">
<?php require "vertical_menu.php"; ?>
</div>
<div class="col-lg-10 col-md-10"><br>
<?php
if(!isset($_SESSION["access"]) || $_SESSION["access"]!="management")
{
?>
Welcome to eyesoccer...
<?php
}
else{
	?>


<div class="col-lg-4 col-xs-12">
<div class="panel panel-primary">
      <div class="panel-heading">Last Viewed <small class="pull-right"><?=date("d-M-Y")?></small></div>
      <div class="panel-body">
	  <p><n class="pull-left">Today</n>
	 <span class="label label-info pull-right">
	  <?php
	  $today=mysqli_num_rows(mysqli_query($con,"SELECT * FROM tbl_analytic WHERE date='".date("Y-m-d")."' GROUP BY session_ip"));
	  echo $today." Unique IP";
	  ?></span >
	  </p>
	  
	  <br />
	 <p><n class="pull-left">Yesterday</n>
	 <span class="label label-info pull-right">
	  <?php
	   $today=mysqli_num_rows(mysqli_query($con,"SELECT * FROM tbl_analytic WHERE date<='".date("Y-m-d")."' and date>='".date("Y-m-d",strtotime("-1 day"))."' GROUP BY session_ip"));
	 echo $today." Unique IP";
	  ?></span >
	  </p>
	  
	  <br />
	  <p>
	  <n class="pull-left">Last 7 Day</n>
	 <span class="label label-info pull-right">
	  <?php
	  $today=mysqli_num_rows(mysqli_query($con,"SELECT * FROM tbl_analytic WHERE date<='".date("Y-m-d")."' and date>='".date("Y-m-d",strtotime("-7 day"))."' GROUP BY session_ip"));
	  echo $today." Unique IP";
	  ?></span ></p>
	  <br />
	  <p>
	  <n class="pull-left">Last Month</n>
	  <span class="label label-info pull-right">
	  <?php
	  $today=mysqli_num_rows(mysqli_query($con,"SELECT * FROM tbl_analytic WHERE date<='".date("Y-m-d")."' and date>='".date("Y-m-d",strtotime("-1 month"))."' GROUP BY session_ip"));
	  echo $today." Unique IP";
	  ?></span ></p>
    </div>
    </div>

</div>
	
	<div class="col-lg-8 col-xs-12">
<div class="panel panel-primary">
      <div class="panel-heading">Last Page Access<small class="pull-right"><?=date("d-M-Y")?></small></div>
      <div class="panel-body">
      <?php
      $last=mysqli_query($con,"SELECT * FROM tbl_analytic GROUP BY url ORDER BY date DESC LIMIT 10");
      while($ls=mysqli_fetch_array($last))
      {
      ?>
       <p><n class="pull-left"><?=$ls["url"]?></n>
       
      <m class="pull-right">
	  <n id="set11">
       <span class="label label-info pull-right">
	  <?php
	  $today=mysqli_num_rows(mysqli_query($con,"SELECT * FROM tbl_analytic WHERE date='".$ls["date"]."' AND url='".$ls["url"]."' GROUP BY session_ip"));
	  echo $today." Unique IP";
	  ?>
	 </span>
	 </n>
	  <n id="set11">
	  <span class="label label-info pull-right">
	  <?php
	  $today=mysqli_num_rows(mysqli_query($con,"SELECT * FROM tbl_analytic WHERE date<='".$ls["date"]."' and date>='".date("Y-m-d",strtotime("-7 day",$ls["date"]))."' AND url='".$ls["url"]."' GROUP BY session_ip"));
	  echo $today." Unique IP";
	  ?> </span></n>
	  <n id="set11" >
	   <span class="label label-info pull-right">
	  <?php
	  $today=mysqli_num_rows(mysqli_query($con,"SELECT * FROM tbl_analytic WHERE date<='".$ls["date"]."' and date>='".date("Y-m-d",strtotime("-1 month",$ls["date"]))."' AND url='".$ls["url"]."' GROUP BY session_ip"));
	  echo $today." Unique IP";
	  ?></span>
	  <n><m>
	  </p>
      <br />
      <?php
      }
      ?>
	 
	  
    </div>
    </div>
	</div>
	
	
	<?php
}
?>
</div>
</div>

<script src="../bs/jquery/jquery-3.2.1.min.js"></script>
<script src="../bs/js/bootstrap.min.js"></script>
</body>
</html>