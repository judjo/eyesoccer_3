<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <style>
        body{
            font-size: 18px;
        }
        .container-content{
            width: 92%;
            float: left;
            margin-left: 8%;
        }
        .container-content .bread{
            font-size: 0.9em;
            width: 60%;
        }
        .conten-left{
            width: 60%;
            float: left;
            margin-right: 4%;
        }
        .conten-left>h1{
            text-transform: capitalize;
            font-size: 2.5em;
            margin: 5px 0px;
            font-weight: 200;
        }
        .conten-left>span{
            font-size: .8em;
        }
        .img-box{
            width: 100%;
            min-height: 200px;
            background-color: antiquewhite;
            margin-top: 20px;
        }
        .img-box>img{
            width: 100%;
        }
        .content-right{
            width: 36%;
            float: left;
        }
        .rekomendasi{
            width: 100%;
            min-height: 400px;
        }
        .rekomendasi .tab li{
            font-size: 1.0em;
        }
        .banner{
            width: 80%;
            min-height: 120px;
            background-color: gray;
        }
        .vid-new{
            width: 100%;
            min-height: 300px;
        }
        .vid-new>h3{
            color: #da3e3e;
        }
        .box-video-lainnya
        {
            border: 1px solid black;
            width: 360px;
            height: 108px;
            padding: 2px;
        }
        .box-judul p
        {
            width: 330px;
            float: left;
            /* padding-left: 15px; */
            font-size: 0.8em;
            color: black;
        }
        .box-judul small{
            float: left;
            font-size: 0.8em;
            color: black;
            display: block;
            /* padding-right: 15px; */
        }
        .box-judul p:hover, .box-judul small:hover
        {
            color:#a3a0a0;
        }
        .itemss {
            height: 100px;
            width: 100%;
            text-align: center;
            background-color: white;
            margin-top: 10px;
            border-bottom: 1px solid #c3c3c3;
        }
        .itemss img{
            margin-right: -10px;
            border-right: 10px solid white;
        }
		#containerss{
			width: auto;
			float: left;
			margin-left: 8%;
			margin-left: 8%;
        }
        .data-title{
            float: left;
            width: auto;
            text-align: left;
            padding: 5px 10px;
            color: black;
            font-size: 1.5em;
            font-weight: 300;
            line-height: .5;
            max-height: 70px;
            overflow: hidden;
        }
        @media (min-width: 300px) and (max-width: 1004px)
        {
            .conten-left{
                width: 91%;
                float: left;
                margin-right: 4%;
            }
            .content-right{
                width: 100%;
                float: left;
            }
            .box-judul p
            {
                width: 285px;
                float: unset;
                padding-left: 15px;
                font-size: 0.8em;
                color: black;
            }
            .conten-left>h1{
                font-size: 1.5em;
            }
            .container-content{
                width: 96%;
                float: left;
                margin-left: 2%;
            }
            .conten-left, .container-content .bread{
                width: 100%;
            }
            #containerss{
                margin: 0px !important;
            }
            .data-title{
                width: 50%;
                font-size: 1.2em;
                line-height: 1.3;
            }
        }
		

    </style>
