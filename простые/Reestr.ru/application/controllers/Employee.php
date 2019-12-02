<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
	function __construct()
	{
		parent:: __construct();
		$this->load->model('Employee_model');
	}
	
	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('employee/index');
		$this->load->view('layout/footer');
	}
	
	public function create(){
		$this->Employee_model->createDate();
		redirect("Employeee");
}	

}	
	