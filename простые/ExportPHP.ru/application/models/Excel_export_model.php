<?php
class Excel_export_model extends CI_Model
{
	function fetch_data()
	{
		$query = $this->db->get("CMP_Table");
		return $query->result();
	}

	
}
