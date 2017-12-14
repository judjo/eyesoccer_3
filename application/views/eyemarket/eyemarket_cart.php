<?php require "config/connect.php"; 
?>
<?php
      if(isset($_POST['login'])){
      $username=$_POST['username'];
      $password=$_POST['password'];
      $cmd=mysqli_query($con,"select * from tbl_member where email='$username' and password='".md5($password)."'");
      $row=mysqli_fetch_array($cmd);
      $user_id=$row['id_member'];
      if($row['id_member']=="" && $row['password']==""){
	/*?>
	<script>
	$(document).ready(function(){
	alert("Username atau Password salah !");
	$(".wrong-login").show();
	})
	</script>
	<?php*/
      }
      else{
     // session_start();
      $_SESSION['member_id']=$user_id;
      header("location:".$base_url."/eyemarket_cart?redirect=shipping");  
      }  
      }
	  if(isset($_POST["shipping"]))
	  {
		  foreach($_POST as $key => $val)
		  {
			  if($key!="shipping")
			  {
				  $_SESSION["shipping"][$key]=$val;
			  }
		  }
		   header("location:".$base_url."/eyemarket_cart?redirect=checkout");  
	  }
	  
$member=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_member WHERE id_member='".$_SESSION["member_id"]."' LIMIT 1"));
$name=explode(" ",$member["name"]);
 if(isset($name[1]) && $name[1]!="")
{
	$lastname=$name[1];
}
else{
	$lastname="";
}

$firstname=$name[0];

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
            <div class="title"><h3>Detail Keranjang Belanja</h3></div>
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
		$i=0;
       $no = 1;
		  foreach ($_SESSION['items'] as $key => $val) {
            $query = mysqli_query($con, "select * from tbl_product where id_product = '$key'");
            $data = mysqli_fetch_array($query);

            $jumlah_harga = $data['price'] * $val;
            $total += $jumlah_harga;
           
			$item["id"]=$key;
			$item["price"]=$data['price'];
			$item["quantity"]=$val;
			$item["name"]=$data['product_name'];
			$item_details[$i]=$item;
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
		     $i++;
			  
            }
            
            }?>  
                         <?php
        if($total == 0){
          echo '<tr><td colspan="5" align="center">Ups, Keranjang kosong!</td></tr></table>';
          echo '<p><div align="right">
            <a href="eyemarket" class="btn btn-info btn-lg">&laquo; Continue Shopping</a>
            </div></p>';
        } else {
			?>
         
            <tr style="background-color: #DDD;"><td colspan="5" align="right"><b>Total :</b></td><td align="right"><b>Rp. <?=number_format($total,2,",",".")?></b></td><td></td></tr>
			</table>
            <p><div align="right">
            <a href="eyemarket" class="btn btn-info">&laquo; CONTINUE SHOPPING</a>
			<?php
if(isset($_SESSION["member_id"]) && $_SESSION["member_id"]!="" && !isset($_SESSION["shipping"]))
{
?>
<a id="shipping" class="btn btn-success clickable" target="#mshipping">
<?php
}
else if(isset($_SESSION["member_id"]) && $_SESSION["member_id"]!="" && isset($_SESSION["shipping"]))
{
?>

<a id="pay-button" class="btn btn-success clickable" >
<?php
}
else{
  ?>
  
<a class="btn btn-success clickable" target="#mlogin">
  <?php
}
?>
<i class="glyphicon glyphicon-shopping-cart icon-white"></i> CHECK OUT &raquo;</a>
     <!--<a href="eyemarket_checkout?total=<?=$total?>" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> CHECK OUT &raquo;</a>-->
            </div></p>
          <!--';-->
       <?php 
	   }
        ?>

</table>
      
        
      <!-- end: Table -->

</div>
</div>
</div>
</div><br><br>

<div id="mlogin" class="modal fade">
<div class="modal-dialog" id="set7">
    <div class="modal-content" id="set8">
    <div class="modal-header text-center"><h1 id="t3">MASUK</h1></div>
      <div class="modal-body">
   <form method="post">
      <div class="form-group wrong-login" style="display:none" id="t1"><small class="text-danger">*username atau password salah</small></div>
	  <div class="form-group" id="t1"><input type="text" name="username" class="form-control" id="ipt1" placeholder="Username" required></div>
      <div class="form-group" id="t1"><input type="password" name="password" class="form-control" id="ipt1" placeholder="Password" required></div>
      <div class="form-group" id="t1"><input type="submit" name="login" value=" LOGIN " class="btn btn-warning pull-left col-lg-5" >    <a href="<?=$base_url?>/register?redirect=eyemarket" class="btn btn-danger pull-right col-lg-5"> Daftar </a></div>
     
      </form>
  <hr />
     </div>
     </div>
  </div>
</div>

