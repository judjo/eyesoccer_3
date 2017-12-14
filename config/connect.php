<?php ob_start();
session_start();
$host="localhost";
$user="root";
$pass="";
$db="db_eyesoccer";

if($_SERVER['SERVER_PORT'] !== 443 &&
   (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off')) {
  header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
  exit;
}
function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}


$ip = getUserIP();

$con=mysqli_connect($host,$user,$pass,$db);
$base_url="https://".$_SERVER['HTTP_HOST']."/beta.eyesoccer.id" ;
date_default_timezone_set("Asia/Jakarta");

$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
$actual_link = "http://".$_SERVER["HTTP_HOST"].$uri_parts[0];
$device_detail=$_SERVER["HTTP_USER_AGENT"];

$device_agent="Dekstop";
function isMobile() {
    return preg_match("/(iPhone|iPod|iPad|Android|BlackBerry|android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
// If the user is on a mobile device, redirect them
if(isMobile()){
$device_agent="Mobile";
}
$cek=mysqli_num_rows(mysqli_query($con,"SELECT * FROM tbl_analytic WHERE session_ip='".$ip."' AND url='".$actual_link."' AND date='".date("Y-m-d")."'"));
if($cek<1)
{
	mysqli_query($con,"INSERT INTO tbl_analytic SET session_ip='".$ip."',url='".$actual_link."',date='".date("Y-m-d")."',device='".$device_agent."',device_detail='".$device_detail."'");
}
?>