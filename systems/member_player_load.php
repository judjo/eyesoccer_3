<?php require "../config/connect.php";
$requestData= $_REQUEST;

$columns = array( 
// datatable column index  => database column name
	0 =>'eyenews_id', 
	1 => 'eyenews_id',
	2=> 'title',
	3=> 'news_type',
	4=> 'createon',
	5=> 'publish_on',
	6=> 'news_view',
	7=> 'fullname',
	8=> 'eyenews_id'
);


$result=mysqli_query($con,"SELECT a.*,b.fullname FROM tbl_eyenews a LEFT JOIN tbl_admin b ON b.admin_id=a.admin_id "); 
$totalData = mysqli_num_rows($result);
$totalFiltered = $totalData;


if( !empty($requestData['search']['value']) ) {  
$sql=" AND ( b.fullname LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR publish_on LIKE '".$requestData['search']['value']."%' ";

	$sql.=" OR news_type LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR title LIKE '".$requestData['search']['value']."%' )";
}
else{
	$sql="";
}
$result_with_limit=mysqli_query($con,"SELECT a.*,b.fullname FROM tbl_eyenews a LEFT JOIN tbl_admin b ON b.admin_id=a.admin_id where eyenews_id ".$sql." order by ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ");
$result_without_limit=mysqli_query($con,"SELECT a.*,b.fullname FROM tbl_eyenews a LEFT JOIN tbl_admin b ON b.admin_id=a.admin_id where eyenews_id ".$sql." order by ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  ");
$totalFiltered = mysqli_num_rows($result_without_limit);
while($data = mysqli_fetch_array($result_with_limit))
{
$eyenews_id=$data['eyenews_id'];	
$title=$data['title'];
$news_type=$data['news_type'];
$createon=$data['createon'];
$pic=$data['pic'];
$pageview=$data['news_view'];
$nestedData=array(); 

	$nestedData[] = $eyenews_id;
	$nestedData[] = '<img src="eyenews_storage/'.$pic.'" id="img4">';
	$nestedData[] = $title;
	$nestedData[] = $news_type;
	$nestedData[] = $createon;
	$nestedData[] = date("d F Y H:i:s",strtotime($data["publish_on"]));
	$nestedData[] = $pageview;
	$nestedData[] = $data["fullname"];
	$nestedData[] = '<a href="eyenews_edit?admin_id='.$admin_id.'&eyenews_id='.$eyenews_id.'" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>&emsp;<a class="btn btn-danger" onclick=\'if(confirm("Apa anda yakin untuk menghapus ?")) window.location = "eyenews_delete?admin_id='.$admin_id.'&eyenews_id='.$eyenews_id.'"\'><i class="fa fa-trash-o" aria-hidden="true"></i></i> Delete</a>';
	
	$data2[] = $nestedData;
	$i++;
}


$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data2   // total data array
			);

echo json_encode($json_data);  // send data as json format
?>	
