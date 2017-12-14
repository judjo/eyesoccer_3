<?php require "config/connect.php"; ?>
<!DOCTYPE html>
<html>
<head>
<title>Eyesoccer</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="bs/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="bs/fa/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="img/tab_icon.png">
<link rel="stylesheet" type="text/css" href="bs/css/mycss.css">
</head>
<body>

<?php require "header.php"; ?>

<div class="container-fluid">
<div class="row">
<div class="col-lg-1 col-md-1 hidden-xs hidden-sm" id="back1"><br><br>
<?php require "vertical_menu.php"; ?>
<br><br>
</div>
<div class="col-lg-11 col-md-11"><br>

<div id="back3"><i class="fa fa-flag"></i> Official Team</div><br>
<div class="form-group text-left" id="t1">Nama Lengkap<input type="text" name="name" class="form-control" id="ipt1" required></div>
<div class="form-group text-left" id="t1">Kewarganegaraan<input type="text" name="nationality" class="form-control" id="ipt1"></div>
<div class="form-group text-left" id="t1">No. Identitas<input type="text" name="no_indentity" class="form-control" id="ipt1" required></div>
<div class="form-group text-left" id="t1">Tempat / Tanggal Lahir<input type="text" name="birth_of_date" class="form-control" id="ipt1"></div>
<div class="form-group text-left" id="t1">Alamat<textarea name="address" class="form-control" rows="5"></textarea></div>
<div class="form-group text-left" id="t1">Telepon<input type="text" name="phone" class="form-control" id="ipt1" required></div>
<div class="form-group text-left" id="t1">Email<input type="email" name="email" class="form-control" id="ipt1" required></div>
<div class="form-group text-left" id="t1">Club Saat Ini<input type="text" name="club_now" class="form-control" id="ipt1" required></div>
<div class="form-group text-left" id="t1">Posisi / Jabatan<input type="text" name="position" class="form-control" id="ipt1"></div>
<div class="form-group text-left" id="t1">Lisensi (Pelatih)<input type="text" name="license" class="form-control" id="ipt1"></div>
<div class="form-group text-left" id="t1">Durasi Kontrak<input type="text" name="contract" class="form-control" id="ipt1"></div>
<div class="form-group text-right"><input type="submit" name="opt1" value="NEXT" class="btn" id="btn1"></div>
  
</div>
</div>
</div><br><br>

<script src="bs/jquery/jquery-3.2.1.min.js"></script>
<script src="bs/js/bootstrap.min.js"></script>
<script>
function openNav1() {document.getElementById("myNav1").style.width = "100%";}
function openNav2() {document.getElementById("myNav2").style.width = "100%";}
function closeNav1() {document.getElementById("myNav1").style.width = "0%";}	
function closeNav2() {document.getElementById("myNav2").style.width = "0%";}  
</script>
</body>
</html>