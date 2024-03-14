<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<div class ="container">
<center><h1>Отчет ФОТ (фонд оплаты труда)</h1></center>
<hr>
<form  method = "get" action = "<?= route_to('fot.report') ?>">
  <div class="form-inline">
	  <div class="form-group">
		<label for="startdate">Период&nbsp;&nbsp;</label>
		<input type="date" name = "startdate" class="form-control" id="startdate" required>
		<label for="enddate"></label>
		<input type="date" name = "enddate" class="form-control" id="enddate" required>
	  </div>
  
	  <div class="form-group">
		<label for="managers">&nbsp;&nbsp;Менеджер&nbsp;&nbsp;</label>
		<select class="form-control" name = "managers[]" id="managers" multiple="multiple" required>
			<?php foreach($allmanagers as $manag):?>
			<option value="<?=$manag['ID']?>"><?=$manag['NAME']?> <?=$manag['LAST_NAME']?></option>
		    <?php endforeach ?>
		</select>
	  </div>
	  
	  <div class="form-group">
		<label for="salary">&nbsp;&nbsp;Оклад&nbsp;&nbsp;</label>
		<input type="text" name = "salary" class="form-control" id="salary" value = "1250" pattern="[0-9]+">
	  </div>
	  
  </div> <hr>
  <h5>Премия за отгрузку</h5><br>
   <div class="form-inline">
    <div class="form-group">
		<label for="minShipmentPremium2">&nbsp;&nbsp;ОТ &nbsp;&nbsp;</label>
		<input type="text" name = "minShipmentPremium2" class="form-control" id="minShipmentPremium2" value = "0" pattern="[0-9]+" >
		
		<label for="maxShipmentPremium2">&nbsp;&nbsp;  ДО &nbsp;&nbsp;</label>
		<input type="text" name = "maxShipmentPremium2" class="form-control" id="maxShipmentPremium2" value = "399990" pattern="[0-9]+" >
	  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>2%</strong>
    </div>  
	<hr>
	
	<div class="form-inline">
    <div class="form-group">
		<label for="minShipmentPremium35">&nbsp;&nbsp;  ОТ &nbsp;&nbsp;</label>
		<input type="text" name = "minShipmentPremium35" class="form-control" id="minShipmentPremium35" value = "400000" pattern="[0-9]+" >
		
		<label for="maxShipmentPremium35">&nbsp;&nbsp; ДО &nbsp;&nbsp;</label>
		<input type="text" name = "maxShipmentPremium35" class="form-control" id="maxShipmentPremium35" value = "599990" pattern="[0-9]+" >
	  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>4%</strong>
    </div>
	<hr>
	
	<div class="form-inline">
    <div class="form-group">
		<label for="minShipmentPremium5">&nbsp;&nbsp;  ОТ &nbsp;&nbsp;</label>
		<input type="text" name = "minShipmentPremium5" class="form-control" id="minShipmentPremium5" value = "600000" pattern="[0-9]+">
		<label for="maxShipmentPremium5">&nbsp;&nbsp;  ДО &nbsp;&nbsp;</label>
		<input type="text" name = "maxShipmentPremium5" class="form-control" id="maxShipmentPremium5" value = "699990" pattern="[0-9]+">
	  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>5%</strong>
    </div>
	<hr>
	
	<div class="form-inline">
    <div class="form-group">
		<label for="minShipmentPremium55">&nbsp;&nbsp;  ОТ &nbsp;&nbsp;</label>
		<input type="text" name = "minShipmentPremium55" class="form-control" id="minShipmentPremium55" value = "700000" pattern="[0-9]+">
		<label for="maxShipmentPremium55">&nbsp;&nbsp;  ДО &nbsp;&nbsp;</label>
		<input type="text" name = "maxShipmentPremium55" class="form-control" id="maxShipmentPremium55" value = "799990" pattern="[0-9]+">
	  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>5.5%</strong>
    </div>
	<hr>
	
	<div class="form-inline">
    <div class="form-group">
		<label for="minShipmentPremium65">&nbsp;&nbsp;  ОТ &nbsp;&nbsp;</label>
		<input type="text" name = "minShipmentPremium65" class="form-control" id="minShipmentPremium65" value = "800000" pattern="[0-9]+">

	  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>6.5%</strong>
    </div>
	<hr>
	
	<div class="form-inline">
		<div class="form-group">
			<label for="callsQuantity">Количество звонков &nbsp;&nbsp;</label>
			<input type="text" name = "callsQuantity" class="form-control" id="callsQuantity" pattern="[0-9]+" value ="80" readonly  >
		</div>
    </div>
	<hr>
	<h5>Премия за % закрытия, руб.</h5><br>
	<div class="form-inline">
	  <div class="form-group">
        <label for="firstclosingPremium">&nbsp;&nbsp; Закрытие от 20% до 24.99%  &nbsp;</label>
		<input type="text" name = "firstclosingPremium" class="form-control" id="firstclosingPremium" placeholder = "Cумма премии" pattern="[0-9]+" value = "2000" readonly >
	  </div>
	</div>
	<hr>
	<div class="form-inline">
	  <div class="form-group">
		<label for="secondclosingPremium">&nbsp;&nbsp; Закрытие от 25% до 29.99%  &nbsp;</label>
		<input type="text" name = "secondclosingPremium" class="form-control" id="secondclosingPremium" placeholder = "Cумма премии" pattern="[0-9]+" value = "3500" readonly>
	  </div>
	</div> 
	<hr>
 	<div class="form-inline">
	  <div class="form-group">
		<label for="thirdclosingPremium">&nbsp;&nbsp; Закрытие от 30%  до 39.99% &nbsp;</label>
		<input type="text" name = "thirdclosingPremium" class="form-control" id="thirdclosingPremium" placeholder = "Cумма премии" pattern="[0-9]+" value = "5000" readonly>
	  </div>
    </div>
	<hr>
	<div class="form-inline">
	  <div class="form-group">
		<label for="fourclosingPremium">&nbsp;&nbsp; Закрытие более 40% &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<input type="text" name = "fourclosingPremium" class="form-control" id="fourclosingPremium" placeholder = "Cумма премии" pattern="[0-9]+" value = "8000" readonly>
	  </div>
    </div>
	<hr>
	<input type="submit" class="btn btn-primary mb-2" name = "submit" value = "Сформировать отчет">
</form>




<script type="text/javascript">
    $(document).ready(function() {
        $('#managers').multiselect();
    });
</script>
</div><?= $this->endSection() ?>

