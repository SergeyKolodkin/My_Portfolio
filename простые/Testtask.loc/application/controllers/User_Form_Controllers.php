<?php

class User_Form_Controllers extends CI_Controller {

	function index()
	{
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('user_form');
		}
		else
		{
			$this->load->view('formsuccess');
		}
	}
}
?>