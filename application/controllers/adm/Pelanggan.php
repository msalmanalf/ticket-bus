<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->getsecurity();
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('level');
		if ($username == '2') {
			$this->session->sess_destroy();
			redirect('adm/home');
		}
	}
	public function index(){
		$data['title'] = "Data Pelanggan - Tourismo Bus";
		$data['pelanggan'] = $this->db->query("SELECT * FROM tbl_pelanggan")->result_array();
		$this->load->view('adm/pelanggan', $data);
	}

    public function ubahstatus($id=''){
		$data= array(
			'status_pelanggan'		 => $this->input->post('status')
			 );
		$this->db->update('tbl_pelanggan', $data);
		$this->session->set_flashdata('message', 'swal("Berhasil", "Status Terverifikasi", "success");');
		redirect('adm/pelanggan');
    }
}

/* End of file Pelanggan.php */
/* Location: ./application/controllers/adm/Pelanggan.php */