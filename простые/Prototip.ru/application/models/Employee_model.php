<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }


    function createDate()
    {

        $data = array{
        'name_cmp'=>$this->imput->post('name_cmpl'),
			'supervisory_auth'=>$this->imput->post('supervisory_authl'),
			'date_after'=>$this->imput->post('date_afterl'),
			'date_for'=>$this->imput->post('date_forl'),
			'the_duration_test'=>$this->imput->post('the_duration_testl'),
    
		};
		$this->db->insert('CMP_table', $data);
	}
}

	
