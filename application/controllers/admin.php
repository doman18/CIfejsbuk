<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {
		public function __construct(){
		parent::__construct();
		if($this->session->userdata('user_id') == FALSE && $this->session->userdata('is_admin')== FALSE) {redirect(base_url('guest', 'refresh'));}
		$this->load->model('user_model');
		$this->load->model('admin_model');
		$this->load->view('templates/header');
		$this->load->view('templates/left_col');
		$data['city_users']=$this->user_model->get_users_city($this->session->userdata('user_city'));
		$data['view'] = 'users_city';
		$this->load->view('templates/right_col', $data);
		}
		
		public function index(){
		$this->show_all_users();
		}
		
		public function show_all_users()
		{
		
		$data['users'] = $this->admin_model->show_users();
		$data['view'] = 'delete_users';
		$this->load->view('templates/middle_col',$data);
		}
		
		public function delete_user_id()
		{
		$id = $this->uri->segment(3);
		$this->admin_model->delete_user($id);
		redirect(base_url('admin/show_all_users'), 'refresh');
		}
		
		public function set_admin()
		{
		$id = $this->uri->segment(3);
		$this->admin_model->update_admin($id,1);
		redirect(base_url('admin/show_all_users'), 'refresh');
		}
		
		public function unset_admin()
		{
		$id = $this->uri->segment(3);
		$this->admin_model->update_admin($id,0);
		redirect(base_url('admin/show_all_users'), 'refresh');
		}
	}