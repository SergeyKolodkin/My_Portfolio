<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reestr_m extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
	
	//передача в бд из массива post
    function createData() {
        $data = array (
            'name_cmp' => $this->input->post('name_cmpl'),
            'supervisory_auth' => $this->input->post('supervisory_authl'),
            'date_after' => $this->input->post('date_afterl'),
            'date_for' => $this->input->post('date_forl'),
            'the_duration_test' => $this->input->post('the_duration_testl')
        );
        $this->db->insert('CMP_Table', $data);// добавление из массива $data в таблицу
    }
	
	
	// получение всех записей из таблицы
	function getAllread(){
		
	
		$query=$this->db->query('SELECT*FROM CMP_Table');
		return $query->result();
		
	}
	
	// полчение конкретной записи 
	 function getData($id){
		 $query=$this->db->query('SELECT*FROM CMP_Table where `id`=' .$id);
		 return $query->row();
	 }
	 
	 
	 // обновление конкретной записи
	function updateData($id){
		$data = array (
            'name_cmp' => $this->input->post('name_cmpl'),
            'supervisory_auth' => $this->input->post('supervisory_authl'),
            'date_after' => $this->input->post('date_afterl'),
            'date_for' => $this->input->post('date_forl'),
            'the_duration_test' => $this->input->post('the_duration_testl')
        );
		$this->db->where('id', $id);
        $this->db->update('CMP_Table', $data);
    
	}
	
	// удаление одной записи
	 function delteData($id){
		$this->db->where('id', $id);
        $this->db-> delete('CMP_Table');
		 
	 }
	 
	 // поиск  схожего названия
	  function search($keyword){
	
		$this->db->like('name_cmp',$keyword);
        $query  =   $this->db->get('CMP_Table');
        return $query->result();
	 }
	 
	 
	 
	 ///получение текущих записей страницы
	 public function get_current_page_records($limit, $start) //$limit-указания количества записей,  $start-начальный индекс записи.
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("CMP_Table");
 
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
    }
     //подсчета количества записей в таблице пользователей.
    public function get_total() 
    {
        return $this->db->count_all("CMP_Table");
    }
}

