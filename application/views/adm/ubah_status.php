<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <?php if (validation_errors()) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Nama Kategori tidak boleh Kosong</div>');
                redirect('pelanggan/ubahStatus/' . $k['status_pelanggan']);
            } ?>
            <?php foreach ($pelanggan as $k) { ?>
                <form action="<?= base_url('pelanggan/ubahStatus'); ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" value="<?php echo $k['status_pelanggan']; ?>">
                        <input type="text" class="form-control form-control-user" id="pelanggan" name="pelanggan" placeholder="Ganti Status Pelanggan" value="<?= $k['pelanggan']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="button" class="form-control form-control-user btn btn-dark col-lg-3 mt-3" value="Kembali" onclick="window.history.go(-1)">
                        <input type="submit" class="form-control form-control-user btn btn-primary col-lg-3 mt-3" value="Update">
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>