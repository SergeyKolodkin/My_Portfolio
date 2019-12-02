<html>
    <head>
	<meta charset="UTF-8">
        <title>Тестовое задание для X5Studio</title>
		<link rel="stylesheet" href="jquery-ui.css">
        <link rel="stylesheet" href="bootstrap.min.css" />
		<script src="jquery.min.js"></script>
		<script src="jquery-ui.js"></script>
    </head>
    <body>
        <div class="container">
			<br />

			<h3 align="center">Тестовое задание для X5Studio</a></h3><br />
			<br />
			<div align="right" style="margin-bottom:5px;">
			<button type="button" name="add" id="add" class="btn btn-success btn-xs">Добавить книгу</button>
			</div>
			<div class="table-responsive" id="user_data">

			</div>
			<br />
		</div>

		<div id="user_dialog" title="Добавить книгу">
			<form method="post" id="user_form">
				<div class="form-group">
					<label>Введите название книги</label>
					<input type="text" name="book_title" id="book_title" class="form-control" />
					<span id="error_book_title" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Введите краткое содержание</label>
					<textarea name="outline" id="outline" class="form-control" placeholder="Введите краткое содержание"></textarea>
					<span id="error_outline" class="text-danger"></span>
				</div>

				<div class="form-group">
					<label>Введите количество страниц</label>
					<input type="Number" name="Num_of_pages" id="Num_of_pages" class="form-control" />
					<span id="error_Num_of_pages" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Введите цену</label>
					<input type="Number" name="price" id="price" class="form-control" />
					<span id="error_price" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label> Введите дату добавления</label>
					<input type="datetime" name="Date_added" id="Date_added" class="form-control"  value="<?php echo date("Y-m-d H:i:s"); ?>"/>
					<span id="error_Date_added" class="text-danger"></span>
				</div>


				<div class="form-group">
					<input type="hidden" name="action" id="action" value="insert" />
					<input type="hidden" name="hidden_id" id="hidden_id" />
					<input type="submit" name="form_action" id="form_action" class="btn btn-info" value="Insert" />
				</div>
			</form>
		</div>

		<div id="action_alert" title="Action">

		</div>

		<div id="delete_confirmation" title="Подтверждение">
		<p>Вы действительно хотите удалить?</p>
		</div>

    </body>
</html>




<script>
$(document).ready(function(){

	load_data();

	function load_data()
	{
		$.ajax({
			url:"fetch.php",
			method:"POST",
			success:function(data)
			{
				$('#user_data').html(data);
			}
		});
	}

	$("#user_dialog").dialog({
		autoOpen:false,
		width:400
	});

	$('#add').click(function(){
		$('#user_dialog').attr('title', 'Добавть данные');
		$('#action').val('insert');
		$('#form_action').val('Добавить');
		$('#user_form')[0].reset();
		$('#form_action').attr('disabled', false);
		$("#user_dialog").dialog('open');
	});

	$('#user_form').on('submit', function(event){
		event.preventDefault();
		var error_book_title = '';
		var error_outline = '';
		var error_Num_of_pages ='';
		var error_price='';
		var error_Date_added='';
		if($('#book_title').val() == '')
		{
			error_book_title = 'Введите название книги';
			$('#error_book_title').text(error_book_title);
			$('#book_title').css('border-color', '#cc0000');
		}
		else
		{
			error_book_title = '';
			$('#error_book_title').text(error_book_title);
			$('#book_title').css('border-color', '');
		}
		if($('#outline').val() == '')
		{
			error_outline = 'Введите краткое содержание';
			$('#error_outline').text(error_outline);
			$('#outline').css('border-color', '#cc0000');
		}
		else
		{
			error_outline = '';
			$('#error_outline').text(error_outline);
			$('#outline').css('border-color', '');
		}

		if($('#Num_of_pages').val() == '')
		{
			error_Num_of_pages = 'Введите количество страниц';
			$('#error_Num_of_pages').text(error_Num_of_pages);
			$('#Num_of_pages').css('border-color', '#cc0000');
		}
		else
		{
			error_Num_of_pages = '';
			$('#error_Num_of_pages').text(error_Num_of_pages);
			$('#Num_of_pages').css('border-color', '');
		}

		if($('#price').val() == '')
		{
			error_price = 'Введите цену';
			$('#error_price').text(error_price);
			$('#price').css('border-color', '#cc0000');
		}
		else
		{
			error_price = '';
			$('#error_price').text(error_price);
			$('#book_price').css('border-color', '');
		}


		if($('#Date_added').val() == '')
		{
			error_Date_added = 'Введите дату добавления';
			$('#error_Date_added').text(error_Date_added);
			$('#Date_added').css('border-color', '#cc0000');
		}
		else
		{
			error_Date_added = '';
			$('#error_Date_added').text(error_Date_added);
			$('#book_Date_added').css('border-color', '');
		}

		if(error_book_title != '' || error_outline != '' || error_Num_of_pages != '' || error_price != '' || error_Date_added != '')
		{
			return false;
		}
		else
		{
			$('#form_action').attr('disabled', 'disabled');
			var form_data = $(this).serialize();
			$.ajax({
				url:"action.php",
				method:"POST",
				data:form_data,
				success:function(data)
				{
					$('#user_dialog').dialog('close');
					$('#action_alert').html(data);
					$('#action_alert').dialog('open');
					load_data();
					$('#form_action').attr('disabled', false);
				}
			});
		}

	});

	$('#action_alert').dialog({
		autoOpen:false
	});

	$(document).on('click', '.edit', function(){
		var id = $(this).attr('id');
		var action = 'fetch_single';
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{id:id, action:action},
			dataType:"json",
			success:function(data)
			{
				$('#book_title').val(data.book_title);
				$('#outline').val(data.outline);
				$('#Num_of_pages').val(data.Num_of_pages);
				$('#price').val(data.price);
				$('#Date_added').val(data.Date_added);
				$('#user_dialog').attr('title', 'Edit Data');
				$('#action').val('update');
				$('#hidden_id').val(id);
				$('#form_action').val('Update');
				$('#user_dialog').dialog('open');
			}
		});
	});

	$('#delete_confirmation').dialog({
		autoOpen:false,
		modal: true,
		buttons:{
			Ok : function(){
				var id = $(this).data('id');
				var action = 'delete';
				$.ajax({
					url:"action.php",
					method:"POST",
					data:{id:id, action:action},
					success:function(data)
					{
						$('#delete_confirmation').dialog('close');
						$('#action_alert').html(data);
						$('#action_alert').dialog('open');
						load_data();
					}
				});
			},
			Cancel : function(){
				$(this).dialog('close');
			}
		}
	});

	$(document).on('click', '.delete', function(){
		var id = $(this).attr("id");
		$('#delete_confirmation').data('id', id).dialog('open');
	});

});
</script>