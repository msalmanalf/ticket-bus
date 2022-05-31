<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->getsecurity();
		$this->load->library('form_validation');
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('username_admin');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('adm/login');
		}
	}
	public function index(){
		$data['title'] = "Data Jadwal - Tourismo Bus";
		$data['jadwal'] = $this->db->query("SELECT * FROM tbl_jadwal LEFT JOIN tbl_bus on tbl_jadwal.kd_bus = tbl_bus.kd_bus LEFT JOIN tbl_tujuan on tbl_jadwal.kd_asal = tbl_tujuan.kd_tujuan ")->result_array();
		$this->load->view('adm/jadwal', $data);
	}
	public function viewtambahjadwal($value=''){
		$data['title'] = "Tambah Jadwal";
		$data['bus'] = $this->db->query("SELECT * FROM tbl_bus ORDER BY nama_bus asc")->result_array();
		$data['tujuan'] = $this->db->query("SELECT * FROM tbl_tujuan ORDER BY kota_tujuan asc")->result_array();
		$this->load->view('adm/tambahjadwal', $data);
	}
	public function tambahjadwal(){
		$this->form_validation->set_rules('tujuan', 'Tujuan', 'trim|required|min_length[5]|max_length[12]');
		if ($this->form_validation->run() ==  FALSE) {
			$data['title'] = "Tambah Jadwal";
			$data['bus'] = $this->db->query("SELECT * FROM tbl_bus ORDER BY kd_bus asc")->result_array();
			$data['tujuan'] = $this->db->query("SELECT * FROM tbl_tujuan ORDER BY kd_tujuan asc")->result_array();
			$this->load->view('adm/tambahjadwal', $data);
		} else {
			$asal = $this->input->post('asal');
			$tujuan = $this->db->query("SELECT * FROM tbl_tujuan
               WHERE kd_tujuan ='".$this->input->post('tujuan')."'")->row_array();
			if ($asal == $tujuan['kd_tujuan']) {
				$this->session->set_flashdata('message', 'swal("Berhasil", "Tujuan Jadwal Tidak Boleh Sama", "error");');
			redirect('adm/jadwal');
			}else{
			$kode = $this->getkod_model->get_kodjad();
			$simpan = array(
					'kd_jadwal' => $kode,
					'kd_asal' => $asal,
					'kd_tujuan' => $tujuan['kd_tujuan'],
					'kd_bus' => $this->input->post('bus'),
					'wilayah_jadwal' => $tujuan['kota_tujuan'],
					'jam_berangkat_jadwal' => $this->input->post('berangkat'),
					'jam_tiba_jadwal' => $this->input->post('tiba'),
					'harga_jadwal' =>  $this->input->post('harga'),
					 );
			$this->db->insert('tbl_jadwal', $simpan);
			$this->session->set_flashdata('message', 'swal("Berhasil", "Data Jadwal Tersimpan", "success");');
			redirect('adm/jadwal');
			}
			
		}
		
	}
	public function hapus($kd_jadwal){
		$this->getkod_model->hapusDatajadwal($kd_jadwal);
		redirect('adm/jadwal');
	}
	public function viewjadwal($id=''){
		$data['title'] = "Data Tujuan";
	 	$sqlcek = $this->db->query("SELECT * FROM tbl_jadwal LEFT JOIN tbl_bus on tbl_jadwal.kd_bus = tbl_bus.kd_bus LEFT JOIN tbl_tujuan on tbl_jadwal.kd_tujuan = tbl_tujuan.kd_tujuan WHERE kd_jadwal ='".$id."'")->row_array();
	 	if ($sqlcek) {
	 		$data['asal'] = $this->db->query("SELECT * FROM tbl_tujuan WHERE kd_tujuan = '".$sqlcek['kd_asal']."'")->row_array();
	 		$data['jadwal'] = $sqlcek;
			$data['title'] = "View jadwal";
			$this->load->view('adm/view_jadwal',$data);
	 	}else{
	 		$this->session->set_flashdata('message', 'swal("Gagal", "Data Jadwal Tersimpan", "error");');
			redirect('adm/jadwal');
	 	}
	}
	public function editJadwal()
    {
        $kd_jadwal = $this->input->post('kd_jadwal');
        $result = $this->getkod_model->getJadwalkd($kd_jadwal);

        if ($result) {
            // jika data ada

            $data['title'] = 'Edit Jadwal';
            $data['admin'] = $this->db->get_where('tbl_admin', ['email_admin' => $this->session->userdata('email_admin')])->row_array();
            $data['jadwal'] = $result;

            $this->form_validation->set_rules('kota_tujuan', 'Kota Tujuan', 'required|trim');
            $this->form_validation->set_rules('wilayah_jadwal', 'Kota Asal', 'required|trim');
            $this->form_validation->set_rules('harga_jadwal', 'Harga Jadwal', 'required|trim|numeric');

            if ($this->form_validation->run() == false) {

                $this->load->view('adm/include/base_nav', $data);
                $this->load->view('adm/include/base_css', $data);
                $this->load->view('adm/include/base_footer', $data);
                $this->load->view('adm/include/base_js', $data);
               
            } else {
                // Edit Jadwal
                $this->getkod_model->editJadwal($kd_jadwal);
            }
        } else {
            // jika data tidak ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Jadwal gagal diupdate!, data tidak ditemukan</div>
            ');
            redirect('adm/jadwal');
        }
    }
}

/* End of file Jadwal.php */
/* Location: ./application/controllers/adm/Jadwal.php */