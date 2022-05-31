<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiket extends CI_Controller {
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
	$data['title'] = "Daftar Tiket";
	$data['tiket'] = $this->db->query("SELECT * FROM tbl_tiket ")->result_array();
	$this->load->view('adm/tiket', $data);	
	}
	public function viewtiket($tiket){
		$data['title'] = "View Daftar Tiket";
		$data['tiket'] = $this->db->query("SELECT * FROM tbl_tiket WHERE kd_tiket = '".$tiket."'")->row_array();
		if ($data['tiket']) {
			$this->load->view('adm/view_tiket', $data);
		}else{
			$this->session->set_flashdata('message', 'swal("Kosong", "Tiket Tidak Ada", "error");');
    		redirect('adm/tiket');
		}	
	}
	public function hapusDatatiket($kd_tiket){
	$this->getkod_model->hapusDatatiket($kd_tiket);
	redirect('adm/tiket');
	}
	

}

/* End of file Tiket.php */
/* Location: ./application/controllers/adm/Tiket.php */