<?php
	Class Articlesmodel extends CI_Model{
		public function articles_list($limit,$offset){
			$query = $this->db->limit($limit,$offset)->get('articles')->result();
			return $query;
		}
		public function num_rows(){
			$query = $this->db->get('articles')->num_rows();
			return $query;
		}
		public function add_article(){
			$data=array(
						'title'=>$this->input->post('title'),
						'body'=>$this->input->post('body'),
						'user_id'=>$this->session->userdata('user_id'),
					);
			$affected_no_rows = $this->db->insert('articles',$data);		// this function is used to return number of inserted values 
				

			// exit;

			if($affected_no_rows){
				$this->session->set_flashdata('feedback','Article Added Successful');
				$this->session->set_flashdata('feedback_class','success');
				return redirect('admin/dashboard');
			}else{
				$this->session->set_flashdata('feedback','Database Error');
				$this->session->set_flashdata('feedback_class','danger');
				return redirect('admin/dashboard'); 
			}

		}

		public function find_article($article_id){
			$q=$this->db->where(['id'=>$article_id])->get('articles')->row();
			return $q;
		}
		public function update_article(){
			$id = $this->input->post('id');
			$title = $this->input->post('title');
			$body = $this->input->post('body');


			$data=array(
				'title'=>$title,
				'body'=>$body,
				);

			$affected_no_rows = $this->db->where(['id'=>$id])->update('articles',$data);		// this function is used to return number of inserted values 
				

			// exit;

			if($affected_no_rows){
				$this->session->set_flashdata('feedback','Article Updated Successful');
				$this->session->set_flashdata('feedback_class','success');
				return redirect('admin/dashboard');
			}else{
				$this->session->set_flashdata('feedback','Database Error');
				$this->session->set_flashdata('feedback_class','danger');
				return redirect('admin/dashboard'); 
			}
		}
	}

?>