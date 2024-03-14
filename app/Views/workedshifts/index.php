<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class ="container">
<center><h1>Отчет вывод фактически отработанных смен</h1></center>
<hr>
<form  method = "get" action = "<?= route_to('workedshifts.report') ?>">
  <div class="form-inline">
	  <div class="form-group">
		<label for="startDate">Период&nbsp;&nbsp;</label>
		<input type="date" name = "startDate" class="form-control" id="startDate" required>
		<label for="endDate"></label>
		<input type="date" name = "endDate" class="form-control" id="endDate" required>
	  </div>
  
	  <div class="form-group">
		<label for="managers">&nbsp;&nbsp;Менеджер&nbsp;&nbsp;</label>
		<select class="form-control" name = "managers[]" id="managers" multiple="multiple">
			<?php foreach($allManagers as $manager):?>
		        <option value="<?=$manager['ID']?>">
				    <?=$manager['NAME']?> <?=$manager['LAST_NAME']?>
				</option>
		    <?php endforeach ?>
		</select>
	  </div>
	  
	  <div class="form-group">
		<label for="allusers">&nbsp;&nbsp;Все пользователи&nbsp;&nbsp;</label>
	  <input type="checkbox" name="allusers" value = "1" id = "allusers">
	  </div>
	  
  </div> <hr>
 
	<input type="submit" class="btn btn-primary mb-2" name = "submit" value = "Сформировать отчет">
</form>





</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#managers').multiselect();
    });
</script>
<?= $this->endSection() ?>