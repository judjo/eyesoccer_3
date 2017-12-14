<?php
$club_id=$_SESSION["club_id"];
$user_id=$_SESSION["user_id"];
?>
<div id="back3"><i class="fa fa-user"></i> Pendaftaran Pemain</div><br>
<div class="form-group"><a data-toggle="modal" data-target="#player_reg" class="btn" id="btn1"> <i class="fa fa-plus"></i> Tambah </a></div>
<div id="player_reg" class="modal fade" role="dialog">
  <div class="modal-dialog" id="set9">
    <div class="modal-content" id="set8">
    <div class="modal-header text-center"><h1 id="t3">Tambah Pemain</h1></div>
      <div class="modal-body">
<form method="post" enctype="multipart/form-data">
      	 <input type="hidden" name="club_id" class="form-control" id="ipt1" value="<?=$club_id?>">
		<div class="form-group text-left" id="t1">Upload Photo<input type="file" name="pic" class="form-control" id="set8"></div>
      <div class="form-group text-left" id="t1">Nama<input type="text" name="name" class="form-control" id="ipt1"></div>
		<div class="form-group text-left" id="t1">Deskripsi<textarea name="description" class="form-control" maxlength="500" rows="5" id="set8"></textarea></div>
		<div class="form-group text-left">
		<div class="row">
		<div class="col-lg-6 col-md-6" id="t1">Tempat lahir<input type="text" name="birth_place" class="form-control" id="ipt1"></div>
		<div class="col-lg-6 col-md-6" id="t1">Tanggal lahir<input type="date" name="birth_date" class="form-control" id="ipt1"></div>			
		</div>
		</div>
		<div class="form-group text-left">
		<div class="row">
		<div class="col-lg-6 col-md-6" id="t1">Tinggi<input type="text" name="height" class="form-control" id="ipt1"></div>
		<div class="col-lg-6 col-md-6" id="t1">Berat<input type="text" name="weight" class="form-control" id="ipt1"></div>			
		</div>
		</div>
		<div class="form-group text-left" id="t1">Negara<input type="text" name="nationality" class="form-control" id="ipt1"></div>
		<div class="form-group">
		<div class="row">
		<div class="col-lg-6 col-md-6" id="t1">Posisi
		<select name="position" class="form-control" id="ipt1">
		<?php
		$cmd2=$this->db->query("select * from tbl_player_position");
		foreach($cmd2->result_array() as $row2){
		print '<option>'.$row2['position'].'</option>';  
		}
		?>	
		</select>	
		</div>
		<div class="col-lg-6 col-md-6" id="t1">No Punggung<input type="text" name="number" class="form-control" id="ipt1"></div>			
		</div>
		</div>
		
      	<div class="form-group" id="t1"><input type="submit" name="opt3" value="TAMBAH" class="btn btn-block" id="btn1"></div><br><br>     
      </form>
      </div>
    </div>
  </div>
</div>

<div class="table table-responsive">
<table class="table table-hover">
<thead id="back9">
<th>Image</th>
<th>Name</th>
<th>Postion</th>
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
$result=$this->db->query("SELECT a.* FROM tbl_player a INNER JOIN tbl_club b ON b.club_id=a.club_id INNER JOIN tbl_users c ON c.user_id=b.user_id where c.user_id='".$_SESSION["user_id"]."' order by a.player_id desc LIMIT $offset, $dataPerPage");
foreach($result->result_array() as $data)
{
$player_id=$data['player_id'];	
$name=$data['name'];
$position=$data['position'];
$pic=$data['pic'];
print'<tr>
<td><img src="'.base_url().'../systems/player_storage/'.$pic.'" class="img img-responsive" id="img10"></td>
<td>'.$name.'</td>
<td>'.$position.'</td>
</tr>';
}
print'</tbody></table></div><br><br>';
$query=$this->db->query("SELECT * FROM tbl_player where club_id='$club_id' order by club_id desc");
$hasil=$query->num_rows();
$jumPage = ceil($hasil/$dataPerPage);
echo "<center><ul class='pagination'>";
if ($noPage > 1) echo  "<a href='player?page=".($noPage-1)."&club_id=$club_id' id='pg1'>Prev</a>&nbsp;";
for($page = 1; $page <= $jumPage; $page++)
{
if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
{   
if (($page == 1) && ($page != 2))  echo ""; 
if (($page != ($jumPage - 1)) && ($page == $jumPage))  echo "";
if ($page == $noPage) echo "<a href='' id='pg2'><b>".$page."</b></a>&nbsp;";
else echo "<a href='player?page=$page&club_id=$club_id' id='pg1'>".$page."</a>&nbsp;";
$page = $page;          
}
}
if ($noPage < $jumPage) echo "<a href='player?page=".($noPage+1)."&club_id=$club_id' id='pg1'>Next</a>&nbsp;";
echo "</ul></center>";   
?>	
</div>

<div class="form-group text-right"><a href="<?=base_url()?>eyeprofile/logout" class="btn" id="btn1">SELESAI</a></div>

</div>