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
      <h1 class="h3 mb-2 text-gray-800">Data Admin</h1>
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
           <a href="<?= base_url('adm/admin/daftar') ?>" class="btn btn-primary pull-right" >
          Tambah Akun Akses
          </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Admin</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Level</th>
                  <th>Image</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1;foreach ($admin as $row) { ?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row['kd_admin']; ?></td>
                    <td><?= $row['nama_admin']; ?></td>
                    <td><?= $row['username_admin']; ?></td>
                    <td><?= $row['email_admin']; ?></td>
                    <td><?php if ($row['level_admin'] == '1') { ?>
                      OWNER
                    <?php }else{ ?>
                      ADMIN
                    <?php } ?>
                    </td>
                    <td>
                      <picture>
                          <source srcset="" type="image/svg+xml">
                          <img src="<?= base_url($this->session->userdata('img_admin')) ?>" class="img-fluid img-thumbnail" alt="..." style="width:60px;height:80px;">
                      </picture>
                    </td>
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
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>
<!-- js -->
<?php $this->load->view('adm/include/base_js'); ?>
</body>
</html>