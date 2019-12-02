

<?php

//action.php


include('database_connection.php');

if(isset($_POST["action"]))
{
	if($_POST["action"] == "insert")
	{
		$query = "
		INSERT INTO tbl_sample (book_title, outline, Num_of_pages, price, Date_added) VALUES ('".$_POST["book_title"]."', '".$_POST["outline"]."' , '".$_POST["Num_of_pages"]."' , '".$_POST["price"]."' , '".$_POST["Date_added"]."')
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Данные добавлены</p>';
	}
	if($_POST["action"] == "fetch_single")
	{
		$query = "
		SELECT * FROM tbl_sample WHERE id = '".$_POST["id"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['book_title'] = $row['book_title'];
			$output['outline'] = $row['outline'];
			$output['Num_of_pages'] = $row['Num_of_pages'];
			$output['price'] = $row['price'];
			$output['Date_added'] = $row['Date_added'];
		}


		echo json_encode($output);
	}

	if($_POST["action"] == "delete")
	{
		$query = "DELETE FROM tbl_sample WHERE id = '".$_POST["id"]."'";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Данные удалены</p>';
	}
}

?>





