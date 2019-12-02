
<div class="container">
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand"><H3>Реестр плановых проверок</H3></a>
  <form class="form-inline">
    
  </form>
</nav>
<br>
</br>

<button type="button" class="btn btn-success">
Экспорт в Exel
</button>

<div class="modal-body">
<table class="table table-bordered table-responsive-md">
	<thead>
		<tr>
			<td>№</td>
			<td>Наименнование СМП</td>
			<td>Контролирующий орган</td>
			<td>Плановый период проверки</td>
			<td>Плановая длительность</td>
			<td>Рдактирование</td>
			<td>Удаление</td>
		</tr>
	</thead>
	
	<tbody >
	 <?php foreach($results as $row) {?>
                <tr>
                <th scope="row"><?php echo $row->id; ?></th>
                <td><?php echo $row->name_cmp; ?></td>
                <td><?php echo $row->supervisory_auth; ?></td>
                <td><?php echo $row->date_after; ?> - <?php echo $row->date_for; ?></td>
                <td><?php echo $row->the_duration_test; ?></td>
				<td> <a href="<?php echo site_url('Reestrsmp_c/edit');?>/<?php echo $row->id;?>"><button type="button" class="btn btn-primary" >Редактировать</button></a></td>
				<td><a href="<?php echo site_url('Reestrsmp_c/delte');?>/<?php echo $row->id;?>"><button type="button" class="btn btn-danger" >Удалить</button></a></td>
                </tr>
                <?php } ?>
	
	
	</tbody>
</table>
</div>
</div>