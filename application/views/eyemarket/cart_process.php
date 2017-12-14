<?php
session_start(); //start session
require "config/connect.php"; //include config file

############# Memasuk produk baru ke keranjang belanja #########################
if(isset($_POST["id_product"]))
{
	foreach($_POST as $key => $value){
		$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING); 
	}
	
	$statement = $mysqli_conn->prepare("SELECT product_name, price, stock FROM tbl_product WHERE id_product=$id_product LIMIT 1");
	$statement->bind_param('s', $new_product['id_product']);
	$statement->execute();
	$statement->bind_result($product_name, $price, $stock);
	

	while($statement->fetch()){ 
		$new_product["product_name"] = $product_name; 
		$new_product["price"] = $price;  
		$new_product["stock"] = $stock;
		
		if(isset($_SESSION["products"])){  
			if(isset($_SESSION["products"][$new_product['id_product']])) 
			{
				unset($_SESSION["products"][$new_product['id_product']]); 
			}			
		}
		
		$_SESSION["products"][$new_product['id_product']] = $new_product;	
	}
	
 	$total_items = count($_SESSION["products"]); //
	die(json_encode(array('items'=>$total_items)));

}

################## List Produk yang ada di keranjang belanja ###################
if(isset($_POST["load_cart"]) && $_POST["load_cart"]==1)
{

	if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){ 
		$cart_box = '<ul class="cart-products-loaded">';
		$total = 0;
		foreach($_SESSION["products"] as $product){ 
			
		
			$product_name = $product["product_name"]; 
			$product_price = $product["product_price"];
			$product_stock = $product["product_stock"];

			
			$cart_box .=  "<li> $product_name (Qty : $product_stock) &mdash; ".number_format($product_price * $product_stock). " <a href=\"#\" class=\"remove-item\" data-code=\"$times;</a></li>";
			$subtotal = ($product_price * $product_stock);
			$total = ($total + $subtotal);
		}
		$cart_box .= "</ul>";
		$cart_box .= '<div class="cart-products-total">Total : '.number_format($total).' <u><a href="view_cart.php" title="Review Cart dan Check-Out">Check-out</a></u></div>';
		die($cart_box); 
	}else{
		die("Keranjang Belanja Anda Kosong"); 
	}
}

################# Menghapus Item dari Keranjang Belanja ################
if(isset($_GET["remove_code"]) && isset($_SESSION["products"]))
{
	$product_code   = filter_var($_GET["remove_code"], FILTER_SANITIZE_STRING);

	if(isset($_SESSION["products"][$product_code]))
	{
		unset($_SESSION["products"][$product_code]);
	}
	
 	$total_items = count($_SESSION["products"]);
	die(json_encode(array('items'=>$total_items)));
}