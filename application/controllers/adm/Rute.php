<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rute extends CI_Controller {
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
		$data['title'] = "Data Tujuan - Tourismo Bus";
		$data['tujuan'] = $this->db->query("SELECT * FROM tbl_tujuan")->result_array();
		$this->load->view('adm/tujuan', $data);
	}
	public function viewrute($id=''){
		$data['title'] = "View Tujuan";
		$data['rute'] = $this->db->query("SELECT * FROM tbl_tujuan WHERE kd_tujuan = '".$id."' ")->row_array();
		$this->load->view('adm/view_tujuan', $data);
	}
	public function tambahtujuan(){
		$kode = $this->getkod_model->get_kodtuj();
		$data = array(
			'kota_tujuan' => $this->input->post('tujuan'),
			'kd_tujuan' => $kode,
			'nama_terminal_tujuan' => $this->input->post('namaterminal'),
			'terminal_tujuan' => $this->input->post('terminal'),
			 );
		$this->db->insert('tbl_tujuan', $data);
		$this->session->set_flashdata('message', 'swal("Data Berhasil Di Tambah");');
		redirect('adm/rute');
	}
	public function hapus($kd_tujuan){
		$this->getkod_model->hapusDatatujuan($kd_tujuan);
		redirect('adm/rute');
	}
	public function ubahtujuan($id=''){
		$where = array('kd_tujuan' => $id );
		$update = array(
			'kota_tujuan'			=> $this->input->post('tujuan'),
			'terminal_tujuan'  => $this->input->post('terminal'),
			 );

		$this->db->update('tbl_tujuan', $update,$where);
		$this->session->set_flashdata('message', 'swal("Berhasil", "Data Di Edit", "success");');
		redirect('adm/rute');
	}
}

/* End of file Rute.php */
/* Location: ./application/controllers/adm/Rute.php */