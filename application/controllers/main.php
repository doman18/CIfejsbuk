<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	public function __construct(){
	parent::__construct();
	if($this->session->userdata('user_id') == FALSE) {redirect(base_url('guest', 'refresh'));}
	$this->load->model('user_model');
	$this->load->view('templates/header');
	$this->load->view('templates/left_col');
	$data['city_users']=$this->user_model->get_users_city($this->session->userdata('user_city'));
	$data['view'] = 'users_city';
	$this->load->view('templates/right_col', $data);
	
	}


	public function index()
	{
	$this->show_entries();
	}
	
	public function show_entries(){
	$this->load->library('pagination');
	$this->load->model('entries_model');
	$config['base_url'] = base_url('main/show_entries');
	$config['total_rows'] = $this->entries_model->count_rows();
	$config['per_page'] = $this->config->item('per_page'); 
	$this->pagination->initialize($config); 
	$data['entry'] = $this->entries_model->get_entries($this->uri->segment(3),$config['per_page']) ;
	$data['view']= 'show_entries';
	$data['comments'] = $this->entries_model->show_comments();
	//var_dump(count($data['comments']));
	//die();
	$this->load->view('templates/middle_col', $data);
	}
	
	public function show_entry_id(){
	$this->load->model('entries_model');
	$data['entry'] = $this->entries_model->get_entry_id($this->uri->segment(3));
	$data['view'] = 'show_entry';
	$data['comments'] = $this->entries_model->show_all_comments($this->uri->segment(3));
	$this->load->view('templates/middle_col', $data);
	}
	
	public function add_entry(){
	$this->load->model('entries_model');
	$array = array();
	$array['author_id']= $this->session->userdata('user_id');
	$array['entry_content'] = $this->input->post('entry_content');
	$array['entry_cdate'] = date('Y-m-d H:i:s');
	$this->entries_model->insert_entry($array);
	redirect('main/show_entries', 'refresh');
	}
	
	public function delete_entry_id(){
	$this->load->model('entries_model');
	$query = $this->entries_model->delete_entry_id($this->uri->segment(3));
	redirect(base_url('main/show_entries'), 'refresh');
	}
	
	public function add_comment(){
	$this->load->model('entries_model');
	$entry_id = $this->uri->segment(3);
	$user_id = $this->session->userdata('user_id');
	$comment_content= $this->input->post('comment_content');
	$comment_cdate = date('Y-m-d H:i:s');
	$this->entries_model->add_comment($entry_id,$user_id,$comment_content, $comment_cdate);
	redirect(base_url('main/show_entry_id/'.$entry_id), 'refresh');
	}
	

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */