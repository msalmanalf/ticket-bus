<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation'));
    }
    function getsecurity($value=''){
        $username = $this->session->userdata('username');
        if (empty($username)) {
            $this->session->sess_destroy();
            redirect('login');
        }
    }
	public function index(){
		$data = array(
    
        );
        // die(print_r($data));
		$this->load->view('frontend/home',$data);		
	}
	public function profile($value='')
	{
		$this->load->view('frontend/profile');
	}
	public function editprofile($id=''){
		$this->load->view('frontend/profile');
	}
	public function newslatter($value=''){
        $this->form_validation->set_rules('news', ' ', 'trim|required');
        
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

 
        if ($this->form_validation->run() == FALSE || !isset($response['success']) || $response['success'] <> true) {
            $this->index();
        } else {
            echo 'Berhasil';
        }
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */