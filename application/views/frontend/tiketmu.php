<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/elements/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Tourismo Bus</title>
		<link rel="icon" type="image/png" href="http://localhost/ticket-bus/assets/frontend/img/t-bus.png">
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<!--CSS-->
		<?php $this->load->view('frontend/include/base_css'); ?>
	</head>
	<body>
		<!-- navbar -->
		<?php $this->load->view('frontend/include/base_nav'); ?>
		<div class="generic-banner">
			<br>
			<br>
			<h1 class="text-white" align="center">Tiket Saya</h1>
			<div class="container" align="center">
				<div class="row d-flex justify-content-center">
					<?php foreach ($tiket as $row) { ?>
					<div class="col-sm-3">
						&nbsp;
						<div class="card " style="width: 18rem;">
							<h5 class="card-title">Kode Tiket : <?php echo $row['kd_tiket']; ?></h5>
							<img class="card-img-top" src="<?php echo base_url($row['qrcode_order']) ?>" alt="Card image cap" >
							<div class="card-body" align="left">
								<h5 class="card-title">Kursi Nomor : <?php echo $row['no_kursi_order']; ?></h5>
								<a href="<?php echo base_url().$row['qrcode_order'] ?>" class="card-link" download>Download QrCode</a>
								<h5 class="card-title">Kode Order : <?php echo $row['kd_order']; ?></h5>
								<p>Nama Penumpang : <?php echo $row['nama_kursi_order']; ?>
								 <br>Tanggal Pesan : <?php echo $row['tgl_beli_order']; ?></br>
								 	Tanggal Keberangkatan : <?php echo $row['tgl_berangkat_order']; ?>
								 	<br>Kota Asal : <?php echo $row['asal_order']; ?></br>
									Status Pembayaran : <?php if ($row['status_order'] == '1') { ?>
									<i class='btn-danger'>Belum bayar</i>
									<?php }else{ ?><i class='btn-success'>Lunas bayar</i>
									<?php } ?>
									<hr>
									<?php if ($row['status_order'] == '1') { ?>
									<a href="<?php echo base_url('tiket/payment/'.$row['kd_order']) ?>" class="btn btn-primary">Cek Pembayaran</a>
									<?php }else{ ?>
									<a href="<?php echo base_url('assets/adm/upload/etiket/'.$row['kd_order'].'.pdf') ?>" class="btn btn-success pull-right" download>Cetak Tiket</a>
									<?php } ?>
								</div>
							</div>
						</div>
						&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						<?php } ?>
					</div>
				</div>
				<br><br>
				</div>		<!-- End banner Area -->
				<!-- End Generic Start -->
				<!-- start footer Area -->
				<?php $this->load->view('frontend/include/base_footer'); ?>
				<!-- js -->
				<?php $this->load->view('frontend/include/base_js'); ?>
			</body>
		</html>