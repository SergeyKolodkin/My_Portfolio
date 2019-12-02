<html>
<head>
    <title>Export Data to Excel in Codeigniter using PHPExcel</title>
    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
</head>
<body>
	<div class="container box">
		<h3 align="center">Export Data to Excel in Codeigniter using PHPExcel</h3>
		<br />
		<div class="table-responsive">
			<table class="table table-bordered table-responsive-md">
	<thead>
		<tr>
			<td>Наименнование СМП</td>
			<td>Контролирующий орган</td>
			<td>Плановый период проверки</td>
			<td>Плановая длительность</td>
		
		</tr>
	</thead>
				<?php
				foreach($employee_data as $row)
				{
					echo '
					<tr>

						<td>'.$row->name_cmp.'</td>
						<td>'.$row->supervisory_auth.'</td>
						<td>'.$row->date_after.'</td>
						<td>'.$row->date_for.'</td>
						<td>'.$row->the_duration_test.'</td>
					</tr>
					';
				}
				?>
			</table>
			<div align="center">
				<form method="post" action="<?php echo base_url(); ?>excel_export/action">
					<input type="submit" name="export" class="btn btn-success" value="Export" />
				</form>
			</div>
			<br />
			<br />
		</div>
	</div>
</body>
</html>
























