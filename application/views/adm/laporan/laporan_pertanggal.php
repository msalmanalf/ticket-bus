<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>Laporan Data Transaksi Tiket Pertanggal</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?= base_url('assets/css/laporan.css')?>"/>
    <link rel="icon" type="image/png" href="http://localhost/ticket-bus/assets/frontend/img/t-bus.png">
</head>
<body bgcolor="lightblue" onload="window.print()" >
<div id="laporan">
<table align="center" style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
</table>

<table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
<tr>
    <td><img src="http://localhost/ticket-bus/assets/frontend/img/t-buss.png"></td>
    <td colspan="2" style="width:800px;paddin-left:20px;"><center><h4>Laporan Tiket Terjual</h4></center><br/></td>
    <td><img style="width: 120" src="http://localhost/ticket-bus/assets/adm/img/transactions.png"></td>
</tr>
                       
</table>
 
<table border="0" align="center" style="width:900px;border:none;">
        <tr>
            <th style="text-align:left"></th>
        </tr>
</table>
<table border="1" align="center" style="width:900px;margin-bottom:20px;">
<thead>
<tr>
<th colspan="11" style="text-align:center;">Laporan Transaksi Dari Tanggal <?= $mulai ?> Sampai <?= $sampai ?> </th>
</tr>
    <tr>
        <th style="text-align:left;">No Tiket</th>
        <th style="text-align:left;">No Order</th>
        <th style="text-align:left;">Nama Pelanggan </th>
        <th style="text-align:left;">Umur</th>
        <th style="text-align:left;">Kursi</th>
        <th style="text-align:left;">Tanggal Pesan</th>
        <th style="text-align:left;">Harga Tiket</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($laporan as $row) { ?>
    <tr>
        <td style="padding-left:5px;"><?= $row['kd_tiket'];?></td>
        <td style="padding-left:5px;"><?= $row['kd_order'];?></td>
        <td style="padding-left:5px;"><?= $row['nama_tiket'];?></td>
        <td style="padding-left:5px;"><?= $row['umur_tiket'];?></td>
        <td style="padding-left:5px;"><?= $row['kursi_tiket'];?></td>
        <td style="padding-left:5px;"><?= $row['create_tgl_tiket'];?></td>
        <td style="padding-left:5px;"><?= 'Rp. '.number_format($row['harga_tiket']);?></td>
    </tr>
    <?php } ?>
</tbody>
<tfoot>

    <tr>
        <td colspan="6" style="text-align:center;"><b>Total Pemasukan</b></td>
        <td style="text-align:left;"><b><?= 'Rp. '.number_format($total);?></b></td>
    </tr>
</tfoot>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td></td>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td align="right">Bekasi, <?= date('d-M-Y')?></td>
    </tr>
    <tr>
        <td align="right"></td>
    </tr>
   
    <tr>
    <td><br/><br/><br/><br/></td>
    </tr>    
    <tr>
        <td align="right">( <?= $this->session->userdata('username_admin');?> )</td>
    </tr>
    <tr>
        <td align="center"></td>
    </tr>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <th><br/><br/></th>
    </tr>
    <tr>
        <th align="left"></th>
    </tr>
</table>
</div>
</body>
</html>