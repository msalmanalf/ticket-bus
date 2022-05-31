<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index(){
		$this->autlogin();
	}

	public function autlogin(){
		$this->load->view('frontend/login');
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
	
	public function cekuser(){
		$username = strtolower($this->input->post('username'));
		$password = $this->input->post('password');
		$sqlCheck = $this->db->query('select * from tbl_pelanggan where username_pelanggan = "'.$username.'" OR email_pelanggan = "'.$username.'" ')->row();
		if ($sqlCheck) {
			if ($sqlCheck->status_pelanggan == 1) { 
				if (password_verify($password,$sqlCheck->password_pelanggan)) {
						$sess = [
							'kd_pelanggan' => $sqlCheck->kd_pelanggan,
							'username' => $sqlCheck->username_pelanggan,
							'password' => $sqlCheck->password_pelanggan,
							'ktp'     => $sqlCheck->no_ktp_pelanggan,
							'nama_lengkap'     => $sqlCheck->nama_pelanggan,
							'img_pelanggan'	=> $sqlCheck->img_pelanggan,
							'email'   => $sqlCheck->email_pelanggan,
							'telpon'   => $sqlCheck->telpon_pelanggan,
							'alamat'	=> $sqlCheck->alamat_pelanggan
						];
						$this->session->set_userdata($sess);
						if ($this->session->userdata('jadwal') == NULL) {
							redirect('tiket');
						}else{
							redirect('tiket/beforebeli/'.$this->session->userdata('jadwal').'/'.$this->session->userdata('asal').'/'.$this->session->userdata('tanggal'));
						}
					}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
						Password Salah ! harap periksa kembali.
					</div>');
					redirect('login');
				}
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
						Akun Anda Belum terverifikasi cek kembali email anda !
					</div>');
				redirect('login');
			}
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
						Username Tidak Terdaftar !
					</div>');
			redirect('login');
		}
	}

	public function daftar(){
		$this->form_validation->set_rules('nomor', 'Nomor', 'trim|required|is_unique[tbl_pelanggan.telpon_pelanggan]',array(
			'required' => 'Nomor HP Wajib Di isi !',
			'is_unique' => 'Nomor HP Sudah Di Gunakan.'
			 ));
		$this->form_validation->set_rules('name', 'Name', 'trim|required',array(
			'required' => 'Nama Lengkap Wajib Di isi !',
			 ));
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|is_unique[tbl_pelanggan.username_pelanggan]',array(
			'required' => 'Username Wajib Di isi !',
			'is_unique' => 'Username Telah Terpakai.'
			 ));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tbl_pelanggan.email_pelanggan]',array(
			'required' => 'Email Wajib Di isi !',
			'valid_email' => 'Masukan Email Dengan Format Yang Benar !',
			'is_unique' => 'Email Sudah Di Gunakan.'
			 ));
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]',array(
			'matches' => 'Password Tidak Sama !',
			'min_length' => 'Password Minimal 8 Karakter.'
			 ));
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]');
		if ($this->form_validation->run() == false) {
			$this->load->view('frontend/daftar');
		} else {
			$this->load->model('getkod_model');
			$data = array(
			'kd_pelanggan'	=> $this->getkod_model->get_kodpel(),
			'nama_pelanggan'  => $this->input->post('name'),
			'email_pelanggan'	    	=> $this->input->post('email'),
			'img_pelanggan'		=> 'assets/frontend/img/default.png',
			'alamat_pelanggan'		=> $this->input->post('alamat'),
			'telpon_pelanggan'		=> $this->input->post('nomor'),
			'username_pelanggan'		=> $this->input->post('username'),
			'status_pelanggan' => 0,
			'date_create_pelanggan' => time(),
			'password_pelanggan'		=> password_hash($this->input->post('password1'),PASSWORD_DEFAULT)
			);
			$token = md5($this->input->post('email').date("d-m-Y H:i:s"));
			$data1 = array(
				'nama_token' => $token,
				'email_token' => $this->input->post('email'),
				'date_create_token' => time()
				 );
			$this->db->insert('tbl_pelanggan', $data);
			$this->db->insert('tbl_token_pelanggan', $data1);
			$this->session->set_flashdata('message', 'swal("Berhasil", "Berhasil Daftar Harap Cek Email Kamu", "success");');
    		redirect('login');
		}

	}
	
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */