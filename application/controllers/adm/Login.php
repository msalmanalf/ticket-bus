<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('username');
		if ($username) {
			redirect('adm/home');
			$this->session->sess_destroy();
			redirect('adm/login');
		}else{
			redirect('adm/login');
		}
	}

	public function index(){
		$data = array(
    
        );
		$this->load->view('adm/login',$data);
	}
    
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('adm/login'));
	}

	public function cekuser(){
    $username = strtolower($this->input->post('username'));
    $getUser = $this->db->query('select * from tbl_admin where username_admin = "'.$username.'"')->row();
    $password = $this->input->post('password');

    if (password_verify($password,$getUser->password_admin)) {
        $sess = array(
            'kd_admin' => $getUser->kd_admin,
            'username_admin' => $getUser->username_admin,
            'password_admin' => $getUser->password_admin,
            'nama_admin'     => $getUser->nama_admin,
            'img_admin'	=> $getUser->img_admin,
            'email_admin'   => $getUser->email_admin,
            'level'	=> $getUser->level_admin
        );
        $this->session->set_userdata($sess);
        redirect('adm/home');
    }else{
    	$this->session->set_flashdata('message', 'swal("Gagal", "Email/Password Salah", "error");');
    	redirect('adm/login');
    	}
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/adm/Login.php */