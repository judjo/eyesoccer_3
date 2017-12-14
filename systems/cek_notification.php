<?php
require "../config/connect.php";

//$sql="UPDATE tbl_club SET active=0 WHERE active=1";	
//$result=mysqli_query($conn, $sql);

$sql="select * from tbl_club ORDER BY club_id DESC";
$result=mysqli_num_rows(mysqli_query($con, $sql));
/*
$response='';
while($row=mysqli_fetch_array($result)) {
	$response = $response . "<div class='notification-item'>" .
	"<div class='notification-name'>". $row["name"] . "</div>" . 

	"</div>";
}
if(!empty($response)) {*/
	print $result;
//}


?>