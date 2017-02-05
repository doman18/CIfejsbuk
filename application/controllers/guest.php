<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guest extends CI_Controller {
	
	public function index(){
	if ($this->session->userdata('user_id')){
	redirect (base_url('main/show_entries'), 'refresh');
	}
	else{

		$this->load->view('templates/header');
		$this->load->view('templates/left_col');
		$data['view'] = 'register_form';
		$this->load->view('templates/right_col', $data);
		$data['view'] = 'blank';
		$this->load->view('templates/middle_col', $data);
		
		}
	}
	
	public function log_me_in(){
	$this->load->model('user_model');
	$mail = $this->input->post('user_mail');
	$password = sha1($this->input->post('user_password'));
	$query = $this->user_model->verify($mail,$password);
	if ($query == TRUE) {
	redirect (base_url('main'),'refresh');
	}
	else {
	redirect (base_url('guest'),'refresh');
	}
	}
	
	public function register(){
	$this->load->model('user_model');
	$name = $this->input->post('user_name');
	$surname = $this->input->post('user_surname');
	$mail = $this->input->post('user_mail');
	//$city = $this->input->post('user_city');
	$password= sha1($this->input->post('user_password'));
	$query = $this->user_model->add_user($name, $surname, $mail, $password);
	redirect(base_url('guest'));
	}
	
	public function logout(){
	$this->session->sess_destroy();
	redirect(base_url('guest'), 'refresh');
	}
}