<?php
    foreach ($model as $value)
    {
        $date           = new DateTime($value['publish_on']);
        $description    = explode("<p>",$value['description']);
        $paragraf       = count($description);

        $tengah         = "";
        if ($paragraf%2 == 0)
        {
            $tengah     = $paragraf / 2;
        }
        else
        {
            $tengah     = ($paragraf - 1) / 2;
        }

        $tipe           = $value['news_type'];
        $id             = $value['eyenews_id'];
        $bacajuga       = $this->Eyenews_model->get_baca_juga($tipe,$id,2);
        $video          = $this->Eyenews_model->get_eyetube_title();

        
?>
    <div class="container-content">
        <br>
        <div class="bread">
            <ol class="breadcrumb">
                <li><a href="<?= base_url(); ?>eyenews">Home</a></li>
                <li><a href="<?= base_url(); ?>eyenews/search/<?= $value['news_type']; ?>"><?= $value['news_type']; ?></a></li>
                <li class="active"><?= $value['title']; ?></li>
            </ol>
        </div>

        <div class="conten-left">
            <h1>
                <?= $value['title']; ?>
            </h1>
            <span>Oleh <b><?= $value['fullname']; ?></b> - <?= date_format($date,"d M Y H:i:s"); ?></span>
            <div class="img-box">
                <img src="<?=base_url()?>systems/eyenews_storage/<?= $value['pic']; ?>" alt="">
            </div>
            <i style="float: right;font-size: 0.5em;color: gray;text-align: center;">
                Credit : <?= $value['credit']; ?>
            </i>
            <br>
            <small class="hidden-lg hidden-md">
                <center>
                    <i class="fa fa-eye"></i>
                    <?= $value['news_view']; ?> |
                        <a class="emoticon replace_like" type_emot="like" style="color:#E13E45;">
                            <i class="fa fa fa-heart"></i>
                            <span class="replace_like">
                                <?= $value['news_like']; ?>
                            </span>
                        </a>
                </center>
            </small>
            <small class="hidden-xs hidden-sm">
                <center>
                    <i class="fa fa-eye"></i>
                    <?= $value['news_view']; ?> |
                        <a class="emoticon " type_emot="like" style="color:#E13E45;">
                            <i class="fa fa fa-heart"></i>
                            <span class="replace_like">
                                <?= $value['news_like']; ?>
                            </span>
                        </a>
                </center>
            </small>
            <br>
            <p>
                <?php 
                    for ($i = 0; $i < $paragraf; $i++)
                    {
                        if($i == $tengah)
                        {
                ?>
                            <div class='col-lg-12 col-xs-12 bg-default thumbnail' style='line-height:200%;padding-left:10px;padding-right:10px;'>
                                <span style="color:#45a7c4;">Baca Juga :</span>
                                
                <?php
                            foreach ($bacajuga as $judul)
                            {
                ?>
                                <a href="<?= base_url(); ?>eyenews/detail/<?= $judul["eyenews_id"] ?>" id="a4" class="">
                                    <p class='h6 text-bold' style='color:#45a7c4;'>
                                        <strong><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> <?= $judul["title"]; ?></strong>
                                    </p>      
                                </a>
                <?php
                            }
                ?>
                                <a href="<?= base_url(); ?>eyetube/detail/<?= $video->eyetube_id; ?>" id="a4" class="">
                                    <p class='h6 text-bold' style='color:#45a7c4;'>
                                        <strong><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> VIDEO: <?= $video->title; ?></strong>
                                    </p>
                                </a>
                                
                            </div>
                <?php
                        }
                        echo "<p class='text-justify'>".$description[$i];
                    }
                ?>
            </p>
            <br>
            <br>
            <input type="hidden" id="eyenews_id22" value="<?=$id?>" />
            <h3 id="t1">Bagaimana reaksi Anda tentang artikel ini?</h3>
            <div class="col-lg-12 col-md-12" id="emoji" style="padding-left:0px;">
                <div class="col-md-2 col-lg-1 col-xs-3 col-sm-2" style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
                    <a class="emoticon" type_emot="smile">
                        <img src="<?=base_url()?>img/emoticon/senang.png" class="img-responsive max-width: 100% height: auto">
                        <small style="color:#fff">Senang</small>
                        <center class="replace_smile" style="background:#117A65;color:#fff;text-align:center;padding:1px;">
                            <?=$value['news_smile']?>
                        </center>
                    </a>
                </div>
                <div class="col-md-2 col-lg-1 col-xs-3 col-sm-2" style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
                    <a class="emoticon" type_emot="shock">
                        <img src="<?=base_url()?>img/emoticon/terkejut.png" class="img-responsive max-width: 100% height: auto">
                        <small style="color:#fff">Terkejut</small>
                        <center class="replace_shock" style="background:#117A65;color:#fff;text-align:center;padding:1px;">
                            <?=$value['news_shock']?>
                        </center>
                    </a>
                </div>
                <div class="col-md-2 col-lg-1 col-xs-3 col-sm-2" style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
                    <a class="emoticon" type_emot="inspired">
                        <img src="<?=base_url()?>img/emoticon/terinspirasi.png" class="img-responsive max-width: 100% height: auto">
                        <small style="color:#fff">Terinspirasi</small>
                        <center class="replace_inspired" style="background:#117A65;color:#fff;text-align:center;padding:1px;">
                            <?=$value['news_inspired']?>
                        </center>
                    </a>
                </div>
                <div class="col-md-2 col-lg-1 col-xs-3 col-sm-2" style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
                    <a class="emoticon" type_emot="happy">
                        <img src="<?=base_url()?>img/emoticon/bangga.png" class="img-responsive max-width: 100% height: auto">
                        <small style="color:#fff">Bangga</small>
                        <center class="replace_happy" style="background:#117A65;color:#fff;text-align:center;padding:1px;">
                            <?=$value['news_happy']?>
                        </center>
                    </a>
                </div>
                <div class="col-md-2 col-lg-1 col-xs-3 col-sm-2" style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
                    <a class="emoticon" type_emot="sad">
                        <img src="<?=base_url()?>img/emoticon/sedih.png" class="img-responsive max-width: 100% height: auto">
                        <small style="color:#fff">Sedih</small>
                        <center class="replace_sad" style="background:#117A65;color:#fff;text-align:center;padding:1px;">
                            <?=$value['news_sad']?>
                        </center>
                    </a>
                </div>
                <div class="col-md-2 col-lg-1 col-xs-3 col-sm-2" style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
                    <a class="emoticon" type_emot="fear">
                        <img src="<?=base_url()?>img/emoticon/takut.png" class="img-responsive max-width: 100% height: auto">
                        <small style="color:#fff">Takut</small>
                        <center class="replace_fear" style="background:#117A65;color:#fff;text-align:center;padding:1px;">
                            <?=$value['news_fear']?>
                        </center>
                    </a>
                </div>
                <div class="col-md-2 col-lg-1 col-xs-3 col-sm-2" style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
                    <a class="emoticon" type_emot="angry" style="cursor:pointer">
                        <img src="<?=base_url()?>img/emoticon/marah.png" class="img-responsive max-width: 100% height: auto">
                        <small style="color:#fff">Marah</small>
                        <center class="replace_angry" style="background:#117A65;color:#fff;text-align:center;padding:1px;">
                            <?=$value['news_angry']?>
                        </center>
                    </a>
                </div>
                <div class="col-md-2 col-lg-1 col-xs-3 col-sm-2" style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
                    <a class="emoticon" type_emot="fun" style="cursor:pointer">
                        <img src="<?=base_url()?>img/emoticon/terhibur.png" class="img-responsive max-width: 100% height: auto">
                        <small style="color:#fff">Terhibur</small>
                        <center class="replace_fun" style="background:#117A65;color:#fff;text-align:center;padding:1px;">
                            <?=$value['news_fun']?>
                        </center>
                    </a>
                </div>
            </div>
            <br>
            <h6 id="t4">Bagikan</h6>
            <hr></hr>
            <div class="sharethis-inline-share-buttons" data-image="<?=base_url()?>systems/eyenews_storage/<?php print $value['pic']; ?>"></div>
            <hr></hr>
            <div class="fb-comments" data-href="http://eyesoccer.id<?=$_SERVER['REQUEST_URI']?>" data-numposts="5"></div>
			<div class="banner hidden-md hidden-lg" style="width: 100%;">
				<img src="<?= base_url(); ?>systems/eyeads_storage/<?= $ads_right->pic; ?>" class="img img-responsive">
			</div>
        </div> 
        <div class="content-right hidden-sm hidden-xs">
            <br>
            <div class="rekomendasi">
                <div class="tab">
                    <ul class="nav nav-tabs" id="tab-nav">
                        <li class="active">
                            <a href="#terkini" data-toggle="tab" style="color: unset;">Terkini</a>
                        </li>
                        <li class="">
                            <a href="#terkait" data-toggle="tab" style="color: unset;">Terkait</a>
                        </li>
                        <li class="">
                            <a href="#terpopuler" data-toggle="tab" style="color: unset;">Terpopuler</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" style="margin-top: 1em;">
                    <div id="terkini" class="tab-pane fade in active">
            <?php
                foreach ($terkini as $terkininya)
                {
            ?>
                        <div class="media" style="width: 90%;border-bottom: 1px solid;padding-bottom: 10px;">
                            <a href="<?= base_url(); ?>eyenews/detail/<?= $terkininya["eyenews_id"]; ?>">
                                <img src="<?=base_url()?>systems/eyenews_storage/<?= $terkininya["thumb1"]; ?>" alt="" style="width: 90px; height: 80px; float: left;">
                                <div class="box-judul">
                                    <p><?= $terkininya["title"]; ?></p>
                                    <small><i class="fa fa-clock-o"></i><?= $terkininya['publish_on']; ?></small></a>
                                </div>
                            </a>
                        </div>
            <?php        
                }
            ?>
                    </div>
                    <div id="terkait" class="tab-pane fade">
            <?php
                $terkait = $this->Eyenews_model->get_baca_juga($tipe,$id,5);
                foreach ($terkait as $terkaitnya)
                {
            ?>
                        <div class="media drop-shadow" style="width: 90%;">
                            <a href="<?= base_url(); ?>eyenews/detail/<?= $terkaitnya["eyenews_id"]; ?>">
                                <img src="<?=base_url()?>systems/eyenews_storage/<?= $terkaitnya["thumb1"]; ?>" alt="" style="width: 90px; height: 80px; float: left;">
                                <div class="box-judul">
                                    <p><?= $terkaitnya["title"]; ?></p>
                                    <small><i class="fa fa-clock-o"></i><?= $terkaitnya['publish_on']; ?></small></a>
                                </div>
                            </a>
                        </div>
            <?php        
                }
            ?>
                    </div>
                    <div id="terpopuler" class="tab-pane fade">
            <?php
                foreach ($terpopuler as $terpopulernya)
                {
            ?>
                        <div class="media drop-shadow" style="width: 90%;">
                            <a href="<?= base_url(); ?>eyenews/detail/<?= $terpopulernya["eyenews_id"]; ?>">
                                <img src="<?=base_url()?>systems/eyenews_storage/<?= $terpopulernya["thumb1"]; ?>" alt="" style="width: 90px; height: 80px; float: left;">
                                <div class="box-judul">
                                    <p><?= $terpopulernya["title"]; ?></p>
                                    <small><i class="fa fa-clock-o"></i><?= $terpopulernya['publish_on']; ?></small></a>
                                </div>
                            </a>
                        </div>
            <?php        
                }
            ?>
                </div>
            </div>
            <div class="banner">

                <img src="<?= base_url(); ?>systems/eyeads_storage/<?= $ads_right->pic; ?>" class="img img-responsive hidden-md">
            </div>
            <div class="vid-new">
                <h3>Video Terbaru</h3>
        <?php
            foreach ($new_eyetube as $vid_baru)
            {
        ?>
                <div class="media drop-shadow" style="width: 90%;">
                    <a href="<?= base_url(); ?>eyetube/detail/<?= $vid_baru["eyetube_id"]; ?>">
                        <img src="<?=base_url()?>systems/eyetube_storage/<?= $vid_baru["thumb1"]; ?>" alt="" style="width: 90px; height: 80px; float: left;">
                        <div class="box-judul">
                            <p><?= $vid_baru["title"]; ?></p>
                            <small><i class="fa fa-clock-o"></i><?= $vid_baru['createon']; ?></small>
                        </div>
                    </a>
                </div>
        <?php        
            }
        ?>
            </div>
        </div>      
    </div>
</div>

	<div id="containerss">
	</div>
	<img style='width: 40%;margin-left: 30%;display:none' class='load-gif' src='../../assets/img/loadingsoccer.gif' alt='Loading'>
<?php        
    }
