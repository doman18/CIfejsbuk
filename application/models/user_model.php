<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_Model extends CI_Model{

public function verify($mail, $password){
$this->form_validation->set_rules('user_mail', 'Email', 'required|valid_email|min_length[1]|xss_clean');
$this->form_validation->set_rules('user_password', 'Haslo', 'required|min_length[1]|xss_clean');

if ($this->form_validation->run()){
	$where = array ('user_mail' => $mail, 'user_password' => $password);
	$query = $this->db->where($where)->get('users');
	
	if($query->num_rows() >0){
	$array = array();
	foreach ($query->result_array() as $key){
	$array['user_id'] = $key['user_id'];
	$array['user_name'] = $key['user_name'];
	$array['user_surname'] = $key['user_surname'];
	$array['user_mail'] = $key['user_mail'];
	$array['user_avatar'] = $key['user_avatar'];
	$array['user_city'] = $key['user_city'];
	$array['is_admin'] = (bool)$key['is_admin'];
	}
	$this->session->set_userdata($array);
	
	if ($this->session->userdata('user_id')){
		return TRUE;
		}
		else{
		return FALSE;
		}
	}
	else{
	$this->session->set_flashdata('error', 'Nie ma takiego zarejestrowanego uzytkownika');
	return FALSE;
	}
	
	}
	else
	{
	$this->session->set_flashdata('error', validation_errors());
		return FALSE;
	}
	}

	public function get_users_city($city){
	if (!empty($city)){
	$query = $this->db->select('*')->where('user_city', $city)->where_not_in('user_id', $this->session->userdata('user_id'))->limit(10)->get('users');
	
	}
	else
	{
	$query = $this->db->select('*')->where_not_in('user_id', $this->session->userdata('user_id'))->order_by('user_id', 'random')->limit(10)->get('users');
	}
		if ($query->num_rows()>0){
		return $query->result_array();
		}
		else{
		return FALSE;
		}
	}
	
	public function edit($name, $surname, $mail, $city, $id, $picture_name){

	$this->form_validation->set_rules('user_name', 'Imie', 'required|min_length[1]|xss_clean|alpha');
	$this->form_validation->set_rules('user_surname', 'Nazwisko', 'required|min_length[1]|xss_clean|alpha');
	$this->form_validation->set_rules('user_mail', 'Email', 'required|min_length[1]|xss_clean|valid_email');
	$this->form_validation->set_rules('user_city', 'Miejscowosc', 'min_length[1]|xss_clean|alpha');
	
	if ($this->form_validation->run()){
			$array = array('user_id' => $id, 'user_name' => $name, 'user_surname' => $surname, 'user_mail'=> $mail, 'user_city' => $city, 'user_avatar' => $picture_name);
			$query = $this->db->where('user_id', $id)->update('users',$array);
				if($query){
				$this->session->set_flashdata('success', 'Udalo sie zaktualizowac dane uzytkownika');
				$this->session->unset_userdata('user_avatar');
				$tablica = array('user_avatar' =>$picture_name);
				$this->session->set_userdata($tablica);
				return TRUE;
				}
				else{
				$this->session->set_flashdata('error', 'Nie udalo sie zaktualizowac danych');
				return FALSE;
				}
			
			}
			else{
			$this->session->set_flashdata('error', validation_errors());
			}
	
	
	}
	
	public function get_user_data($id){
	$query = $this->db->select('*')->where('user_id', $id)->get('users');
	
	if ($query->num_rows() > 0){
			return $query->result_array();
			}
			else
			{
			return FALSE;
			}
	}

	public function add_user($name, $surname, $mail, $password){
	$this->form_validation->set_rules('user_name', 'Imie', 'required|min_length[1]|xss_clean|alpha');
	$this->form_validation->set_rules('user_surname', 'Nazwisko', 'required|min_length[1]|xss_clean|alpha');
	$this->form_validation->set_rules('user_mail', 'Email', 'required|min_length[1]|xss_clean|valid_email|is_unique[users.user_mail]');
	//$this->form_validation->set_rules('user_city', 'Miejscowosc', 'required|min_length[1]|xss_clean|alpha');
	$this->form_validation->set_rules('user_password', 'Haslo', 'required|min_length[1]|xss_clean');
	
	if($this->form_validation->run()){
		$array = array('user_name' => $name, 'user_surname' => $surname, 'user_mail' => $mail, 'user_avatar' => 'default_avatar.png', 'user_password' => $password);
		$query = $this->db->insert('users', $array);
		if ($query == TRUE){
			$this->session->set_flashdata('succcess','Udalo sie dodac nowego uzytkownika');
			return TRUE;
			}
			else{
			$this->session->set_flashdata('error','Nie udalo sie dodac nowego uzytkownika');
			return FALSE;
			}
	
	}
	else{
	$this->session->set_flashdata('error', validation_errors());
	return FALSE;
	}
	
	
	}
}
