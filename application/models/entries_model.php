<?php

class entries_model extends CI_Model{

public function get_entries($offset, $limit){

$query = $this->db->select('*')->order_by('entry_cdate', 'DESC')->limit($limit, $offset)->join('users', 'users.user_id = entries.author_id')->get('entries');
return $query ? $query->result_array() : FALSE;
}

public function get_entry_id($id){
$query = $this->db->select('*')->where('entry_id',$id)->join('users', 'users.user_id = entries.author_id')->get('entries');
	return $query ? $query->result_array() : FALSE;
	}
	
	public function insert_entry($array){
	$this->form_validation->set_rules('entry_content', 'Tresc wpisu', 'xss_clean|required');
	
	$query = $this->db->insert('entries',$array);
	if ($query == TRUE){
		$this->session->set_flashdata('success', 'Udalo sie dodac wpis');
		return TRUE;
		}
		else{
		$this->session->set_flashdata('error', 'Nie udalo sie dodac wpisu');
		return FALSE;
		}
	}
	
	public function delete_entry_id($entry_id){
	$where = array('entry_id'=> $entry_id);
	$query = $this->db->select('author_id')->where($where)->limit(1)->get('entries');
	if($query->num_rows() >0){
			foreach ($query->result_array() as $key){
			$author_id = $key['author_id'];
			}
			
			if($author_id == $this->session->userdata('user_id') || $this->session->userdata('is_admin') == TRUE){
			$query = $this->db->where($where)->delete('entries');
				if($query == TRUE){
				$this->session->set_flashdata('success', 'Wpis skasowany');
				return TRUE;
				}
				else
				{
				$this->session->set_flashdata('error','Nie udalo sie skasowac wpisu');
				return FALSE;
				}
			}
			else{
			$this->session->set_flashdata('error','Nie masz uprawnien do przeprowadzenia tej czynnosci');
			return FALSE;
			}
		}
		
	else{
	$this->session->set_flashdata('error', 'Takiej wartosci nie ma w bazie');
	 return FALSE;
	}
	}
	
	public function count_rows(){
	return $this->db->select('entry_id')->get('entries')->num_rows();
	}
	
	public function add_comment($entry_id,$user_id,$comment_content, $comment_cdate){
	$this->form_validation->set_rules('comment_content', 'Tresc komentarza', 'xss_clean');
	
	if($this->form_validation->run() == TRUE){
	$array = array('comment_author' => $user_id, 'comment_entry' => $entry_id, 'comment_content' => $comment_content, 'comment_cdate'=>$comment_cdate);
	$query = $this->db->insert('comments', $array);
			if($query == TRUE){
			$this->session->set_flashdata('success','Udalo sie dodac komentarz');
			return TRUE;
			}
			else{
			$this->session->set_flashdata('error','Nie udalo sie dodac komentarza');
			return FALSE;
			}
	}
	else
	{
	$this->session->set_flashdata('error', validation_errors());
	return FALSE;
	}
	}
	
	public function show_comments(){
	$array= array('comment_id','user_name','comment_entry','user_surname','comment_content', 'comment_cdate');
	$query = $this->db->select($array)->join('users','users.user_id = comments.comment_author')->get('comments');
	if ($query->num_rows() >0){
	return $query->result_array();
	}
	else{
	return FALSE;
	}
	
	}
	
	public function show_all_comments($comment_id){
	$array= array('comment_id','user_name','user_surname','comment_content', 'comment_cdate');
	$query = $this->db->select($array)->where('comment_entry',$comment_id)->order_by('comment_cdate','DESC')->join('users','users.user_id = comments.comment_author')->get('comments');
	if ($query->num_rows() >0){
	return $query->result_array();
	}
	else{
	return FALSE;
	}
	
	}
	
	
	
}