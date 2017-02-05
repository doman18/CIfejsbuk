<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller{
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
	
	public function index(){
	
	}
	
	public function show_user_id ($id){
	$this->load->model('user_model');
	$data['user']= $this->user_model->get_user_data($id);
	$data['view'] = 'show_user';
	$this->load->view('templates/middle_col', $data);
	}

	public function edit_user(){
	$this->load->model('user_model');
	$data['user'] = $this->user_model->get_user_data($this->session->userdata('user_id'));
	$data['view'] = 'edit_user';
	$this->load->view('templates/middle_col',$data);
	//$query = $this->user_model->edit($id);
	
	}
	
	public function update_user(){
	
	$name = $this->input->post('user_name');
	$surname = $this->input->post('user_surname');
	$mail = $this->input->post('user_mail');
	$city = $this->input->post('user_city');
	$id= $this->session->userdata('user_id');
	$config['upload_path'] = $this->config->item('upload_path');
	$config['allowed_types']= $this->config->item('allowed_types');
	$config['max_size']= $this->config->item('max_size');
	$config['max_width']= $this->config->item('max_width');
	$config['max_height']= $this->config->item('max_height');
	$this->load->library('upload',$config);
	if(!$this->upload->do_upload('user_avatar')){
		$this->session->set_flashdata('error', $this->upload->display_errors());
		redirect(base_url('user/edit_user'),'refresh');
	}
		else{
		$picture_name = $this->upload->data();
		$query = $this->user_model->edit($name, $surname, $mail, $city, $id, $picture_name['file_name']);
		redirect(base_url('user/edit_user'), 'refresh');
		}
	}
}

?>