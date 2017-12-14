<?php
require "config/connect.php"; 
require_once("cart.php");
//$id_product=$_GET['id_product'];
    //if (!isset($_SESSION)) {
      //  session_start();
    //}
//$cmd=mysqli_query($con,"select * from tbl_product a INNER JOIN tbl_admin b ON b.admin_id=a.admin_id where id_product='$id_product'");
//$row=mysqli_fetch_array($cmd);
?>
<!DOCTYPE html>
<html>
<head>
<title>Eyesoccer</title>
<meta content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" name="viewport"/>
<link rel="stylesheet" type="text/css" href="bs/css/bootstrap.min.css">

<meta property="og:image" content="<?=$base_url?>/img/tab_icon.png" />

<meta property="og:type" content="article" />
<meta property="og:description" content="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia" />
<link rel="stylesheet" type="text/css" href="bs/fa/css/font-awesome.min.css">

<link rel="icon" type="image/png" href="img/tab_icon.png">

<link rel="stylesheet" type="text/css" href="bs/css/mycss.css">
</head>
<body style="">

<?php require "header.php"; ?>

<div class="container-fluid">
<div class="row">

<div class="col-lg-1 col-md-1 hidden-xs hidden-sm" id="back1"><br><br>
<?php require "vertical_menu.php"; ?>
<br><br>
</div>
<div class="col-lg-11 col-md-11"><br>
<div class="col-lg-12 col-md-12">
<div class="form-group"><a href="eyemarket" id="a6">Home</a> </div>
<!-- start: Table -->
  <div class="table-responsive">
    <div class="title"><h3>Checkout Selesai</h3></div>
      <div class="hero-unit">Selamat Anda telah berhasil checkout, silahkan catat info di bawah ini..</div>
       <div class="hero-unit">
        <?php
          if($_POST['finish']){
            session_destroy();
        echo 'Terima kasih Anda sudah berbelanja di EyeMarket dan berikut ini adalah data yang perlu Anda catat.';
        echo '<p>Total biaya untuk pembelian Produk adalah Rp. '.$_POST['total'].',- dan biaya bisa di kirimkan melalui Rekening Bank BCA cabang Jakarta dengan nomor rekening xxx-xxx-xxxxx-x atas nama PT MATA BOLA CEMERLANG.</p>';
        echo '<p>Dan barang akan kami kirim ke alamat di bawah ini:</p>';
        echo '<p>Nama Lengkap : '.$_POST['nm_usr'].'<br>';
                echo 'Email : '.$_POST['email_usr'].'<br>';
                echo 'Alamat : '.$_POST['almt_usr'].'<br>';
                echo 'Kode Pos : '.$_POST['kp_usr'].'<br>';
                echo 'Kota : '.$_POST['kota_usr'].'<br>';
                echo 'No Telepon : '.$_POST['tlp'].'<br>';
                echo 'Total Belanja : Rp. '.$_POST['total'].',-</p>';
      }else{
        header("Location: eyemarket.php");
      }
      ?>
      </div>
  </div>
        
<!-- end: Table -->

</div>
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
<script src="jquery.validate.js"></script>
    <script>
    $(document).ready(function(){
        $("#formku").validate();
    });
    </script>
</body>
</html>