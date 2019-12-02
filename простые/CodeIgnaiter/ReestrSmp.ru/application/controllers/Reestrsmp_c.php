<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reestrsmp_c extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('Reestr_m');
		// загрузка Pagination library
        $this->load->library('pagination');
         
        // загрузка URL helper
        $this->load->helper('url');
		
		  // загрузка session
        $this->load->library('session');

    }

	
	public function index() {
	
	// инициализация параметров
        $params = array();
        $limit_per_page = 10;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->Reestr_m->get_total();
		$keyword    =   $this->input->post('keyword');	
		$this->load->model("Reestr_m");
		$data["Exel_data"] = $this->Reestr_m->search();
		 $this->load->view("index", $data);
		
		$data['result']= $this->Reestr_m->getAllread();
        $this->load->view('layout/header');



        if ($total_records > 0) 
        {
            // получение текущих записей страницы
            $params["results"] = $this->Reestr_m->get_current_page_records($limit_per_page, $start_index);
             
            $config['base_url'] = base_url() . 'index.php/Reestrsmp_c/index';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
             
            $this->pagination->initialize($config);// инициализация pagination
             
            // создание постраничной ссылки
            $params["links"] = $this->pagination->create_links();
        }
		// загрузка вида
         $this->load->view('index',$params);
		 $this->load->view('layout/footer');
	}
	
	
	 public function custom()
    {
        // загрузка модели и БД
        $this->load->database();
        $this->load->model('Reestr_m');
		$this->pagination->initialize($config);
        // инициализация параметров
        $params = array();
        $limit_per_page = 2;
		
        $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
        $total_records = $this->Reestr_m->get_total();
     
    
     
        $this->load->view('index', $params);
    }

	// функция поиска
	public function search() {
		// Передача массива
		$keyword    =   $this->input->post('keyword');
        $data['results']    =   $this->Reestr_m->search($keyword);
		 $this->load->view('layout/header');
        $this->load->view('index',$data);
		$this->load->view('layout/footer');
	}
	
	// передача параметров в модуль createData();
	public function create(){
		$this->Reestr_m->createData();
		redirect("Reestrsmp_c");
}
	// функция вставки
	public function edit($id){
		$data['row']=$this->Reestr_m->getData($id);
		$this->load->view('layout/header');
		$this->load->view('ER_V', $data);
		$this->load->view('layout/footer');
	}
	
	// функция обновления
	public function update($id){
		$this->Reestr_m->updateData($id);
		redirect("Reestrsmp_c");	

	}
	
	
	// функция обновления
	public function delte($id){
		$this->Reestr_m->delteData($id);
		redirect("Reestrsmp_c");	

	}

}


function action()
 {
  $this->load->model("Reestr_m");
  $this->load->library("excel");
  $object = new PHPExcel();

  $object->setActiveSheetIndex(0);

  $table_columns = array("Наименование Смп", "Контролирующий орган", "С", "По", "Дни");

  $column = 0;

  foreach($table_columns as $field)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
   $column++;
  }

  $employee_data = $this->excel_export_model->fetch_data();

  $excel_row = 2;

  foreach($employee_data as $row)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->name_cmp);
   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->supervisory_auth);
   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->date_after);
   $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->date_for);
   $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->the_duration_test);
   $excel_row++;
  }

  $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="Employee Data.xls"');
  $object_writer->save('php://output');
 }

 
 
}