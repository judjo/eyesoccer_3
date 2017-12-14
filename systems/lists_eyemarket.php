<?php require "../config/connect.php";

require "check_login.php";

$admin_id=$_GET['admin_id'];

$_SESSION['admin_id']; 

?>

<!DOCTYPE html>

<html>

<head>

<title></title>

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

<h1 id="t2"><i class="fa fa-newspaper-o"></i> EYEMARKET</h1>

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

    <div class="modal-header text-center"><h1 id="t3">Add EYEMARKET</h1></div>

      <div class="modal-body">

      <form method="post" enctype="multipart/form-data">

      <?php

      if(isset($_POST['opt1'])){

      $product_name=addslashes($_POST['product_name']);

      $description=addslashes($_POST['description']);

      $price=$_POST['price'];

      $stock=$_POST['stock'];      

      $pic=$_FILES['pic']['name'];

      $ex = pathinfo($pic,PATHINFO_EXTENSION);

      date_default_timezone_set('Asia/Jakarta');

      $now=date('d F Y H:i:s');

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

    $cmd=mysqli_query($con,"insert into tbl_eyemarket (product_name,description,price,stock,pic,thumb1,createon) values ('$title','$description',$price,$stock,'$pic','$thumb1','$now')");

    header("location:eyemarket?admin_id=$admin_id");

      } 

      }

      ?>      

	  <div class="form-group text-left" id="t1">Product Name<input type="text" name="product_name" class="form-control" id="ipt1" required></div>

	  <div class="form-group text-left" id="t1">Description<textarea name="description" class="form-control" maxlength="500" rows="5"></textarea></div>

    <div class="form-group text-left" id="t1">Price<input type="text" name="price" class="form-control" id="ipt1" required></div>

    <div class="form-group text-left" id="t1">Stock<input type="text" name="stock" class="form-control" id="ipt1" required></div>    

	  <div class="form-group text-left" id="t1">Upload Image<input type="file" name="pic" class="form-control" id="set8" required></div>

      <div class="form-group" id="t1"><input type="submit" name="opt1" value="ADD" class="btn btn-block" id="btn1"></div><br><br>

      </form>

      </div>

    </div>

  </div>

</div>



<?php

if(isset($_GET['submit']) && isset($_GET['search']))

