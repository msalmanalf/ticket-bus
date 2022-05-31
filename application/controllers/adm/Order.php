<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->getsecurity();
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
		if (empty($this->session->userdata('username_admin'))) {
			$this->session->sess_destroy();
			redirect('adm/login');
		}
	}
	public function index(){
		$data['title'] = "Data Order Tiket - Tourismo Bus";
 		$data['order'] = $this->db->query("SELECT * FROM tbl_order group by kd_order")->result_array();
		$this->load->view('adm/order', $data);
	}
	public function vieworder($id=''){
		$cek = $this->input->get('order').$id;
	 	$sqlcek = $this->db->query("SELECT * FROM tbl_order LEFT JOIN tbl_jadwal on tbl_order.kd_jadwal = tbl_jadwal.kd_jadwal WHERE kd_order ='".$cek."'")->result_array();
	 	if ($sqlcek) {
	 		$data['tiket'] = $sqlcek;
			$data['title'] = "View Order";
			$this->load->view('adm/view_order',$data);
	 	}else{
	 		$this->session->set_flashdata('message', 'swal("Kosong", "Order Tidak Ada", "error");');
    		redirect('adm/tiket');
	 	}
	}
	public function inserttiket($value=''){
		$id = $this->input->post('kd_order');
		$asal = $this->input->post('asal_beli');
		$tiket = $this->input->post('kd_tiket');
		$nama = $this->input->post('nama');
		$kursi = $this->input->post('no_kursi');
		$umur = $this->input->post('umur_kursi');
		$harga = $this->input->post('harga');
		$tgl = $this->input->post('tgl_beli');
		$status = $this->input->post('status');
		$where = array('kd_order' => $id );
		$update = array('status_order' => $status );
		$this->db->update('tbl_order', $update,$where);
		$data['asal'] = $this->db->query("SELECT * FROM tbl_tujuan WHERE kd_tujuan ='".$asal."'")->row_array();

		for ($i=0; $i < count($nama) ; $i++) { 
			$simpan = array(
				'kd_tiket' => $tiket[$i],
				'kd_order' => $id,
				'nama_tiket' => $nama[$i],
				'kursi_tiket' => $kursi[$i],
				'umur_tiket' => $umur[$i],
				'asal_beli_tiket' => $asal,
				'harga_tiket' => $harga,
				'status_tiket' => $status,
				'create_tgl_tiket' => date('Y-m-d'),
				'create_admin_tiket' => $this->session->userdata('username_admin')
			);
		$this->db->insert('tbl_tiket', $simpan);
		}
		$this->session->set_flashdata('message', 'swal("Berhasil", "Order Tiket Berhasil Dikonfirmasi dan Tersimpan", "success");');
		redirect('adm/order');

		
	}
	public function hapus($kd_order){
		$this->getkod_model->hapusData($kd_order);
		redirect('adm/order');
	}

}

/* End of file Order.php */
/* Location: ./application/controllers/adm/Order.php */