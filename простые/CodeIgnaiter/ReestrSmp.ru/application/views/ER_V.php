<title>Реестр СМП</title>

<!--Форма редактирование записи-->
<div class="container">
   <div class="modal-body">
      <form method="post" action="<?php echo site_url('Reestrsmp_c/update')?>/<?php echo $row->id; ?>">
      <div class="form-group">
         <label for="name_cmpl">Наименование СМП</label>
         <input type="text" class="form-control" name="name_cmpl" value="<?php echo $row->name_cmp;?>">
      </div>
      <div class="form-group">
         <label for="supervisory_authl">Контролирующий орган</label>
         <input type="text" class="form-control" name="supervisory_authl" value="<?php echo $row->supervisory_auth;?>">
      </div>
      <div class="form-group">
         <label for="date_afterl">Плановый период проверки c</label>
         <input type="date" class="form-control" name="date_afterl"value="<?php echo $row->date_after;?>">
         <label for="date_forl">по</label>
         <input type="date" class="form-control" name="date_forl" value="<?php echo $row->date_for;?>">
      </div>
      <div class="form-group">
         <label for="the_duration_testl">Плановая длительность</label>
         <input type="text" class="form-control" name="the_duration_testl" value="<?php echo $row->the_duration_test;?>">
      </div>
      <button type="submit" class="btn btn-primary" value="save">Сохранить</button>
      <a href="<?php echo site_url('Reestrsmp_c/index');?>/<?php echo $row->id;?>"><button type="button" class="btn btn-danger" >Назад</button></a>
   </div>
</div>
