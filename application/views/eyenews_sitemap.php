<?= '<?xml version="1.0" encoding="UTF-8" ?>' ?>

<?php
$cmd15=$this->db->query("select * from tbl_eyenews order by eyenews_id DESC");

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
     <loc><?php echo base_url('eyenews/detail').'/'.$row15['url'];?></loc>	 
		<news:news>
			<news:publication>
				<news:name><![CDATA[ News EyeSoccer.id ]]></news:name>
				<news:language>id</news:language>
			</news:publication>
			<news:publication_date><?php $datetime = new DateTime($row15['publish_on']); echo $datetime->format(DateTime::ATOM); ?></news:publication_date>
			<news:title><![CDATA[<?php echo $row15['title']; ?>]]></news:title>
			<news:keywords><![CDATA[<?php echo $row15['news_type']; ?>]]></news:keywords>
		</news:news>
	</url>
    <?php } ?>

</urlset>