?>
    
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- ads 1 -->
    <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6403991612334960" data-ad-slot="1685766471" data-ad-format="auto"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- ads 2 -->
    <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6403991612334960" data-ad-slot="5820452607" data-ad-format="auto"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    <script>
        $(document).ready(function () 
        {
            $(".emoticon").click(function()
            {
                // alert("tes");
                id = $("#eyenews_id22").val();
                type = $(this).attr("type_emot");
                link = "eyenews";
                $.ajax({

                    type: "POST",
                    data: { 'type': type, 'id': id, 'link': link },
                    url: "<?=base_url()?>eyenews/new_emot/" + id,
                    dataType: "json",
                    success: function (data) {

                        $(".replace_" + type).empty().html(data.html);
                    }

                });
            })
			
			//Start infinite scroll
		var offset = 1;
        // create a long list of items
        var container = $("#containerss");
        var lastItemIndex = 0;
        var title = "";
        var loading = "<img style='width: 40%;margin-left: 30%;' class='load-gif' src='../../assets/img/loadingsoccer.gif' alt='Loading'>";
        var appendToList = function() {
			//getjson
			$.ajax({
				url: "../getRecentEyenews/" + offset,
				type: "GET",
				dataType: "JSON",
				success: function(data)
				{
					if(data[0]['title'] == 0){
						
					}else{
						// alert(JSON.stringify(data[0]['title']));
						$.each( data, function( key, data ) {
							$('.load-gif').hide();
							// console.log(data.title);
							var contentScroll = "<a style='font-size:14px;' href='/eyenews/detail/"+data.url+"'><div><img src='/systems/eyenews_storage/"+data.thumb1+"' style='height: 101px;float: left;'><div class='data-title'>"+data.title+"</div></div></a>"
                            var el = $("<div>").attr("class", "itemss").html(contentScroll);
                            
							lastItemIndex = lastItemIndex + 1;
							container.append(el);
							
						});
					}
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error get data from ajax');
				}
			});
			offset = offset+5;
			//end getjson
        }

        container.bind("infinite-scroll", function(args) {
          console.log("Received", args);
		  $('.load-gif').show();
          setTimeout(function(){ appendToList(); }, 1500);
        });

        var infiniteScroll = new $.InfiniteScroll('#containerss', true).setup();
        setTimeout(function(){ appendToList(); }, 1500);
        }) 
    </script>

    
    </body>
</html>