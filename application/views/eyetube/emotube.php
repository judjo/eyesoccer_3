<?php 
$eyetube_id=$eyetube_id;

$date1=date("Y-m-d H:i:s",strtotime("-15 minutes",time()));
$date2=date("Y-m-d H:i:s");
if($_POST["link"]=="eyetube")
{
if(isset($_POST["type"]) && $_POST["type"]=="smile")
{
  
$ceksmile=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_view WHERE type_visit='smile' AND place_visit='eyetube' AND place_id='".$eyetube_id."' AND session_ip='".$ip."' LIMIT 1"));
  if($ceksmile<1)
  {
    mysqli_query($con,"UPDATE tbl_eyetube SET tube_smile=tube_smile+1 WHERE eyetube_id='".$_POST["id"]."'");
    mysqli_query($con,"INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','smile','eyetube','".$eyetube_id."','".$ip."')");
  }
  $ceksmile=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_eyetube WHERE eyetube_id='".$_POST["id"]."'"));
  $html["html"]=$ceksmile["tube_smile"];
  echo json_encode($html);
}

if(isset($_POST["type"]) && $_POST["type"]=="shock")
{
  
$cekshock=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_view WHERE type_visit='shock' AND place_visit='eyetube' AND place_id='".$eyetube_id."' AND session_ip='".$ip."' LIMIT 1"));
  if($cekshock<1)
  {
    mysqli_query($con,"UPDATE tbl_eyetube SET tube_shock=tube_shock+1 WHERE eyetube_id='".$_POST["id"]."'");
    mysqli_query($con,"INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','shock','eyetube','".$eyetube_id."','".$ip."')");
  }
  $cekshock=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_eyetube WHERE eyetube_id='".$_POST["id"]."'"));
  $html["html"]=$cekshock["tube_shock"];
  echo json_encode($html);
}

if(isset($_POST["type"]) && $_POST["type"]=="inspired")
{
  
$cekinspired=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_view WHERE type_visit='inspired' AND place_visit='eyetube' AND place_id='".$eyetube_id."' AND session_ip='".$ip."' LIMIT 1"));
  if($cekinspired<1)
  {
    mysqli_query($con,"UPDATE tbl_eyetube SET tube_inspired=tube_inspired+1 WHERE eyetube_id='".$_POST["id"]."'");
    mysqli_query($con,"INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','inspired','eyetube','".$eyetube_id."','".$ip."')");
  }
  $cekinspired=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_eyetube WHERE eyetube_id='".$_POST["id"]."'"));
  $html["html"]=$cekinspired["tube_inspired"];
  echo json_encode($html);
}


if(isset($_POST["type"]) && $_POST["type"]=="happy")
{
  
$cekhappy=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_view WHERE type_visit='happy' AND place_visit='eyetube' AND place_id='".$eyetube_id."' AND session_ip='".$ip."' LIMIT 1"));
  if($cekhappy<1)
  {
    mysqli_query($con,"UPDATE tbl_eyetube SET tube_happy=tube_happy+1 WHERE eyetube_id='".$_POST["id"]."'");
    mysqli_query($con,"INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','happy','eyetube','".$eyetube_id."','".$ip."')");
  }
  $cekhappy=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_eyetube WHERE eyetube_id='".$_POST["id"]."'"));
  $html["html"]=$cekhappy["tube_happy"];
  echo json_encode($html);
}

if(isset($_POST["type"]) && $_POST["type"]=="sad")
{
  
$ceksad=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_view WHERE type_visit='sad' AND place_visit='eyetube' AND place_id='".$eyetube_id."' AND session_ip='".$ip."' LIMIT 1"));
  if($ceksad<1)
  {
    mysqli_query($con,"UPDATE tbl_eyetube SET tube_sad=tube_sad+1 WHERE eyetube_id='".$_POST["id"]."'");
    mysqli_query($con,"INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','sad','eyetube','".$eyetube_id."','".$ip."')");
  }
  $ceksad=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_eyetube WHERE eyetube_id='".$_POST["id"]."'"));
  $html["html"]=$ceksad["tube_sad"];
  echo json_encode($html);
}

if(isset($_POST["type"]) && $_POST["type"]=="fear")
{
  
$cekfear=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_view WHERE type_visit='fear' AND place_visit='eyetube' AND place_id='".$eyetube_id."' AND session_ip='".$ip."' LIMIT 1"));
  if($cekfear<1)
  {
    mysqli_query($con,"UPDATE tbl_eyetube SET tube_fear=tube_fear+1 WHERE eyetube_id='".$_POST["id"]."'");
    mysqli_query($con,"INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','fear','eyetube','".$eyetube_id."','".$ip."')");
  }
  $cekfear=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_eyetube WHERE eyetube_id='".$_POST["id"]."'"));
  $html["html"]=$cekfear["tube_fear"];
  echo json_encode($html);
}

}
?>