<?php require "../config/connect.php";

require "check_login.php";

$admin_id=$_GET['admin_id'];

$_SESSION['admin_id']; 

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

<div class="col-lg-10 col-md-10">

<h1 id="t2"><i class="fa fa-shopping-cart"></i> EYEMARKET</h1>

<hr></hr>

<div class="row form-group">

<div class="col-lg-9 col-md-9"><a data-toggle="modal" data-target="#m1" class="btn" id="btn5">ADD</a></div>

<div class="col-lg-3 col-md-3">

<form method="get" action="lists_eyemarket">

<input type="hidden" name="admin_id" value="<?php print $admin_id ?>">

<div class="form-group">

<div class="input-group">

<input type="search" name="search" placeholder="Search" class="form-control" id="set8" required>

<div class="input-group-btn">

<button type="submit" name="submit" class="btn btn-info" id="set8"><span class="fa fa-search"></span></button>

</div>

</div>

</div>	

</form>

</div>

</div>	



<div id="m1" class="modal fade" role="dialog">

  <div class="modal-dialog" id="set9">

    <div class="modal-content" id="set8">

    <div class="modal-header text-center"><h1 id="t3">Add Product</h1></div>

      <div class="modal-body">

      <form method="post" enctype="multipart/form-data">

      <?php

      if(isset($_POST['opt1'])){

      $product_name=addslashes($_POST['product_name']);

      $price=addslashes($_POST['price']);

      $stock=addslashes($_POST['stock']);

      $pic=$_FILES['pic']['name'];

      $ex = pathinfo($pic,PATHINFO_EXTENSION);

//      date_default_timezone_set('Asia/Jakarta');

//      $now=date('d F Y H:i:s');

      if($_FILES['pic']['size'] > 1048576){

      print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">File too large. Maximum file size is 1MB.</div></div>';		

      }

      else if(file_exists("eyemarket_storage/".$pic)){

      print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">Image name already exist. Please, change your image name !</div></div>';		

      }

      else if($ex != "jpg" && $ex != "JPG" && $ex != "jpeg" && $ex != "JPEG"){

      print '<div class="form-group"><div class="alert alert-danger text-center" id="set8">Your extension file not support !</div></div>';		

      }

      else{      	

      move_uploaded_file($_FILES['pic']['tmp_name'], "eyemarket_storage/".$pic);	

      $orgfile="eyemarket_storage/".$pic;

	  list($width,$height)=getimagesize($orgfile);

	  $newfile=imagecreatefromjpeg($orgfile);

	  $newwidth=292;

	  $newheight=182;	

	  $thumb1="eyemarket_storage/t1".$pic;

	  $truecolor=imagecreatetruecolor($newwidth, $newheight);

	  imagecopyresampled($truecolor, $newfile, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

	  imagejpeg($truecolor,$thumb1,100);

	  $thumb1=substr($thumb1,16,100);

	  $cmd=mysqli_query($con,"insert into tbl_product (product_name,price,stock,description,pic,thumb1,createon) values ('$product_name','$price','$stock',$description','$pic','$thumb1','$now')");      

      header("refresh:0");

      }	

      }

      ?>	

	  <div class="form-group text-left" id="t1">Product Name<input type="text" name="product_name" class="form-control" id="ipt1" required></div>

    <div class="form-group text-left" id="t1">Price<input type="text" name="price" class="form-control" id="ipt1" required></div>

    <div class="form-group text-left" id="t1">Stock<input type="text" name="stock" class="form-control" id="ipt1" required></div>

	  <div class="form-group text-left" id="t1">Description<textarea name="description" class="form-control" maxlength="500" rows="5"></textarea></div>

	  <div class="form-group text-left" id="t1">Upload Image<input type="file" name="pic" class="form-control" id="set8" required></div>

      <div class="form-group" id="t1"><input type="submit" name="opt1" value="ADD" class="btn btn-block" id="btn1"></div><br><br>      

      </form>

      </div>

    </div>

  </div>

</div>



<div class="table table-responsive">

<table class="table table-hover">

<thead id="back9">

<th>Product Image</th>

<th>Product Name</th>

<th>Price</th>

<th>Stock</th>

<th>Options</th>

<th></th>	

</thead>

<tbody>

<?php

$dataPerPage = 10;

if(isset($_GET['page']))

{

$noPage = $_GET['page'];

} 

else $noPage = 1;

$offset = ($noPage - 1) * $dataPerPage;

$result=mysqli_query($con,"SELECT * FROM tbl_product where id_product order by id_product desc LIMIT $offset, $dataPerPage");

while($data = mysqli_fetch_array($result))

{

$id_product=$data['id_product'];	

$pic=$data['pic'];

$product_name=$data['product_name'];

$price=$data['price'];

$stock=$data['stock'];


print'<tr>

<td><img src="eyemarket_storage/'.$pic.'" id="img4"></td>

<td>'.$product_name.'</td>

<td>'.$price.'</td>

<td>'.$stock.'</td>

<td><a href="eyemarket_edit?admin_id='.$admin_id.'&id_product='.$id_product.'" class="btn" id="btn3">EDIT</a>&emsp;<a href="eyemarket_delete?admin_id='.$admin_id.'&id_product='.$id_product.'" class="btn" id="btn4">DELETE</a></td>

</tr>';

}

print'</tbody></table></div><br><br>';

$query=mysqli_query($con,"SELECT * FROM tbl_product where id_product order by id_product desc");

$hasil=mysqli_num_rows($query);

$jumPage = ceil($hasil/$dataPerPage);

echo "<center><ul class='pagination'>";

if ($noPage > 1) echo  "<a href='eyemarket?page=".($noPage-1)."&admin_id=$admin_id' id='pg1'>Prev</a>&nbsp;";

for($page = 1; $page <= $jumPage; $page++)

{

if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 

{   

if (($page == 1) && ($page != 2))  echo ""; 

if (($page != ($jumPage - 1)) && ($page == $jumPage))  echo "";

if ($page == $noPage) echo "<a href='' id='pg2'><b>".$page."</b></a>&nbsp;";

else echo "<a href='eyemarket?page=$page&admin_id=$admin_id' id='pg1'>".$page."</a>&nbsp;";

$page = $page;          

}

}

if ($noPage < $jumPage) echo "<a href='eyemarket?page=".($noPage+1)."&admin_id=$admin_id' id='pg1'>Next</a>&nbsp;";

echo "</ul></center>";   

?>	

</div>

</div>

</div>



<script src="tinymce_dev/js/tinymce/tinymce.min.js"></script>

<script type="text/javascript">

tinyMCE.init({

    mode : "textareas"

});

</script>

<script src="../bs/jquery/jquery-3.2.1.min.js"></script>

<script src="../bs/js/bootstrap.min.js"></script>

</body>

</html>