<header id="header" id="home">
		    <div class="container">
		    	<div class="row align-items-center justify-content-between d-flex">
		    	  <div class="row align-items-center ">
		    	  	<div id="logo">
				  	<img center src="<?php echo base_url() ?>assets/frontend/img/t-buss.png">
				  	</div>
			      	<div id="logo">
			        	<a href="<?php echo base_url() ?>"><h2><b>Tourismo Bus</b></h2></a>
			      	</div>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
			          <li class="menu-active"><a href="<?php echo base_url() ?>">Beranda</a></li>
			          <li><a href="<?php echo base_url() ?>tiket">Info Terminal & Lihat Jadwal</a></li>
			          <li class="menu"><a href="<?php echo base_url() ?>tiket/cektiket">Cek Tiket</a></li>
			          <?php if ($this->session->userdata('username')) { ?>
				      	<li class="menu-has-children"><a href="">Hai, <?php echo $this->session->userdata('nama_lengkap'); ?></a>
						<ul>
							<li class="menu wobble animated"><a href="<?php echo base_url() ?>profile/profilesaya/<?php echo $this->session->userdata('kd_pelanggan') ?>"><i class="fa fa-id-card"></i> Profile Saya</a></li>
							<li class="menu wobble animated"><a href="<?php echo base_url() ?>profile/tiketsaya/<?php echo $this->session->userdata('kd_pelanggan') ?>"><i class="fa fa-ticket"></i> Tiket Saya</a></li>
							<li class="menu wobble animated"><a href="<?php echo base_url() ?>login/logout"><i class="fa fa-sign-out"></i> Keluar</a></li>
						</ul>
						</li>
				      <?php }else{ ?>  
				  	  <li class="menu wobble animated"><a href="<?php echo base_url() ?>login/Daftar">Daftar</a></li>
 					  <li class="menu wobble animated"><a href="<?php echo base_url() ?>login">Login</a></li>
				  	  <?php } ?>
			        </ul>
			      </nav><!-- #nav-menu-container -->		    		
		    	</div>
		    </div>
		  </header><!-- #header -->	