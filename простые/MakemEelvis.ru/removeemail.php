<html>
 <head>
 <title>
 Ну добавили тебя ну и че?
 </title>
</head>
 <body>
<h2>Добавление в базу данных</h2>
 <?php
  $first_name = $_POST['firstname'];
  $last_name = $_POST['lastname'];
  $email = $_POST['email'];
  
$soedin=mysqli_connect("localhost","root","","elvis_store") or die(mysqli_errno($soedin).mysqli_error($soedin));
$query = "INSERT INTO email_list (first_name,last_name, email) VALUES ('{$first_name}','{$last_name}','{$email}')";
$result = mysqli_query($soedin,$query)
  or die('Ошибка соединения: '.mysqli_connect_error());

  mysqli_close($soedin);
   echo 'Покупатель похищен';
?>

</body>
</html>