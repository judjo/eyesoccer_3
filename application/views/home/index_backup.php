

<div class="hidden-xs hidden-sm">

<h1 id="t2"><i class="fa fa-newspaper-o"></i> EYENEWS <a href="<?=base_url()?>eyenews" id="a2">see all</a></h1>	

<div class="col-lg-12 col-md-12">

<div class="row replace_news">

<?php

$y=0;
$totalnews=0;


$gettotal=$this->db->query("select * from tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' order by publish_on desc")->num_rows();
$totalnews=$gettotal;

$cmd1=$this->db->query("select * from tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' order by eyenews_id desc LIMIT 4")->result_array();

foreach($cmd1 as $row1){

//$link=preg_replace('/\s+/', '-', $row1['title']);

$y++;

$title = str_replace(' ', '-', $row1['title']);
$title = str_replace(',', '_', $title);
print '

<div class="col-lg-3 col-md-3 replace-'.$y.'">
<div class="thumbnail drop-shadow2">
      <a href="'.base_url().'eyenews/detail/'.$title.'">
        <img src="'.base_url().'/assets/eyenews_storage/'.$row1['thumb1'].'" alt="Lights" style="width:100%;">
        <div class="caption">
          <p>';
		  print $row1 ['title'];
	echo '
	
	</p>
        </div>
      </a>
    </div>
 
</div>

';

}  

?>

</div><br>

</div>

</div>

<div class="hidden-lg hidden-md">

<h1 id="t2"><i class="fa fa-newspaper-o"></i> EYENEWS<a href="<?=base_url()?>eyenews.php" id="a2">see all</a></h1>

<div id="myCarousel1" class="carousel slide" data-ride="carousel">

  
<ol class="carousel-indicators">
    
    
  <?php

$cmd11=$this->db->query("select * from tbl_eyenews where eyenews_id order by eyenews_id desc limit 0,4");
$row=$cmd11->num_rows();

$active_row="1";
for($i=0;$i<$row;$i++)
{
	if($active_row=="1")
	{
		$active_row="class='active'";
	}
	else{
		$active_row="";
	}
	echo '<li data-target="#myCarousel1" data-slide-to="'.$i.'" '.$active_row.'></li>';
}
$active_news="1";
echo '</ol><div class="carousel-inner" role="listbox">';
$cmd112 =$cmd11->result_array();
foreach($cmd112 as $row11){
if($active_news=="1")
{
	$active_news="active";
}
else{
	$active_news="";
}
$title = str_replace(' ', '-', $row11['title']);
$title = str_replace(',', '_', $title);
	print '

<div class="item '.$active_news.'">
	<div class="thumbnail drop-shadow2">
      <a href="'.base_url().'eyenews/detail/'.$title.'">
        <img src="'.base_url().'assets/eyenews_storage/'.$row11['thumb1'].'" alt="Lights" style="width:100%;">
        <div class="caption">
          <p>';
		  print $row11['title'];
	echo '
	
	</p>
        </div>
      </a>
    </div>
 
    </div>

';
}

  ?>    

   

  </div>

</div>

</div>



<div class="hidden-xs hidden-sm">

<h1 id="t2"><i class="fa fa-play-circle-o fa-lg"></i> EYETUBE <a href="<?=base_url()?>eyetube" id="a2">see all</a></h1>	

<div class="col-lg-12 col-md-12">

<div class="row">

<?php

$cmd2=$this->db->query("select * from tbl_eyetube where eyetube_id order by eyetube_id desc LIMIT 0,4");

$x='0';

foreach($cmd2->result_array() as $row2){

  $x++;

$title = str_replace(' ', '-', $row2['title']);
$title = str_replace(',', '_', $title);
print '
<div class="col-lg-3 col-md-3">
<div class="thumbnail drop-shadow2">
      <a href="'.base_url().'eyetube/detail/'.$title.'">
        <img src="'.base_url().'assets/eyetube_storage/'.$row2['thumb1'].'" alt="Lights" style="width:100%;">
        <div class="caption">
          <p>';
		  print $row2 ['title'];
	echo '
	
	</p>
        </div>
      </a>
    </div>
    </div>
';

}  

?>

</div><br>

</div>

</div>

<div class="hidden-lg hidden-md">

<h1 id="t2"><i class="fa fa-play-circle-o fa-lg"></i> EYETUBE<a href="eyetube" id="a2">see all</a></h1>

<div id="myCarousel2" class="carousel slide" data-ride="carousel">
 
<ol class="carousel-indicators">
  <?php

  $i="0";

$cmd11=$this->db->query("select * from tbl_eyetube where eyetube_id order by eyetube_id desc limit 0,4");
$row=$cmd11->num_rows();

