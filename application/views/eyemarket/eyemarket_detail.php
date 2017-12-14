<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
//require "config/connect.php"; 
//$id_product=$_GET['id_product'];
  //  if (!isset($_SESSION)) {
    //    session_start();
    //}
//$cmd=mysqli_query($con,"select * from tbl_product a INNER JOIN tbl_admin b ON b.admin_id=a.admin_id where id_product='$id_product'");
//$row=mysqli_fetch_array($cmd);
?>
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
<style>
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
<body style="">



<div class="container-fluid">
<div class="row">

<div class="col-lg-1 col-md-1 hidden-xs hidden-sm" id="back1"><br><br>

<br><br>
</div>
<div class="col-lg-11 col-md-11"><br>
<div class="col-lg-12 col-md-12">
<div class="form-group"><a href="eyemarket" id="a6">Home</a> </div>
<div class="row form-group">
<div class="col-md-4 col-lg-4">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <!-- Wrapper for slides -->

  <div class="carousel-inner">
 <div class="item active">
      <img src="systems/eyemarket_storage/<?php print $row['pic']; ?>">
    </div>
</div>
  <!-- Left and right controls -->
</div>
</div>

<div class="col-md-8 col-lg-8">
<h4 id="t1"><b><?php echo $row['product_name']; ?></b></h4>
<strong>Rp. <?php echo number_format($row['price'],2,",",".");?></strong>
<hr></hr>
<p>
Deskripsi<br>
<?php echo $row['description'];?> 
<hr>
</p>
<div class="form-group" id="t1">Stock : <b><?php echo $row['stock']; ?></b>
</div>
<div class="form-group text-right">
<a href="cart.php?act=add&amp;id_product=<?php echo $row['id_product']; ?>&amp;ref=eyemarket_detail.php?id_product=<?php echo $row['id_product']; ?>" class="btn btn-danger" id="set8">&emsp;BELI&emsp;</a>
</div>
</div>
</div>
</div>
<h5><i class="fa fa-shopping-cart fa-lg"></i> Keranjang Anda</h5>
 <div class="hero-unit">
            <!--<div class="tittle"><h3><strong><span class="glyphicon glyphicon-shopping-cart"></span> Your Cart</strong></h3></div>-->
                    <table class="table table-hover table-condensed">
                  <tr>
          <th><center>No.</center></th>
          <th width="5%"><center>Produk</center></th>
          <th><center>Nama Produk</center></th>
          <th align="right" class="text-right">Jumlah</th>
          <th align="right" class="text-right">Satuan</th>
          <th align="right" class="text-right">Sub Total</th>
          <th ><center>Opsi</center></th>
        </tr>
    <?php               
    $total = 0;
    //mysql_select_db($database_conn, $conn);
    if (isset($_SESSION['items'])) {
          $no = 1;
		  foreach ($_SESSION['items'] as $key => $val) {
            $query = mysqli_query($con, "SELECT id_product, product_name, price,pic FROM tbl_product WHERE id_product = '$key'");
            $data = mysqli_fetch_array($query);

            $jumlah_harga = $data['price'] * $val;
            $total += $jumlah_harga;
          
            ?>
                <tr>
                <td style="vertical-align:middle;"><center><?php echo $no++; ?></center></td>
                <td style="vertical-align:middle;"><img src="systems/eyemarket_storage/<?php echo $data['pic']; ?>" class="img-polaroid thumbnail2"style="width:100% !important;margin: 0 auto;" /></td>
                <td style="vertical-align:middle;"><center><?php echo $data['product_name']; ?></center></td>
                <td style="vertical-align:middle;" align="right"><?php echo number_format($data['price']); ?></td>
                <td style="vertical-align:middle;" align="right" ><?php echo number_format($val); ?></td>
                <td style="vertical-align:middle;" align="right"><?php echo number_format($jumlah_harga); ?></td>
                <td style="vertical-align:middle;"><center><a href="cart.php?act=plus&amp;id_product=<?php echo $key; ?>&amp;ref=eyemarket_cart.php" class="btn btn-xs btn-success">Tambah</a> <a href="cart.php?act=min&amp;id_product=<?php echo $key; ?>&amp;ref=eyemarket_cart.php" class="btn btn-xs btn-warning">Kurang</a> <a href="cart.php?act=del&amp;id_product=<?php echo $key; ?>&amp;ref=eyemarket_cart.php" class="btn btn-xs btn-danger">Hapus</a></center></td>
                </tr>
                
                
          <?php
                    //mysql_free_result($query);      
            }
              //$total += $sub;
            }?>
                        <?php
        if($total == 0){ ?>
          <td colspan="4" align="center"><?php echo "Keranjang Kosong!"; ?></td>
        <?php } else { ?>
          
                        <td colspan="5" style="font-size: 18px;" align="right"><b>Total Belanja Anda :</b></td><td align="right"  style="font-size: 18px;"><b> Rp. <?php echo number_format($total); ?>  </b></td><td></td>
          
      <?php }
        ?>
                </table> 
                <p><div align="right">
            <a href="eyemarket_cart.php" class="btn btn-success">&raquo Details Keranjang &laquo</a>
            </div></p>
            </div>

<div class="col-md-12 col-lg-12">
<h3 id="t2">Produk Lainnya</h3><br>
<?php
$cmd1=mysqli_query($con,"select * from tbl_product order by id_product DESC limit 5");
while($data=mysqli_fetch_array($cmd1)){
$id_product=$data['id_product'];
?>

<div class="col-md-3 column ">
 <div class="media rounded-top bordered">
    <div class="media-left">
          <img src="systems/club_logo/7566LOGO UNTUK APLIKASI.jpg" class="media-object img img-circle" id="img4">
    </div>
    <div class="media-body" style="padding-bottom:25px;">
    <a href="store_profile" id="a7">EYEMARKET</a><br>
    <a href="store_profile" id="a8">2 Store</a>
    </div>
  </div><a href="eyemarket_detail?id_product=<?php echo $data['id_product']; ?>" id="a3">
<div class="thumbnail drop-shadow2" style="height:70% !important;width:100% !important;margin-bottom:0px;position:relative">
<div class="thumbnail3">
    <img src="systems/eyemarket_storage/<?php echo $data['pic']; ?>" class="img-polaroid thumbnail2" alt="Lights" style="width:100% !important;margin: 0 auto;">
	</div>
	</a>
	   <div class="pull-right bottom-align-text">
            <a href="eyemarket_detail?id_product=<?php echo $data['id_product']; ?>" class="btn btn-success btn-sm" id="set8" role="button"><i class="fa fa-shopping-cart"></i> BELI</a>
        </div>    
    <div class="producttitle bottom-align-text"><?php echo $data['product_name']; ?></div>
    <div class="productprice">
    <div class="pricetext bottom-align-text">Rp.<?php echo number_format($data['price'],2,",",".");?></div>
	</div>
</div>
</div>
<?php
}
?>
</div>
</div>
</div>


<!--<a href="" id="a6">Home</a> > <a href="" id="a6">Sepatu</a> 
  <div class="media">
    <div class="media-left">
      <img src="img/nike2.jpg" class="media-object">
    </div>
    <div class="media-body">
      <a href="eyetube_detail?eyetube_id='.$eyetube_id.'" id="a4"><p class="media-heading">'.$row1['title'].'</p>
      <small id="set6"><i class="fa fa-clock-o"></i> '.substr($row['createon'],0,13).'</small></a>
    </div>
  </div>-->

</div>
</div><br><br>

<?php require "footer.php"; ?>