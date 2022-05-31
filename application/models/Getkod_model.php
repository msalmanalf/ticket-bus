<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Getkod_model extends CI_Model {

    function get_kodjad(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_jadwal,3)) AS kd_max FROM tbl_jadwal");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "JD".$kd;
    }
    function get_kodtuj(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_tujuan,3)) AS kd_max FROM tbl_tujuan");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "01";
        }
        return "TJ".$kd;
    }
    function get_kodbus(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_bus,3)) AS kd_max FROM tbl_bus");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "01";
        }
        return "B".$kd;
    }
    function get_kodtmporder(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_order,3)) AS kd_max FROM tbl_order");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "01";
        }
        return "ORD".$kd;
    }
    public function hapusData($kd_order){
        $this->db->delete('tbl_order',['kd_order' => $kd_order]);
    }
    public function hapusDatatujuan($kd_tujuan){
        $this->db->delete('tbl_tujuan',['kd_tujuan' => $kd_tujuan]);
    }
    public function hapusDatatiket($kd_tiket){
        $this->db->delete('tbl_tiket',['kd_tiket' => $kd_tiket]);
    }
    //Jadwal
    public function hapusDatajadwal($kd_jadwal){
        $this->db->delete('tbl_jadwal',['kd_jadwal' => $kd_jadwal]);
    }
    public function getJadwalkd($kd_jadwal)
    {
        return $this->db->get_where('tbl_jadwal', ['kd_jadwal' => $kd_jadwal])->row_array();
    }
    public function editJadwal($kd_jadwal)
    {
        $data = [
            'kd_jadwal'          => $this->input->post('kd_jadwal', true),
            'nama_bus'           => $this->input->post('nama_bus', true),
            'kota_tujuan'           => $this->input->post('kota_tujuan', true),
            'wilayah_jadwal'    => $this->input->post('wilayah_jadwal', true),
            'jam_berangkat_jadwal' => $this->input->post('jam_tiba_jadwal', true),
            'harga_jadwal'      => $this->input->post('harga', true)
        ];

        $this->db->set($data);
        $this->db->where('kd_jadwal', $kd_jadwal);
        $this->db->update('tbl_jadwal', $data);

        $this->session->set_flashdata('message', 'swal("Berhasil", "Data Jadwal Tersimpan", "success");');
        redirect('adm/jadwal');
    }
    //Bus
    public function hapusDatabus($kd_bus){
        $this->db->delete('tbl_bus',['kd_bus' => $kd_bus]);
    }
    function get_kodpel(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_pelanggan,3)) AS kd_max FROM tbl_pelanggan");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "PL".$kd;
    }
    function get_kodkon(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_konfirmasi,3)) AS kd_max FROM tbl_konfirmasi");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "KF".$kd;
    } 

    function get_kodadm(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_admin,3)) AS kd_max FROM tbl_admin");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "ADM".$kd;
    }

    function get_kodbank(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_bank,3)) AS kd_max FROM tbl_bank");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "BK".$kd;
    }
}

/* End of file getkod_model.php */
/* Location: ./application/models/getkod_model.php */