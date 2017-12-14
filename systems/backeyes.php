<?php require "../config/connect.php"; ?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../bs/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../bs/fa/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="../img/tab_icon.png">
<link rel="stylesheet" type="text/css" href="../bs/css/mycss.css">
</head>
<body>

<div class="container"><br>
<div class="col-lg-4"></div>
<div class="col-lg-4" id="back7"><br>
<center><img src="../img/logo_login.png" class="img img-responsive" id="img7">
<h5 class="text-center" id="t5">Eyesoccer</h5></center><br>
<form method="post">
<div class="form-group" id="set=8">Username<input type="text" name="username" class="form-control" id="ipt1" required></div>
<div class="form-group" id="set=8">Password<input type="password" name="password" class="form-control" id="ipt1" required></div>
<div class="form-group" id="set=8"><input type="submit" name="opt1" value="LOGIN" class="btn btn-block" id="btn2"></div><br><br>
<?php
if(isset($_POST['opt1'])){
$username=$_POST['username'];
$password=$_POST['password'];
$cmd=mysqli_query($con,"select * from tbl_admin where username='$username' and password='".md5($password)."'");
$row=mysqli_fetch_array($cmd);
$admin_id=$row['admin_id'];
if($row['username']=="" && $row['password']==""){
header("refresh:0");	
}	
else{
session_start();
$_SESSION['admin_id']=$admin_id;
$_SESSION['name']=$row['fullname'];
$_SESSION['access']=$row['access'];
header("location:".$baseurl."/systems/index?admin_id=$admin_id");	
}
}
?>
</form>
</div>
<div class="col-lg-4"></div>
</div>

<script src="../bs/jquery/jquery-3.2.1.min.js"></script>
<script src="../bs/js/bootstrap.min.js"></script>
</body>
</html>