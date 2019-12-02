

<div class="container">
<h3>Реестр плановых проверок</h3>
<br>
</br>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Добавить СМП
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="post" action="<?php echo site_url('Employee/create')?>">
  <div class="form-group">
    <label for="name_cmpl">Наименование СМП</label>
    <input type="text" class="form-control" name="name_cmpl">
  </div>
 <div class="form-group">
    <label for="supervisory_authl">Контролирующий орган</label>
    <input type="text" class="form-control" name="supervisory_authl" >
  </div>
  <div class="form-group">
    <label for="Date_afterl">Плановый период проверки c</label>
    <input type="date" class="form-control" name="date_afterl" >
	<label for="date_forl">по</label>
    <input type="date" class="form-control" name="date_forl" >
  </div>
  <div class="form-group">
    <label for="the_duration_testl">Плановая длительность</label>
    <input type="text" class="form-control" name="the_duration_testl" >
  </div>
  
  
  <button type="submit" class="btn btn-primary" value="save" >Сохранить</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<br>
</br>
<table class="table table-bordered table-responsive"
	<thead>
		<tr>
			<td>№</td>
			<td>Наименнование СМП</td>
			<td>Контролирующий орган</td>
			<td>Плановый период проверки</td>
			<td>Плановая длительность</td>
			<td>Рдактировать/Удалить</td>
			
		</tr>
	</thead>
	<tbody >
	
	</tbody>
</table>
</div>

