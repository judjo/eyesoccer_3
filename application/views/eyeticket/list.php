<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
<title>Eyesoccer</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="twitter:username" content="@judjo" />
<link rel="stylesheet" type="text/css" href="bs/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="bs/fa/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="img/tab_icon.png">
<link rel="stylesheet" type="text/css" href="bs/css/mycss.css">

<!-- Custom CSS 
<link href="bs/css/style.css" rel="stylesheet" type="text/css">
-->
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
<body>

<div class="container-fluid">
<div class="row">

<div class="col-lg-1 col-md-1 hidden-xs hidden-sm" id="back1"><br><br>

<br><br>
</div>

<div class="col-lg-11 col-md-11"><br>

<div class="row">
<div class="col-md-2">

<div class="hidden-lg hidden-md"><br></div>
</div>

<div class="col-md-2">

</div>

<div class="col-md-5"></span></button></div>
<div class="col-md-3 text-right"><div class="hidden-lg hidden-md"><br></div>
<div class="input-group">
<input type="search" name="search" placeholder="Search" class="form-control" id="set8" required>
<div class="input-group-btn">
<button type="submit" name="submit" class="btn btn-info" id="set8"><span class="fa fa-search"></span></button>
</div>
</div>
</div>

<div class="hidden-xs hidden-sm"><br><br></div>
</div>
<div class="form-group hidden-md hidden-lg"><br><button type="button" class="btn btn-default"><i class="fa fa-shopping-cart fa-lg"></i> <span class="badge"></span></button></div>
<hr></hr>
                    <?php

                    ?>


<div class="col-md-3 column ">
 <div class="media">
    <div class="media-left">
      <img src="<?=base_url()?>assets/club_logo/7566LOGO UNTUK APLIKASI.jpg" class="media-object img img-circle" id="img4">
    </div>
    <div class="media-body" style="padding-bottom:25px;">
    <a href="store_profile" id="a7">EYETICKET</a><br>
    <a href="store_profile" id="a8">2 Store</a>
    </div>
  </div><a href="" id="a3">
<div class="thumbnail drop-shadow2" style="height:70% !important;width:100% !important;margin-bottom:0px;position:relative">
<div class="thumbnail3">
    <img src="systems/eyemarket_storage/<?php ?>" class="img-polaroid thumbnail2" alt="Lights" style="width:100% !important;margin: 0 auto;">
	</div>
	</a>
	   <div class="pull-right bottom-align-text">
            <a href="eyemarket_detail?id_product=<?php  ?>" class="btn btn-success btn-sm" id="set8" role="button"><i class="fa fa-shopping-cart"></i> BELI</a>
        </div>    
    <div class="producttitle bottom-align-text"><?php ?></div>
    <div class="productprice">
    <div class="pricetext bottom-align-text"><?php ?></div>
	</div>
</div>
</div>

                <?php   

              
              
              ?>

</div>

</div>
</div><br><br>




    <!-- jQuery -->
<script>
$(document).ready(function(){   
        $(".form-item").submit(function(e){
            var form_data = $(this).serialize();
            var button_content = $(this).find('button[type=submit]');
            button_content.html('Adding...'); //Loading button text 

            $.ajax({ //request ajax ke cart_process.php
                url: "cart_process.php",
                type: "POST",
                dataType:"json", 
                data: form_data
            }).done(function(data){ //Jika Ajax berhasil
                $("#cart-info").html(data.items); //total items di cart-info element
                button_content.html('BELI'); //
                alert("Item telah dimasukan ke keranjang belanja anda"); 
                if($(".shopping-cart-box").css("display") == "block"){
                    $(".cart-box").trigger( "click" ); 
                }
            })
            e.preventDefault();
        });

    //menampilkan item ke keranjang belanja
    $( ".cart-box").click(function(e) { 
        e.preventDefault(); 
        $(".shopping-cart-box").fadeIn(); 
        $("#shopping-cart-results").html('<img src="img/ajax-loader.gif">'); //menampilkan loading gambar
        $("#shopping-cart-results" ).load( "cart_process.php", {"load_cart":"1"}); //membuat permintaan ajax menggunakan dengan jQuery Load() & update
    });
    
    //keluar keranjang belanja
    $( ".close-shopping-cart-box").click(function(e){ //fungsi klik pengguna pada keranjang belanja
        e.preventDefault(); 
        $(".shopping-cart-box").fadeOut(); //keluar keranjang belanka
    });
    
    //Menghapus item dari keranjang
    $("#shopping-cart-results").on('click', 'a.remove-item', function(e) {
        e.preventDefault(); 
        var pcode = $(this).attr("data-code"); //mendapatkan get produk
        $(this).parent().fadeOut(); //menghapus elemen item dari kotak
        $.getJSON( "cart_process.php", {"remove_code":pcode} , function(data){ //mendapatkan Harga Barang dari Server
            $("#cart-info").html(data.items); //update Menjullahkan item pada cart-info
            $(".cart-box").trigger( "click" ); //trigger click on cart-box to untuk memperbarui daftar item
        });
    });
	
});
</script>