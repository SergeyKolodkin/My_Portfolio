<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaxsearch extends CI_Controller {

	function index()
	{
		$this->load->view('ajaxsearch');
	}

	function fetch()
	{
		$output = '';
		$query = '';
		$this->load->model('ajaxsearch_model');
		if($this->input->post('query'))
		{
			$query = $this->input->post('query');
		}
		$data = $this->ajaxsearch_model->fetch_data($query);
		$output .= '
		<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<tr>
							<td>Наименнование СМП</td>
							<td>Контролирующий орган</td>
							<td>Плановый период проверки</td>
							<td>Плановая длительность</td>
							<td>Редактирование</td>
							<td>Удаление</td>
						</tr>
		';
if($data->num_rows() > 0)
  {
   foreach($data->result() as $row)
   {
    $output .= '
      <tr>
       <td>'.$row->name_cmp.'</td>
       <td>'.$row->supervisory_auth.'</td>
       <td>'.$row->date_after.'</td>
       <td>'.$row->the_duration_test.'</td>
       <td><a href="<?php echo site_url(Reestrsmp_c/edit);?>/<?php echo $row->id;?>"><button type="button" class="btn btn-primary" >Редактировать</button></a></td>

      </tr>
    ';
   }
  }
  else
  {
   $output .= '<tr>
       <td colspan="5">No Data Found</td>
      </tr>';
  }
  $output .= '</table>';
  echo $output;
 }
 
}

