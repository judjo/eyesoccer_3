<?php
require "../config/connect.php";

//$sql="UPDATE tbl_club SET active=0 WHERE active=1";	
//$result=mysqli_query($conn, $sql);

$sql="select * from tbl_gallery ORDER BY gallery_id DESC limit ".($_POST["total_eyetube"]).",5";
$result=mysqli_query($con, $sql);

$response='';
while($row=mysqli_fetch_array($result)) {
	$response = $response . "<div class='notification-item'>" .
	"<div class='notification-title'>". $row["title"] . "</div>" . 

	"</div>";
}
if(!empty($response)) {
	print $response;
}


?>