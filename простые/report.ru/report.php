<html>
 <head>
 <title>
 Космические пришельцы похищали меня - сообщениео похищении
 </title>
</head>
 <body>
<h2>Космические пришельцы похищали меня - сообщение
о похищении</h2>
 <?php
  $first_name = $_POST['firstname'];
  $last_name = $_POST['lastname'];
  $when_it_happened = $_POST['whenithappened'];
  $how_long = $_POST['howlong'];
  $how_many = $_POST['howmany'];
  $alien_description = $_POST['aliendescription'];
  $what_they_did = $_POST['whattheydid'];
  $fang_spotted = $_POST['fangspotted'];
  $email = $_POST['email'];
  $other = $_POST['other'];


$soedin=mysqli_connect("localhost","root","","report") or die(mysqli_errno($soedin).mysqli_error($soedin));
$query = "INSERT INTO aliens_abduction (first_name,last_name, when_it_happened,how_long,how_many, alien_description, what_they_did, fang_spotted, other, email) VALUES ('{$first_name}', '{$last_name}', '{$when_it_happened}', '{$how_long}', '{$how_many}','{$alien_description}', '{$what_they_did}', '{$fang_spotted}', '{$other}', '{$email}')";
$result = mysqli_query($soedin,$query)
  or die('Ошибка соединения: '.mysqli_connect_error());

  mysqli_close($soedin);
  echo 'Thanks for submitting the form.<br />';
  echo 'You were abducted ' . $when_it_happened;
  echo ' and were gone for ' . $how_long . '<br />';
  echo 'Number of aliens: ' . $how_many . '<br />';
  echo 'Describe them: ' . $alien_description . '<br />';
  echo 'The aliens did this: ' . $what_they_did . '<br />';
  echo 'Was Fang there? ' . $fang_spotted . '<br />';
  echo 'Other comments: ' . $other . '<br />';
  echo 'Your email address is ' . $email;
?>

</body>
</html>


