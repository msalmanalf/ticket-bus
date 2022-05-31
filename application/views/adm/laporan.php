<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/png" href="http://localhost/ticket-bus/assets/frontend/img/t-bus.png">
        <title><?= $title ?></title>
        <!-- css -->
        <?php $this->load->view('adm/include/base_css'); ?>
    </head>
    <body id="page-top">
        <!-- navbar -->
        <?php $this->load->view('adm/include/base_nav'); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Laporan Transaksi Tiket</h1>
            <table class="table table-bordered table-condensed" style="font-size:12px;" id="mydata">
                <thead>
                    <tr>
                        <th><h3>Laporan</h3></th>
                        <th style="width:100px;text-align:center;"><h3>Aksi</h3></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="vertical-align:middle;">Laporan Data Tiket Pertanggal</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-default" href="#lap_jual_pertanggal" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.row -->
    <!--  MODAL -->
    <div class="modal fade" id="lap_jual_pertanggal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Pilih Tanggal</h3>
                </div>
                <form class="form-horizontal" method="post" action="<?= base_url('adm/laporan/laportanggal') ?>" target="_blank">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-xs-3" > Dari Tanggal</label>
                            <div class="col-xs-9">
                                <div class='input-group date' id='datepicker' style="width:300px;">
                                    <input type='text' name="mulai" class="form-control datepicker" value="" placeholder="Tanggal..." required/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" > Sampai Tanggal</label>
                            <div class="col-xs-9">
                                <div class='input-group date' id='datepicker' style="width:300px;">
                                    <input type='text' name="sampai" class="form-control datepicker" value="" placeholder="Tanggal..." required/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                    </div>
                </form>
            </div>
        </div>
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
<script type="text/javascript">
             $(function(){
                var date = new Date();
                date.setDate(date.getDate());

              $(".datepicker").datepicker({
                  format: 'yyyy-mm-dd',
                  autoclose: true,
              });
             });
            </script>
</body>
</html>
