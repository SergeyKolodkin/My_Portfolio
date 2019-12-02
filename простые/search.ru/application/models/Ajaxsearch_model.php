<?php
class Ajaxsearch_model extends CI_Model
{
	function fetch_data($query)
	{
		$this->db->select("*");
		$this->db->from("CMP_table");
		if($query != '')
		{
			$this->db->like('name_cmp', $query);
			$this->db->or_like('supervisory_auth', $query);
			$this->db->or_like('date_after', $query);
			$this->db->or_like('date_for', $query);
			$this->db->or_like('the_duration_test', $query);
		}
		return $this->db->get();
	}
}
?>