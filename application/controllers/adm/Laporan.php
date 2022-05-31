<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->getsecurity();
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
		$data['title'] = 'Laporan Transaksi - Tourismo Bus';
		$data['bulan'] = $this->db->query("SELECT DISTINCT DATE_FORMAT(create_tgl_tiket,'%M %Y') AS bulan FROM tbl_tiket")->result_array();
		$this->load->view('adm/laporan', $data);
	}
	public function laportanggal($value=''){
		$data['mulai'] = $this->input->post('mulai');
		$data['sampai'] = $this->input->post('sampai');
		$data['laporan'] = $this->db->query("SELECT * FROM tbl_tiket WHERE (create_tgl_tiket BETWEEN '".$data['mulai']."' AND '".$data['sampai']."')")->result_array();
		for ($i=0; $i < count($data['laporan']) ; $i++) { 
			$total[$i] = $data['laporan'][$i]['harga_tiket'];
		}
		$data['total'] = array_sum($total);
		$this->load->view('adm/laporan/laporan_pertanggal', $data);		
	}
}

/* End of file Laporan.php */
/* Location: ./application/controllers/adm/Laporan.php */