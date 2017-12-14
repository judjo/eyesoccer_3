<?= '<?xml version="1.0" encoding="UTF-8" ?>' ?>
<?php
$cmd15=$this->db->query("select * from tbl_player order by player_id DESC");

//$eyenews_id=$row15['eyenews_id']; 

?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
	  xmlns:news="http://www.google.com/schemas/sitemap-news/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xmlns:xhtml="http://www.w3.org/1999/xhtml"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

    <?php foreach($cmd15->result_array() as $row15){ ?>
	<url>	
     <loc><?php echo base_url('eyeprofile/detail').'/'.$row15['name'];?></loc>	 
	</url>
    <?php } ?>

</urlset>