$active_row="1";
for($s=0;$s<$row;$s++)
{
	if($active_row=="1")
	{
		$active_row="class='active'";
	}
	else{
		$active_row="";
	}
	echo '<li data-target="#myCarousel2" data-slide-to="'.$s.'" '.$active_row.'></li>';
}
$active_news="1";
echo '</ol><div class="carousel-inner" role="listbox">';
  
  
$cmd21=$this->db->query("select * from tbl_eyetube where eyetube_id order by eyetube_id desc limit 0,4");

$i="0";

foreach($cmd21->result_array() as $row21){

  if($i=="0")

  {

    $active="active";

  }

  else{

    $active="";

  }

$title = str_replace(' ', '-', $row21['title']);
$title = str_replace(',', '_', $title);

print '

<div class="item '.$active.'">

	<div class="thumbnail drop-shadow2">
      <a href="'.base_url().'eyetube/detail/'.$title.'">
        <img src="'.base_url().'assets/eyetube_storage/'.$row21['thumb1'].'" alt="Lights" style="width:100%;">
        <div class="caption">
          <p>';
		  print $row21 ['title'];
	echo '
	
	</p>
        </div>
      </a>
    </div>
 
 

    </div>

';

$i++;

}

  ?>  


  </div>


</div>

</div>

<div class="hidden-xs hidden-sm">

<h1 id="t2"><i class="fa fa-newspaper-o fa-lg"></i> EYEVENT <a href="eyevent" id="a2">see all</a></h1>	

<div class="col-lg-12 col-md-12">

<div class="row">

<?php

$cmd2=$this->db->query("select * from tbl_event order by id_event desc LIMIT 0,4");

$x='0';

foreach($cmd2->result_array() as $row2){

  $x++;

$title = str_replace(' ', '-', $row2['title']);
$title = str_replace(',', '_', $title);
print '
<div class="col-lg-3 col-md-3">
<div class="thumbnail drop-shadow2">
      <a href="'.base_url().'eyevent/detail/'.$title.'">
        <img src="'.base_url().'assets/eyevent_storage/'.$row2['thumb1'].'" alt="Lights" style="width:100%;">
        <div class="caption">
          <p>';
		  print $row2 ['title'];
	echo '
	
	</p>
        </div>
      </a>
    </div>
    </div>
';

}  

?>

</div><br>

</div>

</div>

<div class="hidden-lg hidden-md">

<h1 id="t2"><i class="fa fa-newspaper-o fa-lg"></i> EYEVENT<a href="eyevent" id="a2">see all</a></h1>

<div id="myCarousel2" class="carousel slide" data-ride="carousel">
 
<ol class="carousel-indicators">
  <?php

  $i="0";

$cmd11=$this->db->query("select * from tbl_event order by id_event desc limit 0,4");
$row=$cmd11->num_rows();

$active_row="1";
for($s=0;$s<$row;$s++)
{
	if($active_row=="1")
	{
		$active_row="class='active'";
	}
	else{
		$active_row="";
	}
	echo '<li data-target="#myCarousel2" data-slide-to="'.$s.'" '.$active_row.'></li>';
}
$active_news="1";
echo '</ol><div class="carousel-inner" role="listbox">';
  
  
$cmd21=$this->db->query("select * from tbl_event order by id_event desc limit 0,4");

$i="0";

foreach($cmd21->result_array() as $row21){

  if($i=="0")

  {

    $active="active";

  }

  else{

    $active="";

  }

$title = str_replace(' ', '-', $row2['title']);
$title = str_replace(',', '_', $title);
print '

<div class="item '.$active.'">

	<div class="thumbnail drop-shadow2">
      <a href="'.base_url().'eyevent/detail/'.$title.'">
        <img src="'.base_url().'assets/eyevent_storage/'.$row21['thumb1'].'" alt="Lights" style="width:100%;">
        <div class="caption">
          <p>';
		  print $row21 ['title'];
	echo '
	
	</p>
        </div>
      </a>
    </div>
 
 

    </div>

';

$i++;

}

  ?>  

   

  </div>


</div>

</div>

<script>
 $(function(){

    setInterval(get_news, 10000);

//setInterval(get_tube, 10000);
	
  })

  function get_news(){

    total=$("#totalpic").val();

   $.ajax({

    type: "POST",
	data: { 'now': total},
    url: "checking_news2.php",
    dataType: "json",
    success:function(data){
	//alert(data.html1);
	totalbaru=data.totalterbaru;
	totalbaru++;
	if(totalbaru>1)
	{

	$.ajax({

		type: "POST",
		data: { 'now': total},
		url: "checking_news.php",
		dataType: "json",
		success:function(data){

			$("#totalpic").val(data.total1);


			$(".replace_news").fadeOut("slow", function(){
			$(".replace_news").empty().html(data.html1);
			$(".replace_news").fadeIn("slow");
			});
			


	   
		 
		}

    });

	}

     

    }

    });
   
   
   

   
  }
    
</script>
<br><br>


