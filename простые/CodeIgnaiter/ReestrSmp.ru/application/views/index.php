<div class="container">
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand"><H3>Реестр плановых проверок</H3></a>
  <!--  поиск-->
  <form action ="<?php echo site_url('Reestrsmp_c/search');?>" method = "post" class="form-inline">
    <input class="form-control mr-sm-2" type="search"  name = "keyword" placeholder="Поиск" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
  </form>
</nav>
<br>
</br>
<!-- Кнопка  вызова модального окна -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
  Добавить СМП
</button>


<!-- Модалное окно добавление записи -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавить СМП </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  
	  
       <form method="post" action="<?php echo site_url('Reestrsmp_c/create')?>">
  <div class="form-group">
    <label for="name_cmpl">Наименование СМП</label>
    <input type="text" class="form-control" name="name_cmpl">
  </div>
 <div class="form-group">
    <label for="supervisory_authl">Контролирующий орган</label>
    <input type="text" class="form-control" name="supervisory_authl" >
  </div>
  <div class="form-group">
    <label for="date_afterl">Плановый период проверки c</label>
    <input type="date" class="form-control" name="date_afterl" >
	<label for="date_forl">по</label>
    <input type="date" class="form-control" name="date_forl" >
  </div>
  <div class="form-group">
    <label for="the_duration_testl">Плановая длительность</label>
    <input type="text" class="form-control" name="the_duration_testl" >
	
	
  </div>
  
  
  <button type="submit" class="btn btn-primary" value="save">Сохранить</button>
</form>
      </div>
     
    </div>
  </div>
</div>
<br>
</br>
<!-- Вывод таблицы из базы данныйх на экран-->
 <?php if (isset($results)) { ?>
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
            <?php } else { ?>
                <div>No user(s) found.</div>
            <?php } ?>
 
<!-- Вывод постраничной навигации-->
 <?php if (isset($links)) { ?>
                <?php echo $links ?>
            <?php } ?>


 
</div>