{

$button = $_GET ['submit'];

$search = $_GET ['search']; 

  

if(strlen($search)<=1)

echo "<div class='text-center'>keywords too short.</div><br><br><br><br><br><br><br><br><br><br><br>";

else{

echo "";



$search_exploded = explode (" ", $search);

 

$x = "";

$construct = "";  

    

foreach($search_exploded as $search_each)

{

$x++;

if($x==1)

$construct .="product_name LIKE '%$search_each%' OR price LIKE '%$search_each%'";

else

$construct .="AND product_name LIKE '%$search_each%' OR price LIKE '%$search_each%'";

    

}

  

$constructs = mysqli_query($con,"SELECT * FROM tbl_eyemarket WHERE $construct");

$foundnum = mysqli_num_rows($constructs);

    

if ($foundnum==0)

echo "<div class='text-center'>no results.</div><br><br><br><br><br><br><br><br><br><br><br>";

else

{ 

  

echo "";

$output=null;

$per_page = 12;

$start = isset($_GET['start']) ? $_GET['start']: '';

$max_pages = ceil($foundnum / $per_page);

if(!$start)

$start=0; 

$getquery = mysqli_query($con,"SELECT * FROM tbl_eyemarket WHERE $construct LIMIT $start, $per_page");



while($runrows = mysqli_fetch_assoc($getquery))

{

$id_eyemarket=$runrows['id_eyemarket']; 

$product_name=$runrows['product_name']; 

$price=$runrows['price'];

$stock=$runrows['stock'];

$createon=$runrows['createon'];

$pic=$runrows['pic'];

print'

<div class="table table-responsive">

<table class="table table-hover">

<thead id="back9">

<th>Product Image</th>

<th>Product Name</th>

<th>Price</th>

<th>Stock</th>

<th>Create On</th>

<th>Options</th>

<th></th> 

</thead>

<tbody>

<tr>

<td><img src="eyemarket_storage/'.$pic.'" id="img4"></td>

<td>'.$product_name.'</td>

<td>'.$price.'</td>

<td>'.$stock.'</td>

<td>'.$createon.'</td>

<td><a href="eyemarket_edit?admin_id='.$admin_id.'&id_eyemarket='.$id_eyemarket.'" class="btn" id="btn3">EDIT</a>&emsp;<a href="eyemarket_delete?admin_id='.$admin_id.'&id_eyemarket='.$id_eyemarket.'" class="btn" id="btn4">DELETE</a></td>

</tr>

</body>

</table>

</div>

';

}



echo "<div class='col-md-12 text-center'><ul class='pagination'>";

  

$prev = $start - $per_page;

$next = $start + $per_page;

                       

$adjacents = 3;

$last = $max_pages - 1;

  

if($max_pages > 1)

{   

if (!($start<=0)) 

echo "<li><a href='lists_eyemarket?search=$search&submit=Search+source+code&start=$prev&admin_id=$admin_id' id='pg1'>Prev</a></li>";    

if ($max_pages < 7 + ($adjacents * 2)) 

{

$i = 0;   

for ($counter = 1; $counter <= $max_pages; $counter++)

{

if ($i == $start){

echo "<li class='active'><a href='lists_eyemarket?search=$search&submit=Search+source+code&start=$i&admin_id=$admin_id' id='pg2'><b>$counter</b></a></li> ";

}

else {

echo "<li><a href='lists_eyemarket?search=$search&submit=Search+source+code&start=$i&admin_id=$admin_id' id='pg1'>$counter</a></li> ";

}  

$i = $i + $per_page;                 

}

}

elseif($max_pages > 5 + ($adjacents * 2))

{

if(($start/$per_page) < 1 + ($adjacents * 2))        

{

$i = 0;

for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)

{

if ($i == $start){

echo "<li class='active'><a href='lists_eyemarket?search=$search&submit=Search+source+code&start=$i&admin_id=$admin_id' id='pg2'><b>$counter</b></a></li> ";

}

else {

echo "<li><a href='lists_eyemarket?search=$search&submit=Search+source+code&start=$i&admin_id=$admin_id' id='pg1'>$counter</a></li> ";

} 

$i = $i + $per_page;                                       

}                          

}



elseif($max_pages - ($adjacents * 2) > ($start / $per_page) && ($start / $per_page) > ($adjacents * 2))

{

echo "<li><a href='lists_eyemarket?search=$search&submit=Search+source+code&start=0&admin_id=$admin_id' id='pg1'>1</a></li>";

echo "<li><a href='lists_eyemarket?search=$search&submit=Search+source+code&start=$per_page&admin_id=$admin_id' id='pg1'>2</a> ....</li>";

 

$i = $start;                 

for ($counter = ($start/$per_page)+1; $counter < ($start / $per_page) + $adjacents + 2; $counter++)

{

if ($i == $start){

echo "<li class='active'><a href='lists_eyemarket?search=$search&submit=Search+source+code&start=$i&admin_id=$admin_id' id='pg2'><b>$counter</b></a></li> ";

}

else {

echo "<li><a href='lists_eyemarket?search=$search&submit=Search+source+code&start=$i&admin_id=$admin_id' id='pg1'>$counter</a></li> ";

}   

$i = $i + $per_page;                

}

                                  

}

else

{

echo "<li><a href='lists_eyemarket?search=$search&submit=Search+source+code&start=0&admin_id=$admin_id' id='pg1'>1</a></li> ";

echo "<li><a href='lists_eyemarket?search=$search&submit=Search+source+code&start=$per_page&admin_id=$admin_id' id='pg1'>2</a> .... </li>";

 

$i = $start;                

for ($counter = ($start / $per_page) + 1; $counter <= $max_pages; $counter++)

{

if ($i == $start){

echo "<li class='active'><a href='lists_eyemarket?search=$search&submit=Search+source+code&start=$i&admin_id=$admin_id' id='pg2'><b>$counter</b></a></li>";

}

else {

echo "<li><a href='lists_eyemarket?search=$search&submit=Search+source+code&start=$i&admin_id=$admin_id' id='pg1'>$counter</a></li> ";   

} 

$i = $i + $per_page;              

}

}

}



if (!($start >=$foundnum-$per_page))

echo "<li><a href='lists_eyemarket?search=$search&submit=Search+source+code&start=$next&admin_id=$admin_id' id='pg1'>Next</a></li>";    

}   

echo "</ul></div>";

} 

} 

}

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