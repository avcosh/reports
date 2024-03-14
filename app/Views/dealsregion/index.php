<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class ="container">
<center><h1>Отчет сделки по регионам</h1></center>
<hr>
<form  method = "get" action = "<?= route_to('dealsregion.report') ?>">
  <div class="form-inline">
	  <div class="form-group">
		<label for="startdate">Период&nbsp;&nbsp;</label>
		<input type="date" name = "startdate" class="form-control" id="startdate" required>
		<label for="enddate"></label>
		<input type="date" name = "enddate" class="form-control" id="enddate" required>
	  </div>
  
	  <div class="form-group">
		<label for="regions">&nbsp;&nbsp;Выбор региона&nbsp;&nbsp;</label>
		<select class="form-control" name = "regions[]" id="regions" multiple="multiple">
			<?php foreach($allRegions as $allReg):?>
			<option value="<?=$allReg['ID']?>"><?=$allReg['VALUE']?></option>
		    <?php endforeach ?>
		</select>
	  </div>
	  
	  
	  
  </div> <hr>
 
	<input type="submit" class="btn btn-primary mb-2" name = "submit" value = "Сформировать отчет">
</form>





</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#regions').multiselect();
    });
</script>
<?= $this->endSection() ?>