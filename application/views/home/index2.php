<?php 
	if(isset($_SERVER['HTTP_USER_AGENT'])){
		$agent = $_SERVER['HTTP_USER_AGENT'];
	}
	  // echo '<style type="text/css">#nav100{margin-top:70px}</style>';
	if (stripos( $agent, 'Chrome') !== false)
	{
		// echo "Google Chrome";
	}
	elseif (stripos( $agent, 'Safari') !== false)
	{ 
	   echo '<style type="text/css">.mobile-view{margin-top:6em}</style>';
	   // echo '<style type="text/css">.header-iphone{margin-top:5em}</style>';
	}
	$_SESSION["device_detail"]="Dekstop";
	function isMobileView() {
		return preg_match("/(iPhone|iPod|iPad|Android|BlackBerry|android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
	}
	// If the user is on a mobile device, redirect them
	if(isMobileView()){
	$_SESSION["device_detail"]="Mobile";
	}
	$runtext=$this->db->query("select * from tbl_running_text WHERE place='index' LIMIT 1")->row_array();
	if($_SESSION["device_detail"]=="Dekstop"){
?>


<div class="dekstop">
	<!-- JADWAL -->
    <div id="jadwal" class="jadwal carousel slide">
        <div class="left navigate" href="#jadwal" role="button">
            <i class="material-icons">keyboard_arrow_left</i>
        </div>
			<div role="listbox" class="j-box carousel-inner">
					<?php
					$j=$this->db->query("SELECT a.*,c.active,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where a.jadwal_pertandingan<='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan DESC LIMIT 12");
					$j2=$j->result_array();
					?>
					<div class="over item active">
						<?php
						$data=$j2[0];
						?>			
						<div class="j-content">
							<span class="t"><?=date("d M Y",strtotime($data["jadwal_pertandingan"]))?></span><br>
							<span class="r"><?=$data["club_a"]?></span><span class="s"><?=$data["score_a"]?></span><br>
							<span class="r"><?=$data["club_b"]?></span><span class="s"><?=$data["score_b"]?></span><br>
						</div>
						<?php
						$data=$j2[1];
						?>			
						<div class="j-content">
							<span class="t"><?=date("d M Y",strtotime($data["jadwal_pertandingan"]))?></span><br>
							<span class="r"><?=$data["club_a"]?></span><span class="s"><?=$data["score_a"]?></span><br>
							<span class="r"><?=$data["club_b"]?></span><span class="s"><?=$data["score_b"]?></span><br>
						</div>
						<?php
						$data=$j2[2];
						?>			
						<div class="j-content">
							<span class="t"><?=date("d M Y",strtotime($data["jadwal_pertandingan"]))?></span><br>
							<span class="r"><?=$data["club_a"]?></span><span class="s"><?=$data["score_a"]?></span><br>
							<span class="r"><?=$data["club_b"]?></span><span class="s"><?=$data["score_b"]?></span><br>
						</div>
						<?php
						$data=$j2[3];
						?>			
						<div class="j-content">
							<span class="t"><?=date("d M Y",strtotime($data["jadwal_pertandingan"]))?></span><br>
							<span class="r"><?=$data["club_a"]?></span><span class="s"><?=$data["score_a"]?></span><br>
							<span class="r"><?=$data["club_b"]?></span><span class="s"><?=$data["score_b"]?></span><br>
						</div>
						<?php
						$data=$j2[4];
						?>			
						<div class="j-content">
							<span class="t"><?=date("d M Y",strtotime($data["jadwal_pertandingan"]))?></span><br>
							<span class="r"><?=$data["club_a"]?></span><span class="s"><?=$data["score_a"]?></span><br>
							<span class="r"><?=$data["club_b"]?></span><span class="s"><?=$data["score_b"]?></span><br>
						</div>
						<?php
						$data=$j2[5];
						?>			
						<div class="j-content">
							<span class="t"><?=date("d M Y",strtotime($data["jadwal_pertandingan"]))?></span><br>
							<span class="r"><?=$data["club_a"]?></span><span class="s"><?=$data["score_a"]?></span><br>
							<span class="r"><?=$data["club_b"]?></span><span class="s"><?=$data["score_b"]?></span><br>
						</div>				
					</div>
				
				<div class="over item">
				<?php
				$data=$j2[6];
				?>			
					<div class="j-content">
						<span class="t"><?=date("d M Y",strtotime($data["jadwal_pertandingan"]))?></span><br>
						<span class="r"><?=$data["club_a"]?></span><span class="s"><?=$data["score_a"]?></span><br>
						<span class="r"><?=$data["club_b"]?></span><span class="s"><?=$data["score_b"]?></span><br>
					</div>
				<?php
				$data=$j2[7];
				?>			
					<div class="j-content">
						<span class="t"><?=date("d M Y",strtotime($data["jadwal_pertandingan"]))?></span><br>
						<span class="r"><?=$data["club_a"]?></span><span class="s"><?=$data["score_a"]?></span><br>
						<span class="r"><?=$data["club_b"]?></span><span class="s"><?=$data["score_b"]?></span><br>
					</div>
				<?php
				$data=$j2[8];
				?>			
					<div class="j-content">
						<span class="t"><?=date("d M Y",strtotime($data["jadwal_pertandingan"]))?></span><br>
						<span class="r"><?=$data["club_a"]?></span><span class="s"><?=$data["score_a"]?></span><br>
						<span class="r"><?=$data["club_b"]?></span><span class="s"><?=$data["score_b"]?></span><br>
					</div>
				<?php
				$data=$j2[9];
				?>			
					<div class="j-content">
						<span class="t"><?=date("d M Y",strtotime($data["jadwal_pertandingan"]))?></span><br>
						<span class="r"><?=$data["club_a"]?></span><span class="s"><?=$data["score_a"]?></span><br>
						<span class="r"><?=$data["club_b"]?></span><span class="s"><?=$data["score_b"]?></span><br>
					</div>
				<?php
				$data=$j2[10];
				?>			
					<div class="j-content">
						<span class="t"><?=date("d M Y",strtotime($data["jadwal_pertandingan"]))?></span><br>
						<span class="r"><?=$data["club_a"]?></span><span class="s"><?=$data["score_a"]?></span><br>
						<span class="r"><?=$data["club_b"]?></span><span class="s"><?=$data["score_b"]?></span><br>
					</div>
				<?php
				$data=$j2[11];
				?>			
					<div class="j-content">
						<span class="t"><?=date("d M Y",strtotime($data["jadwal_pertandingan"]))?></span><br>
						<span class="r"><?=$data["club_a"]?></span><span class="s"><?=$data["score_a"]?></span><br>
						<span class="r"><?=$data["club_b"]?></span><span class="s"><?=$data["score_b"]?></span><br>
					</div>				
				</div>
			</div>
		<div class="right navigate" href="#jadwal" role="button">
			<i class="material-icons">keyboard_arrow_right</i>
		</div>
	</div>

	<!-- TRENDING -->
        <div class="trending">
            <span class="x-c">
                <span>Trending</span>
					<?php 
					 $this->load->helper('my');
					foreach ($trend_eyetube as $trendnya_tube)
					{
						$judul_trend 	= word_limiter($trendnya_tube['title'],3);
					?>
						<a href="<?php echo base_url(); ?>eyetube/detail/<?= $trendnya_tube['url']; ?>" title="<?php echo $trendnya_tube['title'] ?>">
							<?php echo $judul_trend; ?>
						</a>
					<?php
					}
					?>
					<?php
					foreach ($trend_eyenews as $trendnya_news)
					{
					?>
						<a href="<?php echo base_url(); ?>eyenews/detail/<?= $trendnya_news['url']; ?>" title="<?php echo $trendnya_news['title']; ?>">
							<?php echo word_limiter($trendnya_news['title'],3); ?>
						</a>
					<?php		
					}
					?>
            </span>
        </div>
		<!-- EYEPROFILE -->
        <div class="carous center-dekstop m-t-35">
            <img class="img-title" src="assets/img/ic_eyeprofile.png" alt="">
            <h2 class="title ep">EyeProfile</h2>
            <hr class="x-ep">
            <span>
                <a href="" class="kl">Klub Lainnya</a>
                <i class="material-icons r-kl">keyboard_arrow_right</i>                                
            </span>            
            <div id="epSlide" class="carousel slide">			  
			<div role="listbox" class="carousel-inner"> 
			<?php
			$klub=$this->db->query("SELECT a.club_id,a.name as nama_club,a.logo as logo_club,b.name as nama_manager,count(c.name) as squad
									FROM tbl_club a INNER JOIN tbl_official_team b on a.club_id = b.club_now LEFT JOIN tbl_player c on a.club_id = c.club_id
									WHERE b.position  = 'Manager' AND a.id_liga = '0' GROUP BY a.club_id ASC LIMIT 12");
			$klub2=$klub->result_array();
			?>			
                    <div class="box item active">
                        <div class="box-content">
						<?php
						$data=$klub2[0];
						?>
                            <!--<img src="assets/img/ss-img.png" alt="">-->
							<img height="100px;" src="<?=base_url()?>systems/club_logo/<?php print $data['logo_club']; ?>">								
                            <div class="detail">
                                <h2><?=$data["nama_club"]?></h2>
                                <h3>Liga 1 Indonesia</h3>
                                <table>
                                    <tr>
                                        <td>Jumlah Pemain</td>
                                        <td><?=$data["squad"]?></td>
                                    </tr>
                                    <tr>
                                        <td>Manager</td>
                                        <td><?=$data["nama_manager"]?></td>
                                    </tr>
                                </table>                        
                            </div>
                        </div>
                        <div class="box-content">
						<?php
						$data=$klub2[1];
						?>
							<!--<img src="assets/img/ss-img.png" alt="">-->
							<img height="100px;" src="<?=base_url()?>systems/club_logo/<?php print $data['logo_club']; ?>">
                            <div class="detail">
                                <h2><?=$data["nama_club"]?></h2>
                                <h3>Liga 1 Indonesia</h3>
                                <table>
                                    <tr>
                                        <td>Jumlah Pemain</td>
                                        <td><?=$data["squad"]?></td>
                                    </tr>
                                    <tr>
                                        <td>Manager</td>
                                        <td><?=$data["nama_manager"]?></td>
                                    </tr>
                                </table>                        
                            </div>
                        </div>						

                        <div class="box-content">
						<?php
						$data=$klub2[2];
						?>
                            <!--<img src="assets/img/ss-img.png" alt="">-->
							<img height="100px;" src="<?=base_url()?>systems/club_logo/<?php print $data['logo_club']; ?>">
                            <div class="detail">
                                <h2><?=$data["nama_club"]?></h2>
                                <h3>Liga 1 Indonesia</h3>
                                <table>
                                    <tr>
                                        <td>Jumlah Pemain</td>
                                        <td><?=$data["squad"]?></td>
                                    </tr>
                                    <tr>
                                        <td>Manager</td>
                                        <td><?=$data["nama_manager"]?></td>
                                    </tr>
                                </table>                        
                            </div>
                        </div>						

                        <div class="box-content">
						<?php
						$data=$klub2[3];
						?>
                            <!--<img src="assets/img/ss-img.png" alt="">-->
							<img height="100px;" src="<?=base_url()?>systems/club_logo/<?php print $data['logo_club']; ?>">
                            <div class="detail">
                                <h2><?=$data["nama_club"]?></h2>
                                <h3>Liga 1 Indonesia</h3>
                                <table>
                                    <tr>
                                        <td>Jumlah Pemain</td>
                                        <td><?=$data["squad"]?></td>
                                    </tr>
                                    <tr>
                                        <td>Manager</td>
                                        <td><?=$data["nama_manager"]?></td>
                                    </tr>
                                </table>                        
                            </div>
                        </div>
						
                        </div>
                        <div class="box item">
                        <div class="box-content">
						<?php
						$data=$klub2[4];
						?>
                            <!--<img src="assets/img/ss-img.png" alt="">-->
							<img height="100px;" src="<?=base_url()?>systems/club_logo/<?php print $data['logo_club']; ?>">
                            <div class="detail">
                                <h2><?=$data["nama_club"]?></h2>
                                <h3>Liga 1 Indonesia</h3>
                                <table>
                                    <tr>
                                        <td>Jumlah Pemain</td>
                                        <td><?=$data["squad"]?></td>
                                    </tr>
                                    <tr>
                                        <td>Manager</td>
                                        <td><?=$data["nama_manager"]?></td>
                                    </tr>
                                </table>                        
                            </div>
                        </div>
                        <div class="box-content">
						<?php
						$data=$klub2[5];
						?>
                            <!--<img src="assets/img/ss-img.png" alt="">-->
							<img height="100px;" src="<?=base_url()?>systems/club_logo/<?php print $data['logo_club']; ?>">
                            <div class="detail">
                                <h2><?=$data["nama_club"]?></h2>
                                <h3>Liga 1 Indonesia</h3>
                                <table>
                                    <tr>
                                        <td>Jumlah Pemain</td>
                                        <td><?=$data["squad"]?></td>
                                    </tr>
                                    <tr>
                                        <td>Manager</td>
                                        <td><?=$data["nama_manager"]?></td>
                                    </tr>
                                </table>                        
                            </div>
                        </div>
                        <div class="box-content">
						<?php
						$data=$klub2[6];
						?>
                            <!--<img src="assets/img/ss-img.png" alt="">-->
							<img height="100px;" src="<?=base_url()?>systems/club_logo/<?php print $data['logo_club']; ?>">
                            <div class="detail">
                                <h2><?=$data["nama_club"]?></h2>
                                <h3>Liga 1 Indonesia</h3>
                                <table>
                                    <tr>
                                        <td>Jumlah Pemain</td>
                                        <td><?=$data["squad"]?></td>
                                    </tr>
                                    <tr>
                                        <td>Manager</td>
                                        <td><?=$data["nama_manager"]?></td>
                                    </tr>
                                </table>                        
                            </div>
                        </div>
                        <div class="box-content">
						<?php
						$data=$klub2[7];
						?>
                            <!--<img src="assets/img/ss-img.png" alt="">-->
							<img height="100px;" src="<?=base_url()?>systems/club_logo/<?php print $data['logo_club']; ?>">
                            <div class="detail">
                                <h2><?=$data["nama_club"]?></h2>
                                <h3>Liga 1 Indonesia</h3>
                                <table>
                                    <tr>
                                        <td>Jumlah Pemain</td>
                                        <td><?=$data["squad"]?></td>
                                    </tr>
                                    <tr>
                                        <td>Manager</td>
                                        <td><?=$data["nama_manager"]?></td>
                                    </tr>
                                </table>                        
                            </div>
                        </div>
                        </div>
                        <div class="box item">
                        <div class="box-content">
						<?php
						$data=$klub2[8];
						?>
                            <!--<img src="assets/img/ss-img.png" alt="">-->
							<img height="100px;" src="<?=base_url()?>systems/club_logo/<?php print $data['logo_club']; ?>">
                            <div class="detail">
                                <h2><?=$data["nama_club"]?></h2>
                                <h3>Liga 1 Indonesia</h3>
                                <table>
                                    <tr>
                                        <td>Jumlah Pemain</td>
                                        <td><?=$data["squad"]?></td>
                                    </tr>
                                    <tr>
                                        <td>Manager</td>
                                        <td><?=$data["nama_manager"]?></td>
                                    </tr>
                                </table>                        
                            </div>
                        </div>
                        <div class="box-content">
						<?php
						$data=$klub2[9];
						?>
                            <!--<img src="assets/img/ss-img.png" alt="">-->
							<img height="100px;" src="<?=base_url()?>systems/club_logo/<?php print $data['logo_club']; ?>">
                            <div class="detail">
                                <h2><?=$data["nama_club"]?></h2>
                                <h3>Liga 1 Indonesia</h3>
                                <table>
                                    <tr>
                                        <td>Jumlah Pemain</td>
                                        <td><?=$data["squad"]?></td>
                                    </tr>
                                    <tr>
                                        <td>Manager</td>
                                        <td><?=$data["nama_manager"]?></td>
                                    </tr>
                                </table>                        
                            </div>
                        </div>
                        <div class="box-content">
						<?php
						$data=$klub2[10];
						?>
                            <!--<img src="assets/img/ss-img.png" alt="">-->
							<img height="100px;" src="<?=base_url()?>systems/club_logo/<?php print $data['logo_club']; ?>">
                            <div class="detail">
                                <h2><?=$data["nama_club"]?></h2>
                                <h3>Liga 1 Indonesia</h3>
                                <table>
                                    <tr>
                                        <td>Jumlah Pemain</td>
                                        <td><?=$data["squad"]?></td>
                                    </tr>
                                    <tr>
                                        <td>Manager</td>
                                        <td><?=$data["nama_manager"]?></td>
                                    </tr>
                                </table>                        
                            </div>
                        </div>
                        <div class="box-content">
						<?php
						$data=$klub2[11];
						?>
                            <!--<img src="assets/img/ss-img.png" alt="">-->
							<img height="100px;" src="<?=base_url()?>systems/club_logo/<?php print $data['logo_club']; ?>">
                            <div class="detail">
                                <h2><?=$data["nama_club"]?></h2>
                                <h3>Liga 1 Indonesia</h3>
                                <table>
                                    <tr>
                                        <td>Jumlah Pemain</td>
                                        <td><?=$data["squad"]?></td>
                                    </tr>
                                    <tr>
                                        <td>Manager</td>
                                        <td><?=$data["nama_manager"]?></td>
                                    </tr>
                                </table>                        
                            </div>
                        </div>
                        </div>
                </div>    
                <div class="carousel-indicators bx-dot ep-dot">
                    <span data-target="#epSlide" data-slide-to="0" class="dot active"></span>
                    <span data-target="#epSlide" data-slide-to="1" class="dot"></span>
                    <span data-target="#epSlide" data-slide-to="2" class="dot"></span> 
                </div> 

            </div>
        <div class="pemain">
            <div class="bx-nav">
                <i class="material-icons left i-bx-nav" href="#topPemain" role="button">keyboard_arrow_left</i>
                <i class="material-icons right i-bx-nav" href="#topPemain" role="button">keyboard_arrow_right</i>
            </div>
            <h3 class="o">Pemain Paling Banyak Dilihat</h3>
            <div class="carousel slide" id="topPemain" >
                <div class="bx-pemain carousel-inner" role="listbox">
				<?php
				$profile=$this->db->query("SELECT
										a.player_id,
										a.club_id,
										a.birth_date as tgl_lahir,
										SUBSTRING(a.birth_date,1,2) as tanggal,
										SUBSTRING(a.birth_date,4,2) as bulan,
										SUBSTRING(a.birth_date,7,4) as tahun,
										a.name as nama,
										a.pic as foto,
										a.position as posisi,
										b.name as klub
									FROM
										tbl_player a
									LEFT JOIN
										tbl_club b on a.club_id = b.club_id
									WHERE
										a.status like '%pro%'
										AND
										a.birth_date like '%/%'
									ORDER BY RAND() DESC
									LIMIT 12");
				$profile2=$profile->result_array();
				?>				
                    <div class="item active">
                        <div class="ctn-pemain">
						<?php
						$data=$profile2[0];
						$bulan 	= array(
			                '01' => 'Januari',
			                '02' => 'Februari',
			                '03' => 'Maret',
			                '04' => 'April',
			                '05' => 'Mei',
			                '06' => 'Juni',
			                '07' => 'Juli',
			                '08' => 'Agustus',
			                '09' => 'September',
			                '10' => 'Oktober',
			                '11' => 'November',
			                '12' => 'Desember',
						);						
						?>						
                            <!--<img src="assets/img/ss-img.png" alt="">-->
							<div class="img-most-player">
							<img src="<?=base_url()?>systems/player_storage/<?php print $data['foto']; ?>">
							</div>
                            <div class="des">
                                <h3><?=$data["nama"]?></h3>
                                <p>Posisi: <?=$data["posisi"]?><br>
                                Klub: <?=$data["klub"]?><br>
                                Tanggal Lahir: <?= $data['tanggal']." ".$bulan[$data['bulan']]." ".$data['tahun']; ?></p>                        
                            </div>
                        </div>
                        <div class="ctn-pemain">
						<?php
						$data=$profile2[1];
						$bulan 	= array(
			                '01' => 'Januari',
			                '02' => 'Februari',
			                '03' => 'Maret',
			                '04' => 'April',
			                '05' => 'Mei',
			                '06' => 'Juni',
			                '07' => 'Juli',
			                '08' => 'Agustus',
			                '09' => 'September',
			                '10' => 'Oktober',
			                '11' => 'November',
			                '12' => 'Desember',
						);						
						?>						
                            <!--<img src="assets/img/ss-img.png" alt="">-->
							<div class="img-most-player">
							<img src="<?=base_url()?>systems/player_storage/<?php print $data['foto']; ?>">
							</div>							
                            <div class="des">
                                <h3><?=$data["nama"]?></h3>
                                <p>Posisi: <?=$data["posisi"]?><br>
                                Klub: <?=$data["klub"]?><br>
                                Tanggal Lahir: <?= $data['tanggal']." ".$bulan[$data['bulan']]." ".$data['tahun']; ?></p>                        
                            </div>
                        </div>
                        <div class="ctn-pemain">
						<?php
						$data=$profile2[2];
						$bulan 	= array(
			                '01' => 'Januari',
			                '02' => 'Februari',
			                '03' => 'Maret',
			                '04' => 'April',
			                '05' => 'Mei',
			                '06' => 'Juni',
			                '07' => 'Juli',
			                '08' => 'Agustus',
			                '09' => 'September',
			                '10' => 'Oktober',
			                '11' => 'November',
			                '12' => 'Desember',
						);						
						?>						
                            <!--<img src="assets/img/ss-img.png" alt="">-->
							<div class="img-most-player">
							<img src="<?=base_url()?>systems/player_storage/<?php print $data['foto']; ?>">
							</div>							
                            <div class="des">
                                <h3><?=$data["nama"]?></h3>
                                <p>Posisi: <?=$data["posisi"]?><br>
                                Klub: <?=$data["klub"]?><br>
                                Tanggal Lahir: <?= $data['tanggal']." ".$bulan[$data['bulan']]." ".$data['tahun']; ?></p>                        
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="ctn-pemain">
						<?php
						$data=$profile2[3];
						$bulan 	= array(
			                '01' => 'Januari',
			                '02' => 'Februari',
			                '03' => 'Maret',
			                '04' => 'April',
			                '05' => 'Mei',
			                '06' => 'Juni',
			                '07' => 'Juli',
			                '08' => 'Agustus',
			                '09' => 'September',
			                '10' => 'Oktober',
			                '11' => 'November',
			                '12' => 'Desember',
						);						
						?>						
                            <!--<img src="assets/img/ss-img.png" alt="">-->
							<div class="img-most-player">
							<img src="<?=base_url()?>systems/player_storage/<?php print $data['foto']; ?>">
							</div>							
                            <div class="des">
                                <h3><?=$data["nama"]?></h3>
                                <p>Posisi: <?=$data["posisi"]?><br>
                                Klub: <?=$data["klub"]?><br>
                                Tanggal Lahir: <?= $data['tanggal']." ".$bulan[$data['bulan']]." ".$data['tahun']; ?></p>                        
                            </div>
                        </div>
                        <div class="ctn-pemain">
						<?php
						$data=$profile2[4];
						$bulan 	= array(
			                '01' => 'Januari',
			                '02' => 'Februari',
			                '03' => 'Maret',
			                '04' => 'April',
			                '05' => 'Mei',
			                '06' => 'Juni',
			                '07' => 'Juli',
			                '08' => 'Agustus',
			                '09' => 'September',
			                '10' => 'Oktober',
			                '11' => 'November',
			                '12' => 'Desember',
						);						
						?>						
                            <!--<img src="assets/img/ss-img.png" alt="">-->
							<div class="img-most-player">
							<img src="<?=base_url()?>systems/player_storage/<?php print $data['foto']; ?>">
							</div>							
                            <div class="des">
                                <h3><?=$data["nama"]?></h3>
                                <p>Posisi: <?=$data["posisi"]?><br>
                                Klub: <?=$data["klub"]?><br>
                                Tanggal Lahir: <?= $data['tanggal']." ".$bulan[$data['bulan']]." ".$data['tahun']; ?></p>                        
                            </div>
                        </div>
                        <div class="ctn-pemain">
						<?php
						$data=$profile2[5];
						$bulan 	= array(
			                '01' => 'Januari',
			                '02' => 'Februari',
			                '03' => 'Maret',
			                '04' => 'April',
			                '05' => 'Mei',
			                '06' => 'Juni',
			                '07' => 'Juli',
			                '08' => 'Agustus',
			                '09' => 'September',
			                '10' => 'Oktober',
			                '11' => 'November',
			                '12' => 'Desember',
						);						
						?>						
                            <!--<img src="assets/img/ss-img.png" alt="">-->							
							<div class="img-most-player">
							<img src="<?=base_url()?>systems/player_storage/<?php print $data['foto']; ?>">
							</div>							
                            <div class="des">
                                <h3><?=$data["nama"]?></h3>
                                <p>Posisi: <?=$data["posisi"]?><br>
                                Klub: <?=$data["klub"]?><br>
                                Tanggal Lahir: <?= $data['tanggal']." ".$bulan[$data['bulan']]." ".$data['tahun']; ?></p>                        
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="ctn-pemain">
						<?php
						$data=$profile2[6];
						$bulan 	= array(
			                '01' => 'Januari',
			                '02' => 'Februari',
			                '03' => 'Maret',
			                '04' => 'April',
			                '05' => 'Mei',
			                '06' => 'Juni',
			                '07' => 'Juli',
			                '08' => 'Agustus',
			                '09' => 'September',
			                '10' => 'Oktober',
			                '11' => 'November',
			                '12' => 'Desember',
						);						
						?>						
                            <!--<img src="assets/img/ss-img.png" alt="">-->							
							<div class="img-most-player">
							<img src="<?=base_url()?>systems/player_storage/<?php print $data['foto']; ?>">
							</div>							
                            <div class="des">
                                <h3><?=$data["nama"]?></h3>
                                <p>Posisi: <?=$data["posisi"]?><br>
                                Klub: <?=$data["klub"]?><br>
                                Tanggal Lahir: <?= $data['tanggal']." ".$bulan[$data['bulan']]." ".$data['tahun']; ?></p>                        
                            </div>
                        </div>
                        <div class="ctn-pemain">
						<?php
						$data=$profile2[7];
						$bulan 	= array(
			                '01' => 'Januari',
			                '02' => 'Februari',
			                '03' => 'Maret',
			                '04' => 'April',
			                '05' => 'Mei',
			                '06' => 'Juni',
			                '07' => 'Juli',
			                '08' => 'Agustus',
			                '09' => 'September',
			                '10' => 'Oktober',
			                '11' => 'November',
			                '12' => 'Desember',
						);						
						?>						
                            <!--<img src="assets/img/ss-img.png" alt="">-->							
							<div class="img-most-player">
							<img src="<?=base_url()?>systems/player_storage/<?php print $data['foto']; ?>">
							</div>							
                            <div class="des">
                                <h3><?=$data["nama"]?></h3>
                                <p>Posisi: <?=$data["posisi"]?><br>
                                Klub: <?=$data["klub"]?><br>
                                Tanggal Lahir: <?= $data['tanggal']." ".$bulan[$data['bulan']]." ".$data['tahun']; ?></p>                        
                            </div>
                        </div>
                        <div class="ctn-pemain">
						<?php
						$data=$profile2[8];
						$bulan 	= array(
			                '01' => 'Januari',
			                '02' => 'Februari',
			                '03' => 'Maret',
			                '04' => 'April',
			                '05' => 'Mei',
			                '06' => 'Juni',
			                '07' => 'Juli',
			                '08' => 'Agustus',
			                '09' => 'September',
			                '10' => 'Oktober',
			                '11' => 'November',
			                '12' => 'Desember',
						);						
						?>						
                            <!--<img src="assets/img/ss-img.png" alt="">-->							
							<div class="img-most-player">
							<img src="<?=base_url()?>systems/player_storage/<?php print $data['foto']; ?>">
							</div>							
                            <div class="des">
                                <h3><?=$data["nama"]?></h3>
                                <p>Posisi: <?=$data["posisi"]?><br>
                                Klub: <?=$data["klub"]?><br>
                                Tanggal Lahir: <?= $data['tanggal']." ".$bulan[$data['bulan']]." ".$data['tahun']; ?></p>                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

		<!-- EYETUBE -->
        <div class="center-dekstop pd-l-100">        
            <img class="img-title" src="assets/img/ic_eyetube.png" alt="">
            <h2 class="title et">EyeTube</h2>
            <hr class="x-et">
            <div class="et-content m-b-100">
			<?php
			$etube=$this->db->query("SELECT a.eyetube_id, a.title, a.description, a.thumb,a.thumb1,a.video,a.url,a.createon,a.tube_view
									FROM tbl_eyetube a WHERE a.active = 1 ORDER BY a.eyetube_id DESC LIMIT 3");
			$etube2=$etube->result_array();
			?>
                <div class="et-content1 m-t-22">
				<?php
				$data=$etube2[0];
				?>
                    <div class="et-v-content">
					<a href="<?=base_url()?>eyetube/detail/<?=$data["eyetube_id"]?>">					
                        <img width="100%" height="" src="<?=base_url()?>systems/eyetube_storage/<?php print $data['thumb']; ?>">
                        <div class="btn-play">
                            <img src="assets/img/btn-play.png" alt=""></a>
                        </div>
					
                    </div>
                    <span class="et-st">
					<?php
					$date 		=  new DateTime($data['createon']);
					$tanggal 	= date_format($date,"Y-m-d H:i:s");
					echo relative_time($tanggal) . ' ago - '.$data['tube_view'].' views';						 
					?>
					</span>
                    <h1 class="et-title"><?=$data["title"]?></h1>
                    <p class="et-d"><?=substr($data["description"],0,198)?>...</p>
                </div>
                <div class="et-content2">
                    <div class="v-et-content2">
					<?php
					$data=$etube2[1];
					?>
						<div class="t-et-content2">						
                            <span class="et-st">
							<?php
							$date 		=  new DateTime($data['createon']);
							$tanggal 	= date_format($date,"Y-m-d H:i:s");
							echo relative_time($tanggal) . ' ago - '.$data['tube_view'].' views';						 
							?>
							</span>
                            <p class="et-st-det"><?=$data["title"]?></p>
                        </div>
                        <img class="v-et-2 v-et-100" width="100%" src="<?=base_url()?>systems/eyetube_storage/<?php print $data['thumb']; ?>" alt="">
                    </div>
                    <div class="v-et-content2 t-55">
					<?php
					$data=$etube2[2];
					?>
                        <div class="t-et-content2">
                            <span class="et-st">
							<?php
							$date 		=  new DateTime($data['createon']);
							$tanggal 	= date_format($date,"Y-m-d H:i:s");
							echo relative_time($tanggal) . ' ago - '.$data['tube_view'].' views';						 
							?>
							</span>
                            <p class="et-st-det"><?=$data["title"]?></p>
                        </div>
                        <img class="v-et-2 v-et-100" width="100%" src="<?=base_url()?>systems/eyetube_storage/<?php print $data['thumb']; ?>" alt="">
                    </div>
                </div>
            </div>

            <div class="container tab" style="padding-top: 30px;">
                <span href="" data-target="#esTab" data-slide-to="0" class="">eyesoccer star</span>
                <span href="" data-target="#esTab" data-slide-to="1" class="">video popular</span>
                <span href="" data-target="#esTab" data-slide-to="2" class="">video kamu</span>
                <hr>
                <div id="esTab" class="carousel slide">
                    <div role="listbox" class="carousel-inner">                    
                        <div class="box item active">
                            <div class="box-vl pd-b-10">
                                <a href="" class="vl">Video Lainnya</a>
                                <i class="material-icons r-vl">keyboard_arrow_right</i>                                
                            </div>
							<?php
							$stars=$this->db->query("SELECT a.eyetube_id,a.title,a.description,a.thumb,a.video,a.url,a.createon,a.tube_view,a.category_name
									FROM tbl_eyetube a WHERE a.active = 1 AND a.category_name like '%star%' ORDER BY a.eyetube_id DESC LIMIT 4");
							?>
							<?php
							$date 		=  new DateTime($data['createon']);
							$tanggal 	= date_format($date,"Y-m-d H:i:s");
							foreach($stars->result_array() as $data){							
							print'
                            <div class="vid-box-vl">
                                <!--<img src="systems/eyetube_storage/'.$data['thumb'].'" alt="">-->
								<img src="assets/img/video-small.png" alt="">
                                <a href="'.base_url().'/eyetube/detail/'.$data["eyetube_id"].'" class="vid-ttl">'.$data['title'].'</a><br>
                                <p class="vid-time">'.date("d M Y",strtotime($data["createon"])).'</p>
								<p class="vid-time">'.$data['tube_view'].' views - '.relative_time($tanggal).' ago</p>
                            </div>';
							}?>
                        </div>
						
                        <div class="box item">
                            <div class="box-vl">
                                <a href="" class="vl">Video Lainnya</a>
                                <i class="material-icons r-vl">keyboard_arrow_right</i>                                
                            </div>
							<?php
							$popular=$this->db->query("SELECT a.eyetube_id,a.title,a.description,a.thumb,a.video,a.url,a.createon,a.tube_view,a.category_name
									FROM tbl_eyetube a WHERE a.publish_on<='".date("Y-m-d H:i:s")."' order by a.tube_view DESC LIMIT 4");
							?>
							<?php
							$date 		=  new DateTime($data['createon']);
							$tanggal 	= date_format($date,"Y-m-d H:i:s");						 
							foreach($popular->result_array() as $data){
							print'
                            <div class="vid-box-vl">
                                <!--<img src="systems/eyetube_storage/'.$data['thumb'].'" alt="">-->
								<img src="assets/img/video-small.png" alt="">
                                <a href="'.base_url().'/eyetube/detail/'.$data["eyetube_id"].'" class="vid-ttl">'.$data['title'].'</a><br>
                                <p class="vid-time">'.date("d M Y",strtotime($data["createon"])).'</p>                              
								<p class="vid-time">'.$data['tube_view'].' views - '.relative_time($tanggal).' ago</p>								
                            </div>';
							}?>
                        </div>
						
                        <div class="box item">
                            <div class="box-vl">
                                <a href="" class="vl">Video Lainnya</a>
                                <i class="material-icons r-vl">keyboard_arrow_right</i>                                
                            </div>
							<?php
							$kamu=$this->db->query("SELECT a.eyetube_id,a.title,a.description,a.thumb,a.video,a.url,a.createon,a.tube_view,a.category_name
									FROM tbl_eyetube a WHERE a.active = 1 AND a.category_name like '%video kamu%' ORDER BY a.eyetube_id DESC LIMIT 4");
							?>
							<?php
							$date 		=  new DateTime($data['createon']);
							$tanggal 	= date_format($date,"Y-m-d H:i:s");
							foreach($kamu->result_array() as $data){
							print'							
                            <div class="vid-box-vl">
                                <!--<img src="systems/eyetube_storage/'.$data['thumb'].'" alt="">-->
								<img src="assets/img/video-small.png" alt="">
                                <a href="'.base_url().'/eyetube/detail/'.$data["eyetube_id"].'" class="vid-ttl">'.$data['title'].'</a><br>
                                <p class="vid-time">'.date("d M Y",strtotime($data["createon"])).'</p>                              
								<p class="vid-time">'.$data['tube_view'].' views - '.relative_time($tanggal).' ago</p>
                            </div>';
							}?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- EYENEWS -->
        <div class="center-dekstop pd-l-100">
            <div class="et-content m-b-150">
                <div class="et-content1">
                    <img class="img-title" src="assets/img/ic_eyenews.png" alt="">
                    <h2 class="title en">EyeNews</h2>
                    <hr class="x-en">
					<?php
					$enews=$this->db->query("SELECT a.eyenews_id,a.title,a.thumb1,a.news_type,a.news_view,a.createon
									FROM tbl_eyenews a ORDER BY a.eyenews_id DESC LIMIT 1");
					$enews2=$enews->result_array();
					?>					
                    <div class="t-en-content2">
					<?php
					$data=$enews2[0];
					?>			
						<p class="et-st-det"><a href="<?=base_url()?>eyenews/detail/<?=$data["eyenews_id"]?>" class="enews-ttl"><?=$data["title"]?></a></p>
                        <span class="et-st">
						<?php
							$date 		=  new DateTime($data['createon']);
							$tanggal 	= date_format($date,"Y-m-d H:i:s");
							echo relative_time($tanggal) . ' ago - '.$data['news_view'].' views';						 
							?>
						</span>
                    </div>					
                    <!--<img class="v-et-2 w-100" src="<?=base_url()?>systems/eyenews_storage/<?php print $data['thumb1']; ?>" alt="">-->
					<img class="v-et-2 w-100" src="assets/img/video-small.png" alt="">
                    <!--<div class="h-berita-terkait">
                        <h3>Berita Terkait</h3>
                        <ul>
                            <li><a href="">lorem ipsum dolor sit ametlorem ipsum dolor sit ametlorem ipsum dolor sit amet</a></li>
                            <li><a href="">lorem ipsum dolor sit ametlorem ipsum dolor sit ametlorem ipsum dolor sit amet</a></li>
                            <li><a href="">lorem ipsum dolor sit ametlorem ipsum dolor sit ametlorem ipsum dolor sit amet</a></li>
                        </ul>
                    </div>-->
                    <div class="h-berita-terkait">
					<h5>Berita Terkait</h5>
					<?php
					$i = 0;
					foreach ($eyenews_similar as $similar)
					{
	  				if ($i != 0)
	  				{
					?>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>eyenews/detail/<?= $similar['eyenews_id'];?>"><?= $similar['title']; ?></a></li>
                        </ul>
					<?php			
	  				}
	  				$i++;
					}
					?>						
                    </div>					
                </div>
				<div class="et-content2">
                    <img class="img-title" src="assets/img/ic-eyeme.png" alt="">
                    <h2 class="title em">EyeMe</h2>
                    <hr class="x-em">
                    <div class="c-em-content2">
                        <img src="assets/img/eyeme-photo thumbnail.png" alt="">
                        <img src="assets/img/eyeme-photo thumbnail.png" alt="">
                        <img src="assets/img/eyeme-photo thumbnail.png" alt="">
                        <img src="assets/img/eyeme-photo thumbnail.png" alt="">
                        <img src="assets/img/eyeme-photo thumbnail.png" alt="">
                        <img src="assets/img/eyeme-photo thumbnail.png" alt="">
                        <img src="assets/img/eyeme-photo thumbnail.png" alt="">
                        <img src="assets/img/eyeme-photo thumbnail.png" alt="">
                        <img src="assets/img/eyeme-photo thumbnail.png" alt="">
                        <button type="text" class="em-btn">Lihat Foto Lainnya</button>                     
                    </div>
                </div>
            </div>
        </div>
        <div class="center-dekstop pd-l-100">
            <div class="et-content">
                <div class="et-content1">
                    <div class="container tab2">
                        <span href="" data-target="#tab2" data-slide-to="0" class="">terpopuler</span>
                        <span href="" data-target="#tab2" data-slide-to="1" class="">rekomendasi</span>
                        <span href="" data-target="#tab2" data-slide-to="2" class="">usia muda</span>
                        <hr>
                        <div id="tab2" class="carousel slide">
                            <div role="listbox" class="carousel-inner">                    
                                <div class="box item active">
                                    <x>
                                        <a href="<?=base_url()?>eyenews">Berita Lainnya</a>
                                        <i class="material-icons r-tab2">keyboard_arrow_right</i>                                
                                    </x>
									<?php
									$populer=$this->db->query("select * from tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' order by news_view desc limit 3");
									foreach($populer->result_array() as $data){
									print'
                                    <div class="rek-ber">
                                        <div class="rek-ber-c">									
                                            <!--<img src="systems/eyenews_storage/'.$data['thumb1'].'" alt="" style="width:130px;height:90px;">-->
											<img src="assets/img/news-small.png" alt="">
                                            <span>'.date("d M Y",strtotime($data["publish_on"])).'</span>
                                            <h1>'.$data['title'].' </h1>
                                            <p>'.substr($data["description"],0,110).'... 
											<a href="'.base_url().'eyenews/detail/'.$data["eyenews_id"].'">selengkapnya</a>	
											</p>																				
                                        </div>
                                    </div>'; 
										}
										?>
                                </div>
                                <div class="box item">
                                    <x>
                                        <a href="<?=base_url()?>eyenews">Berita Lainnya</a>
                                        <i class="material-icons r-tab2">keyboard_arrow_right</i>                                
                                    </x>
									<?php
									$rekomendasi=$this->db->query("select * from tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' order by eyenews_id desc LIMIT 3");
									foreach($rekomendasi->result_array() as $data){
									print '									
                                    <div class="rek-ber">
                                        <div class="rek-ber-c">
                                            <!--<img src="systems/eyenews_storage/'.$data['thumb1'].'" alt="" style="width:130px;height:90px;">-->
											<img src="assets/img/news-small.png" alt="">
                                            <span>'.date("d M Y",strtotime($data["publish_on"])).'</span>
                                            <h1>'.$data['title'].' </h1>
                                            <p>'.substr($data["description"],0,130).'... 
											<a href="'.base_url().'eyenews/detail/'.$data["eyenews_id"].'">selengkapnya</a>	
											</p>
                                        </div>                                        
                                    </div>
										'; 
										}
										?>
                                </div>
                                <div class="box item">
                                    <x>
                                        <a href="<?=base_url()?>eyenews">Berita Lainnya</a>
                                        <i class="material-icons r-tab2">keyboard_arrow_right</i>                                
                                    </x>
									<?php
									$muda=$this->db->query("select * from tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' AND news_type in ('usia muda') order by news_view desc limit 3");
									foreach($muda->result_array() as $data){		
									print '									
                                    <div class="rek-ber">
                                        <div class="rek-ber-c">
                                            <!--<img src="systems/eyenews_storage/'.$data['thumb1'].'" alt="" style="width:130px;height:90px;">-->
											<img src="assets/img/news-small.png" alt="">
                                            <span>'.date("d M Y",strtotime($data["publish_on"])).'</span>
                                            <h1>'.$data['title'].' </h1>
                                            <p>'.substr($data["description"],0,130).'... 
											<a href="'.base_url().'eyenews/detail/'.$data["eyenews_id"].'">selengkapnya</a>	
											</p>
                                        </div>
                                    </div>
										'; 
										}
										?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="et-content2">
                    <img class="img-title" src="assets/img/ic_eyemarket.png" alt="">
                    <h2 class="title emar">EyeMarket</h2>
                    <hr class="x-emar">
                        <div class="rek-ber m-t-14">
						<?php
						$market=$this->db->query("select * from tbl_product where id_product order by id_product desc LIMIT 3")->result_array();
						foreach($market as $row1){		
						?>						
                            <div class="rek-ber-c">
								<img src="systems/eyemarket_storage/<?=$row1["pic"]?>" alt="" style="width:110px; height:90px;">
                                <h1><?php echo $row1['product_name'];  ?> </h1>
                                <span class="price">HARGA</span>
                                <p class="prices">Rp.<?php echo number_format($row1['price'],2,",","."); ?></p>
                                <a href="<?=base_url()?>eyemarket/detail/<?php print $row1['id_product']; ?>"><button type="text" class="beli">Beli</a></button>
                            </div>
							<?php
							}
							?>							
                        </div>
                </div>
            </div>
        </div>
        <!-- BANNER -->
        <div class="center-dekstop pd-l-100">
            <div class="banner-150">
                <img src="" alt="">
            </div>
        </div>

<!-- EYEVENT -->
        <div class="center-dekstop pd-l-100">
            <img class="img-title" src="assets/img/ic_eyevent.png" alt="">
            <h2 class="title ee">EyeVent</h2>
            <hr class="x-ee">
            <span>
                <a href="<?=base_url()?>eventlainnya" class="el">Event Lainnya</a>
                <i class="material-icons r-el">keyboard_arrow_right</i>                                
            </span>
            <div class="container">
                <div id="evSlide" class="carousel slide t-30">
                    <div role="listbox" class="carousel-inner">  
					<?php
					$vent=$this->db->query("select * from tbl_event order by id_event desc LIMIT 14");
					$vent2=$vent->result_array();
					?>					
                        <div class="box item active">
						<?php
						$data=$vent2[0];
						?>						
                            <div class="ev-box-content">
                                <!--<img src="assets/img/video-small.png" alt="">-->
								<img height="200px;" src="<?=base_url()?>systems/eyevent_storage/<?php print $data['pic']; ?>">								
                            </div>
						<?php
						$data=$vent2[1];
						?>							
                            <div class="ev-box-content">
                                <img height="200px;" src="<?=base_url()?>systems/eyevent_storage/<?php print $data['pic']; ?>">
                            </div>
						<?php
						$data=$vent2[2];
						?>							
                            <div class="ev-box-content">
                                <img height="200px;" src="<?=base_url()?>systems/eyevent_storage/<?php print $data['pic']; ?>">
                            </div>
                        </div>
                        <div class="box item">
						<?php
						$data=$vent2[3];
						?>						
                            <div class="ev-box-content">
                                <!--<img src="assets/img/video-small.png" alt="">-->
								<img height="200px;" src="<?=base_url()?>systems/eyevent_storage/<?php print $data['pic']; ?>">								
                            </div>
						<?php
						$data=$vent2[4];
						?>							
                            <div class="ev-box-content">
                                <img height="200px;" src="<?=base_url()?>systems/eyevent_storage/<?php print $data['pic']; ?>">
                            </div>
						<?php
						$data=$vent2[5];
						?>							
                            <div class="ev-box-content">
                                <img height="200px;" src="<?=base_url()?>systems/eyevent_storage/<?php print $data['pic']; ?>">
                            </div>
                        </div>
                        <div class="box item">
						<?php
						$data=$vent2[6];
						?>						
                            <div class="ev-box-content">
                                <!--<img src="assets/img/video-small.png" alt="">-->
								<img height="200px;" src="<?=base_url()?>systems/eyevent_storage/<?php print $data['pic']; ?>">								
                            </div>
						<?php
						$data=$vent2[7];
						?>							
                            <div class="ev-box-content">
                                <img height="200px;" src="<?=base_url()?>systems/eyevent_storage/<?php print $data['pic']; ?>">
                            </div>
						<?php
						$data=$vent2[8];
						?>							
                            <div class="ev-box-content">
                                <img height="200px;" src="<?=base_url()?>systems/eyevent_storage/<?php print $data['pic']; ?>">
                            </div>
                        </div>
                        <div class="box item">
						<?php
						$data=$vent2[9];
						?>						
                            <div class="ev-box-content">
                                <!--<img src="assets/img/video-small.png" alt="">-->
								<img height="200px;" src="<?=base_url()?>systems/eyevent_storage/<?php print $data['pic']; ?>">								
                            </div>
						<?php
						$data=$vent2[10];
						?>							
                            <div class="ev-box-content">
                                <img height="200px;" src="<?=base_url()?>systems/eyevent_storage/<?php print $data['pic']; ?>">
                            </div>
						<?php
						$data=$vent2[11];
						?>							
                            <div class="ev-box-content">
                                <img height="200px;" src="<?=base_url()?>systems/eyevent_storage/<?php print $data['pic']; ?>">
                            </div>
                        </div>
                    </div>  
        
                    <div class="carousel-indicators bx-dot ev-dot">
                        <span data-target="#evSlide" data-slide-to="0" class="dot active"></span>
                        <span data-target="#evSlide" data-slide-to="1" class="dot"></span>
                        <span data-target="#evSlide" data-slide-to="2" class="dot"></span> 
                        <span data-target="#evSlide" data-slide-to="3" class="dot"></span> 
                    </div>  
                </div>
            </div>
        </div>

 <!-- JADWAL PERTANDINGAN & KLASEMEN -->
        <div class="center-dekstop pd-l-100 pd-b-100">
            <div class="container t-40">
                <div class="et-content1">
                    <div class="border-box">
                        <div class="container bg-g">						
                            <div class="t-tab">	
								<span class="jp green">JADWAL PERTANDINGAN</span>								
                            </div>
                        </div>
                        <table class="table border-b">
						<?php
						//$i=0;
						$jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title !='' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC LIMIT 5");
		
						$jdpertandingan="";
						foreach($jadwal->result_array() as $data){
						//print '
						/**<div class="day-choose">
                            <a href="">
								<span> '.$jdnow=date("d M Y",strtotime($data["jadwal_pertandingan"])).'</span>
                            </a>
                        </div>';**/
						 
						//if($jdpertandingan==$jdnow){
						  
						//}
						//else{
						  //echo '<small><b>'.$jdnow.'</b></small>';
						//}
						echo '
								<tbody>
									<tr>
										<td class="tx-r">'.$data["club_a"].'
											<span class="i-l"><img src="'.base_url().'/systems/club_logo/'.$data["logo_a"].'" alt=""></span>
										</td>
										<td class="tx-c">'.date("H:i",strtotime($data["jadwal_pertandingan"])).'</td>
										<td class="tx-l"><span class="i-r">
											<img src="'.base_url().'/systems/club_logo/'.$data["logo_b"].'" alt="">
											</span>'.$data["club_b"].'</td>
									</tr></div>
								</tbody>';
						//$jdpertandingan=$jdnow;
						}?>	
                        </table>
                        <div class="t-c-b">
                            <button type="" class="btn-green">Lihat Jadwal Lainnya</button>
                        </div>
                    </div>
                </div>

<div class="et-content2">
                    <span class="jp">KLASEMEN</span>
                    <select id="" name="" selected="true" class="slct-lg">
                        <option value="">Liga 1 Indonesia</option>
                        <option value="">Liga 2 Indonesia</option>
                        <option value="">Liga 3 Indonesia</option>
                        <option value="">Liga 4 Indonesia</option>
                    </select>
                    <div class="border-box">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Klub</th>
                                    <th>Main</th>
                                    <th>M</th>
                                    <th>S</th>
                                    <th>K</th>
                                    <th>Poin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><img src="" alt="" width="15px"> PSM Makasar</td>
                                    <td>10</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td><img src="" alt="" width="15px"> PSM Makasar</td>
                                    <td>10</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td><img src="" alt="" width="15px"> PSM Makasar</td>
                                    <td>10</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td><img src="" alt="" width="15px"> PSM Makasar</td>
                                    <td>10</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td><img src="" alt="" width="15px"> PSM Makasar</td>
                                    <td>10</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td><img src="" alt="" width="15px"> PSM Makasar</td>
                                    <td>10</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td><img src="" alt="" width="15px"> PSM Makasar</td>
                                    <td>10</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td><img src="" alt="" width="15px"> PSM Makasar</td>
                                    <td>10</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td><img src="" alt="" width="15px"> PSM Makasar</td>
                                    <td>10</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td><img src="" alt="" width="15px"> PSM Makasar</td>
                                    <td>10</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>10</td>
                                </tr>
                            </tbody>
                        </table>
                        <span>
                            <a href="" class="ttl">Lihat Selengkapnya</a>
                            <i class="material-icons r-ttl">keyboard_arrow_right</i>                                
                        </span>                      
                    </div>
                </div>
				
			</div>
		</div>
		
		
</div>

<?php
}
?>