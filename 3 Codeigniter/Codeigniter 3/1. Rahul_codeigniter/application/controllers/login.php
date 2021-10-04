<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function index(){
		if($this->session->userdata('user_id')){
			return redirect('admin/dashboard');
		}
		$this->load->view('public/admin_login.php');
	}
	public function admin_login(){
		
		$this->form_validation->set_rules('uname','User Name','required|alpha|trim');
		$this->form_validation->set_rules('pass','Password','required|trim');
		$this->form_validation->set_error_delimiters("<p class='text-info'>","</p>");		// to set color red of all the messages

		if($this->form_validation->run()){
			$uname = $this->input->post('uname');
			$pass = $this->input->post('pass');

			$this->load->model('loginmodel');
			$loginId = $this->loginmodel->login_valid($uname,$pass);
			if($loginId){

				$this->session->set_userdata('user_id',$loginId);
				// print_r($this->session->userdata());
				
				// echo "password match";

				
				return redirect('admin/dashboard');
			}else{

				$this->session->set_flashdata('login_failed','Invalid Username/Password');
				return redirect('login');

				// /echo "Password Do not match";  

			}

		}else{
			$this->load->view('public/admin_login'); 
		}	
		// echo validation_errors();
	}
	public function logout(){
		$this->session->unset_userdata('user_id');
		return redirect('login');
	}
	
}
