<html>
 <head>
 <title>
 Ну добавили тебя ну и че?
 </title>
</head>
 <body>
<h2>Добавление в базу данных</h2>
 <?php
  $subject = $_POST['subject'];
  $text = $_POST['elvismail'];

  
$dbc=mysqli_connect("localhost","root","","elvis_store") or die(mysqli_errno($dbc).mysqli_error($dbc));
$query = "SELECT*FROM email_list";
$result = mysqli_query($dbc,$query)
  or die(mysql_error());
while($row=mysqli_fetch_array($result)){
	echo $row['first_name'].''.$row['last_name'].':'.$row['email'].'<br/>';
	}
  mysqli_close($dbc);
?>

</body>
</html>