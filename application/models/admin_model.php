<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_Model extends CI_Model{

	public function show_users(){
	$query = $this->db->select('*')->where_not_in('user_id',$this->session->userdata('user_id'))->get('users');
	if($query->num_rows() > 0){
	return $query->result_array();
	}
	else{
	$this->session->set_flashdata('error','Brak wpisów do wyświetlenia');
	return FALSE;
	}

	}
	
	public function delete_user($id){
	$array = array('user_id' => $id);
	$query = $this->db->where($array)->delete('users');
		if ($query == TRUE){
		$this->session->set_flashdata('success', 'Uzytkownik zostal skasowany');
		return TRUE;
		}
		else{
		$this->session->set_flashdata('error',' Nie udało sie skasować użytkownika');
		return FALSE;
		}
	}
	
	public function update_admin($id,$is_admin){
	$query = $this->db->where('user_id',$id)->update('users',array('is_admin'=>$is_admin));
	if ($query == TRUE){
		$this->session->set_flashdata('success','Status uzytkownika zostal zmieniony');
		return TRUE;
		}
		else
		{
		$this->session->set_flashdata('error','Status uzytkownika nie zostal zmieniony');
		return FALSE;
		}
	}
}