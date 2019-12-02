<html>
<head>
<title>Моя форма</title>
</head>
<body>

<?php echo validation_errors(); ?>

<?php echo form_open('form'); ?>

<h5>Имя пользователя</h5>
<input type="text" name="username" value="" size="50" />

<h5>Ваше имя</h5>
<input type="text" name="email_user" value="" size="50" />

<h5>Заголовок сообщения</h5>
<input type="text" name="Header_msg_U" value="" size="50" />

<h5>Текст сообщения</h5>
  <textarea name="text_msg_U" cols="40" rows="3"></textarea></p>

<div><input type="submit" value="Отправить сообщение" /></div>

</form>

</body>
</html>