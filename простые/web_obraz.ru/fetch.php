<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	
</head>
<body>

<?php


//fetch.php

include("database_connection.php");

$query = "SELECT * FROM tbl_sample";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();
//$p .="<time class='timeago' datetime= '$p1'></time>";

$output = '
<table class="table table-striped table-bordered">
	<tr>
		<th>Название книги</th>
		<th>Краткое содержание</th>
		<th>Сколько страниц</th>
		<th>Цена</th>
		<th>Дата добавления</th>
		<th>Добавлено</th>
		<th>Удалить</th>
	</tr>
';
if($total_row > 0)
{
	foreach($result as $row)
	{
		$p1=$row["Date_added"];
		$output .= '
		<tr>
			<td width="40%">'.$row["book_title"].'</td>
			<td width="40%">'.$row["outline"].'</td>
			<td width="40%">'.$row["Num_of_pages"].'</td>
			<td width="40%">'.$row["price"].'</td>
			<td width="40%">'.$row["Date_added"].'</td>
			<td width="40%">'.$p ="<time class='timeago' datetime= '$p1'>;</time>".'</td>
			<td width="10%">
			<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id"].'">Удалить</button>
			</td>
		</tr>';
	
	}

	
}
else
{
	$output .= '
	<tr>
		<td colspan="7" align="center">В таблице нет данных</td>
	</tr>
	';
}
$output .= '</table>';
echo $output;
?>


<script src="timeago/jquery.timeago.en.js" type="text/javascript"></script>
<script type="text/javascript">
   jQuery(document).ready(function() {
     $("time.timeago").timeago();
   });
</script>

</body>
</html>








	