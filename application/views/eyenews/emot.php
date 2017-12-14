<?php require "config/connect.php"; 
$eyenews_id=$_POST['id'];

$date1=date("Y-m-d H:i:s",strtotime("-15 minutes",time()));
$date2=date("Y-m-d H:i:s");
if($_POST["link"]=="eyenews")
{
if(isset($_POST["type"]) && $_POST["type"]=="smile")
{
  
$ceksmile=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_view WHERE type_visit='smile' AND place_visit='eyenews' AND place_id='".$eyenews_id."' AND session_ip='".$ip."' LIMIT 1"));
  if($ceksmile<1)
  {
    mysqli_query($con,"UPDATE tbl_eyenews SET news_smile=news_smile+1 WHERE eyenews_id='".$_POST["id"]."'");
    mysqli_query($con,"INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','smile','eyenews','".$eyenews_id."','".$ip."')");
  }
  $ceksmile=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_eyenews WHERE eyenews_id='".$_POST["id"]."'"));
  $html["html"]=$ceksmile["news_smile"];
  echo json_encode($html);
}

if(isset($_POST["type"]) && $_POST["type"]=="shock")
{
  
$cekshock=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_view WHERE type_visit='shock' AND place_visit='eyenews' AND place_id='".$eyenews_id."' AND session_ip='".$ip."' LIMIT 1"));
  if($cekshock<1)
  {
    mysqli_query($con,"UPDATE tbl_eyenews SET news_shock=news_shock+1 WHERE eyenews_id='".$_POST["id"]."'");
    mysqli_query($con,"INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','shock','eyenews','".$eyenews_id."','".$ip."')");
  }
  $cekshock=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_eyenews WHERE eyenews_id='".$_POST["id"]."'"));
  $html["html"]=$cekshock["news_shock"];
  echo json_encode($html);
}

if(isset($_POST["type"]) && $_POST["type"]=="inspired")
{
  
$cekinspired=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_view WHERE type_visit='inspired' AND place_visit='eyenews' AND place_id='".$eyenews_id."' AND session_ip='".$ip."' LIMIT 1"));
  if($cekinspired<1)
  {
    mysqli_query($con,"UPDATE tbl_eyenews SET news_inspired=news_inspired+1 WHERE eyenews_id='".$_POST["id"]."'");
    mysqli_query($con,"INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','inspired','eyenews','".$eyenews_id."','".$ip."')");
  }
  $cekinspired=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_eyenews WHERE eyenews_id='".$_POST["id"]."'"));
  $html["html"]=$cekinspired["news_inspired"];
  echo json_encode($html);
}


if(isset($_POST["type"]) && $_POST["type"]=="happy")
{
  
$cekhappy=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_view WHERE type_visit='happy' AND place_visit='eyenews' AND place_id='".$eyenews_id."' AND session_ip='".$ip."' LIMIT 1"));
  if($cekhappy<1)
  {
    mysqli_query($con,"UPDATE tbl_eyenews SET news_happy=news_happy+1 WHERE eyenews_id='".$_POST["id"]."'");
    mysqli_query($con,"INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','happy','eyenews','".$eyenews_id."','".$ip."')");
  }
  $cekhappy=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_eyenews WHERE eyenews_id='".$_POST["id"]."'"));
  $html["html"]=$cekhappy["news_happy"];
  echo json_encode($html);
}

if(isset($_POST["type"]) && $_POST["type"]=="sad")
{
  
$ceksad=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_view WHERE type_visit='sad' AND place_visit='eyenews' AND place_id='".$eyenews_id."' AND session_ip='".$ip."' LIMIT 1"));
  if($ceksad<1)
  {
    mysqli_query($con,"UPDATE tbl_eyenews SET news_sad=news_sad+1 WHERE eyenews_id='".$_POST["id"]."'");
    mysqli_query($con,"INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','sad','eyenews','".$eyenews_id."','".$ip."')");
  }
  $ceksad=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_eyenews WHERE eyenews_id='".$_POST["id"]."'"));
  $html["html"]=$ceksad["news_sad"];
  echo json_encode($html);
}

if(isset($_POST["type"]) && $_POST["type"]=="fear")
{
  
$cekfear=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_view WHERE type_visit='fear' AND place_visit='eyenews' AND place_id='".$eyenews_id."' AND session_ip='".$ip."' LIMIT 1"));
  if($cekfear<1)
  {
    mysqli_query($con,"UPDATE tbl_eyenews SET news_fear=news_fear+1 WHERE eyenews_id='".$_POST["id"]."'");
    mysqli_query($con,"INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','fear','eyenews','".$eyenews_id."','".$ip."')");
  }
  $cekfear=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_eyenews WHERE eyenews_id='".$_POST["id"]."'"));
  $html["html"]=$cekfear["news_fear"];
  echo json_encode($html);
}

}
?>