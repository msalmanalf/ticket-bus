<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $title ?></title>
    <link rel="icon" type="image/png" href="http://localhost/ticket-bus/assets/frontend/img/t-bus.png">
    <!-- css -->
    <?php $this->load->view('adm/include/base_css'); ?>
  </head>
  <body id="page-top">
    <!-- navbar -->
    <?php $this->load->view('adm/include/base_nav'); ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <h1 class="h3 mb-2 text-gray-800">List Data Order Tiket</h1>
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Order</th>
                  <th>Kode Jadwal</th>
                  <th>Tanggal Berangkat</th>
                  <th>Nama Pemesan</th>
                  <th>Tanggal Beli</th>
                  <th>Jumlah Tiket</th>
                  <th>Status</th>
                  <th>Konfirmasi Order</th>
                  <th>Hapus</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1;foreach ($order as $row) { ?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row['kd_order']; ?></td>
                    <td><?= $row['kd_jadwal']; ?></td>
                    <td><?= hari_indo(date('N',strtotime($row['tgl_berangkat_order']))).', '.tanggal_indo(date('Y-m-d',strtotime(''.$row['tgl_berangkat_order'].'')));?></td>
                    <td><?= $row['nama_order']; ?></td>
                    <td><?= $row['tgl_beli_order']; ?></td>
                    <?php $sqlcek = $this->db->query("SELECT * FROM tbl_order WHERE kd_order LIKE '".$row['kd_order']."'")->result_array(); ?>
                    <td><?= count($sqlcek); ?></td>
                    <?php if ($row['status_order'] == '1') { ?>
                          <td class="btn-danger"> Belum Bayar</td> 
                          <?php } elseif($row['status_order'] == '2') { ?>
                          <td class="btn-success"> Sudah Bayar</td>
                        <?php } ?>
                    <td><a href="<?= base_url('adm/order/vieworder/'.$row['kd_order']) ?>" class="btn btn btn-primary">Detail</a></td>
                    <td><a href="<?= base_url() ?>adm/order/hapus/<?= $row['kd_order'] ?>" class="btn btn-danger">Hapus</a></td>
                    <!--<td><a onclick="hapusdata(<?php echo $row['kd_order'] ?>)" data-toggle="tooltip" data-placement="bottom" title="hapus" class="btn btn-danger">Hapus</a></td>-->
                  </tr>
                <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Footer -->
<?php $this->load->view('adm/include/base_footer'); ?>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<script>
  function hapusdata($kd_order)
  {
    swal({
      title: "Are you sure ?",
      text: "You will not be able to recover this file !",
      type: "warning",
      showCancelButton: true,
      // confirmButtonColor: #DD6B55
      confirmButtonText: "Yes, Delete it !",
      closeOnConfirm: false
    },
    function(){
        $.ajax({
                url: "<?php echo base_url('adm/order/hapus/') ?>",
                type: "post",
                data: {kd_order:kd_order},
                success:function(){
                  swal('Data Berhasil Dihapus !', 'success');
                },
                error:function(){
                  swal('Data Gagal Dihapus !', 'error');
                }

                });
              });
  }
</script>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>
<adm/order/hapus/!-- js -->
<?php $this->load->view('adm/include/base_js'); ?>
</body>
</html>