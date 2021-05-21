<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('user_id')){
			return redirect('login');
		}
		// $this->load->model('Vehicle_admin');
		// error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		
	}

	Public function dashboard(){
		 $this->load->library('pagination');

		 $config = [
		 'base_url' => base_url('admin/dashboard'),
		 'per_page'=>5,
		 'total_rows'=>$this->articlesmodel->num_rows(),
		 'full_tag_open'=>"<ul class='pagination'>",
		'full_tag_close'=>"</ul>",
		'first_tag_open'=>"<li class='page-link'>",
		'first_tag_close'=>"</li>",
		'first_link'=>"FIRST PAGE",
		'last_link'=>"LAST PAGE",
		'last_tag_open'=>"<li class='page-link'>",
		'last_tag_close'=>"</li>",
		'next_tag_open'=>"<li class='page-link'>",
		'next_tag_close'=>"</li>",
		'prev_tag_open'=>"<li class='page-link'>",
		'prev_tag_close'=>"</li>",
		'num_tag_open'=>"<li class='page-link'>",
		'num_tag_close'=>"</li>",
		'cur_tag_open'=>"<li class='page-item active'><a class='page-link'>",
		'cur_tag_close'=>"</a></li>"
		 ];

		 $this->pagination->initialize($config);
		 $offset=($this->uri->segment(3))?$this->uri->segment(3):0;
		$data['articles']  = $this->articlesmodel->articles_list($config['per_page'],$offset);
		$this->load->view('admin/dashboard',$data);
	}	
	public function add_article(){ 
		
		if($this->input->post('submit')){
			$this->articlesmodel->add_article();
		}


		$this->load->view('admin/add_article');
	}
	public function edit_article($article_id=null){
		if($this->input->post('edit')){
			$this->articlesmodel->update_article();
		}

		$data['article']=$this->articlesmodel->find_article($article_id);
		$this->load->view('admin/edit_article', $data);
	}
}