<div id="mshipping" class="modal fade">
<div class="modal-dialog" id="set7">
    <div class="modal-content" id="set8">
    <div class="modal-header text-center"><h1 id="t3">Tujuan Pengantaran</h1></div>
      <div class="modal-body">
   <form method="post">
  
      <div class="form-group" id="t1"><input type="text" name="shipping_fname" value="<?=$firstname?>" class="form-control" id="ipt1" placeholder="Nama Depan Penerima" required></div>
      <div class="form-group" id="t1"><input type="text" name="shipping_lname" value="<?=$lastname?>" class="form-control" id="ipt1" placeholder="Nama Belakang Penerima" required></div>
      <div class="form-group" id="t1"><input type="text" name="shipping_address" value="<?=$member["address"]?>" class="form-control" id="ipt1" placeholder="Alamat Penerima" required></div>
      <div class="form-group" id="t1"><input type="text" name="shipping_phone" value="<?=$member["phone"]?>" class="form-control" id="ipt1" placeholder="Telp Penerima" required></div>
      <div class="form-group" id="t1"><input type="text" name="shipping_city" value="<?=$member["city"]?>" class="form-control" id="ipt1" placeholder="Kota Penerima" required></div>
      <div class="form-group" id="t1"><input type="text" name="shipping_zip" value="<?=$member["zip"]?>" class="form-control" id="ipt1" placeholder="Kode Pos Penerima" required></div>
      <div class="form-group" id="t1"><input type="submit" name="shipping" value=" Bayar " class="btn btn-warning pull-left col-lg-5" >  </div>
     
      </form>
  <hr />
     </div>
     </div>
  </div>
</div>




<?php require "footer.php"; ?>

<script>
$(".clickable").click(function(){
	//alert("tes");
  target=$(this).attr("target");
$(target).modal('show'); 
});
</script>
     <!-- end: Table -->
<?php
require_once('vt/Veritrans.php');
if(isset($name[1]) && $name[1]!="")
{
	$lastname=$name[1];
}
else{
	$lastname="";
}
$firstname=$name[0];
//Set Your server key
Veritrans_Config::$serverKey = "VT-server-1R_hFqQSllyKsnp_y5dA-5yn";

// Uncomment for production environment
// Veritrans_Config::$isProduction = true;

// Enable sanitization
Veritrans_Config::$isSanitized = true;

// Enable 3D-Secure
Veritrans_Config::$is3ds = true;

// Required
$transaction_details = array(
  'order_id' => rand(),
  'gross_amount' => $total, // no decimal allowed for creditcard
);

// Optional
/*$item1_details = array(
  'id' => 'a1',
  'price' => 18000,
  'quantity' => 3,
  'name' => "Apple"
);

// Optional
$item2_details = array(
  'id' => 'a2',
  'price' => 20000,
  'quantity' => 2,
  'name' => "Orange"
);

// Optional
$item_details = array ($item1_details, $item2_details);
*/
// Optional
$billing_address = array(
  'first_name'    => $firstname,
  'last_name'     => $lastname,
  'address'       => $member["address"],
  'city'          => $member["city"],
  'postal_code'   => $member["zip"],
  'phone'         => $member["phone"],
  'country_code'  => 'IDN'
);

// Optional
$shipping_address = array(
  'first_name'    => $_SESSION["shipping"]["shipping_fname"],
  'last_name'     => $_SESSION["shipping"]["shipping_lname"],
  'address'       => $_SESSION["shipping"]["shipping_address"],
  'city'          => $_SESSION["shipping"]["shipping_city"],
  'postal_code'   => $_SESSION["shipping"]["shipping_zip"],
  'phone'         => $_SESSION["shipping"]["shipping_phone"],
  'country_code'  => 'IDN'
);

// Optional
$customer_details = array(
  'first_name'    => $firstname,
  'last_name'     => $lastname,
  'email'         => $member["email"],
  'phone'         => $member["phone"],
  'billing_address'  => $billing_address,
  'shipping_address' => $shipping_address
);

// Optional, remove this to display all available payment methods
$enable_payments = array('credit_card','cimb_clicks','mandiri_clickpay','echannel');

// Fill transaction details
$transaction = array(
  'enabled_payments' => $enable_payments,
  'transaction_details' => $transaction_details,
  'customer_details' => $customer_details,
  'item_details' => $item_details,
);

$snapToken = Veritrans_Snap::getSnapToken($transaction);
//echo "snapToken = ".$snapToken;
?>

  <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="VT-client-wuCvvvUm5GXCOIcd"></script>
    <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay('<?=$snapToken?>', {
          // Optional
          onSuccess: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onPending: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onError: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          }
        });
      };
    </script>
	
	<?php
if(isset($_GET["redirect"]) && $_GET["redirect"]=="checkout")
{
	?>
	<script>
	$(document).ready(function(){
	$("#pay-button").trigger("click");
	})
	</script>
	<?php
}
?>
	<?php
if(isset($_GET["redirect"]) && $_GET["redirect"]=="shipping")
{
	?>
	<script>
	$(document).ready(function(){
	$("#shipping").trigger("click");
	})
	</script>
	<?php
}
?>

