<?php require "../config/connect.php";
require "check_login.php";
$admin_id=$_SESSION["admin_id"];
?>
<!DOCTYPE html>
<html>
<head>
<title>Eyesoccer</title>
<link rel="stylesheet" type="text/css" href="../bs/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../bs/fa/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="../img/tab_icon.png">
<link rel="stylesheet" type="text/css" href="../bs/css/mycss.css">
<link rel="stylesheet" type="text/css" href="../bs/js/jquery.datetimepicker.css"> 
<link rel="stylesheet" type="text/css" href="../bs/datatables/media/css/dataTables.bootstrap4.css">
</head>
<body>

<div class="container-fluid">
<div class="row">
<div class="col-lg-2 col-md-2">

<?php require "vertical_menu.php"; ?>

</div>
<div class="col-lg-10 col-md-10">
<h1 id="t2"><i class="fa fa-shopping-cart"></i> Tambah Produk</h1>
<hr></hr>
<div class="row form-group">
<div class="col-lg-9 col-md-9"><a data-toggle="modal" data-target="#m1" class="btn" id="btn5">Tambah</a></div>
<div class="col-lg-3 col-md-3">
<form method="get" action="lists_eyemarket">
<input type="hidden" name="admin_id" value="<?php print $admin_id ?>"><!--
<div class="form-group">
<div class="input-group">
<input type="search" name="search" placeholder="Search" class="form-control" id="set8" required>
<div class="input-group-btn">
<button type="submit" name="submit" class="btn btn-info" id="set8"><span class="fa fa-search"></span></button>
</div>
</div>
</div>  -->
</form>
</div>
</div>  

<div id="m1" class="modal fade" role="dialog">
  <div class="modal-dialog" id="set9">
    <div class="modal-content" id="set8">
    <div class="modal-header text-center"><h1 id="t3">Tambah Produk</h1></div>
      <div class="modal-body">
      <form method="post" enctype="multipart/form-data">
      <?php
      if(isset($_POST['opt1'])){
      $product_name=$_POST['product_name'];
      $category_product_name=addslashes($_POST['category_product_name']);
      $price=addslashes($_POST['price']);
      $stock=addslashes($_POST['stock']);

      $pic=rand("1000","9999")."-".$_FILES['pic']['name'];
      $pic = preg_replace('/\s+/', '', $pic);
      $ex = pathinfo($pic,PATHINFO_EXTENSION);
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
      //$cmd=mysqli_query($con,"insert into tbl_product (product_name) values ('$product_name')"); 
    
  $cmd=mysqli_query($con,"insert into tbl_product (admin_id,category_product_name,product_name,price,stock,pic,thumb1,description) values ('".$_SESSION["admin_id"]."','$category_product_name','$product_name','$price','$stock','$pic','$thumb1','$description')"); 
      //echo "insert into tbl_product (admin_id,category_product_name,product_name,price,stock,pic,thumb1,description) values ('".$_SESSION["admin_id"]."','$category_product_name','$product_name','$price','$stock','$pic','$thumb1','$description')";  
           header("refresh:0");
      } 
      }
      ?>  
    <div class="form-group text-left" id="t1">Nama Produk<input type="text" name="product_name" class="form-control" id="ipt1" required></div>
    <div class="form-group text-left" id="t1">Kategori Produk
    <select name="category_product_name" class="form-control" id="ipt1">
    <?php
    $cmd=mysqli_query($con,"select * from tbl_category_product");
    while($row=mysqli_fetch_array($cmd)){
    print '<option>'.$row['category_product_name'].'</option>';  
    }
    ?>  
    </select> 
    </div>
    <div class="form-group text-left" id="t1">Price<input type="text" name="price" class="form-control" id="ipt1" required></div>
    <div class="form-group text-left" id="t1">Stock<input type="text" name="stock" class="form-control" id="ipt1" required></div>
    <div class="form-group text-left" id="t1">Upload Image<input type="file" name="pic" class="form-control" id="set8" required></div>
  </div>
      <div class="form-group" id="t1"><input type="submit" name="opt1" value="ADD" class="btn btn-block" id="btn1"></div><br><br>      
      </form>
      </div>
    </div>

</div>

<div class="table table-responsive">
<table class="table table-striped table-bordered " id="example">
<thead id="back900">
<th>Photo Produk</th>
<th>Nama Produk</th>
<th>Kategori Produk</th>
<th>Price</th>
<th>Stock</th>
<th>Options</th>  
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
$result=mysqli_query($con,"SELECT a.*,b.fullname FROM tbl_product a LEFT JOIN tbl_admin b ON b.admin_id=a.admin_id where id_product order by id_product desc");
while($data = mysqli_fetch_array($result))
{
$id_product=$data['id_product'];  
$product_name=$data['product_name'];
$category_product_name=$data['category_product_name'];
$price=$data['price'];
$stock=$data['stock'];
$pic=$data['pic'];
$thumb1=$data['thumb1'];
$description=$data['description'];
print'<tr>
<td><img src="eyemarket_storage/'.$pic.'" id="img4"></td>
<td>'.$product_name.'</td>
<td>'.$category_product_name.'</td>
<td>'.$price.'</td>
<td>'.$stock.'</td>
<td><a href="eyemarket_edit?admin_id='.$admin_id.'&id_product='.$id_product.'" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>&emsp;<a class="btn btn-danger" onclick=\'if(confirm("Apa anda yakin untuk menghapus ?")) window.location = "eyemarket_delete?admin_id='.$admin_id.'&id_product='.$id_product.'"\'><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></td>
</tr>';
}
print'</tbody></table></div><br><br>';
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
<script type="text/javascript" language="javascript" src="../bs/datatables/media/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" language="javascript" src="../bs/datatables/media/js/jquery.dataTables.js">  </script> 
<script type="text/javascript" language="javascript" src="../bs/datatables/media/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript" language="javascript" src="../bs/js/build/jquery.datetimepicker.full.js"></script>
<script>
$(document).ready(function() {  
$('#example').DataTable();
} );
$(function(){
  $(".datetimepicker").datetimepicker({
     format: 'Y-m-d H:i:s'
  });
  
})
</script>
</body>
</html>