<?php 
// require "config/connect.php";
require "../config/connect.php";
$cmd=mysqli_query($con,"select * from tbl_player");
// $row=mysqli_fetch_array($cmd);
while ($row = mysqli_fetch_assoc($cmd)) {
	// $url = str_replace(" ","-",$row["name"]);
	$url = preg_replace('~[^\\pL0-9_]+~u', '-', $row["name"]);
	$url = trim($url, "-");
	$url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
	$url = strtolower($url);
	$url = preg_replace('~[^-a-z0-9_]+~', '', $url);
	$url=rand(1000,9999)."-".$url;
	$cmd2=mysqli_query($con,"update tbl_player set url='".$url."' where player_id='".$row["player_id"]."'");
}
?>