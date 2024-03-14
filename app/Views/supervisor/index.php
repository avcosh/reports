<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<div class ="container">
<center><h1>Отчет ФОТ Супервайзеры</h1></center>
<hr>
<form  method = "get" action = "<?= route_to('fotsupervisor.report') ?>">
  <div class="form-inline">
	  <div class="form-group">
		<label for="startdate">Период&nbsp;&nbsp;</label>
		<input type="date" name = "startdate" class="form-control" id="startdate" required>
		<label for="enddate"></label>
		<input type="date" name = "enddate" class="form-control" id="enddate" required>
	  </div>
	  
	  <div class="form-group">
		<label for="supervisors">&nbsp;&nbsp;Супервайзер&nbsp;&nbsp;</label>
		<select class="form-control" name = "supervisor" id="supervisor" required>
			<?php foreach($supervisors as $supervisor):?>
			<option value="<?=$supervisor['ID']?>"><?=$supervisor['NAME']?> <?=$supervisor['LAST_NAME']?></option>
		    <?php endforeach ?>
		</select>
	  </div>
  
	  <div class="form-group">
		<label for="managers">&nbsp;&nbsp;Смена&nbsp;&nbsp;</label>
		<select class="form-control" name = "managers[]" id="managers" multiple="multiple" required>
			<?php foreach($allmanagers as $manag):?>
			<option value="<?=$manag['ID']?>"><?=$manag['NAME']?> <?=$manag['LAST_NAME']?></option>
		    <?php endforeach ?>
		</select>
	  </div>
	 
	  <div class="form-group">
		<label for="salary">&nbsp;&nbsp;Оклад&nbsp;&nbsp;</label>
		<input type="text" name = "salary" class="form-control" id="salary" value = "2000" pattern="[0-9]+">
	  </div>
	  
  </div> <hr>
  <h5>Премия отгрузки</h5><br>
   <div class="form-inline">
    <div class="form-group">
		<label for="minShipmentPremium1">&nbsp;&nbsp; 0.1% &nbsp;&nbsp; от &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<input type="text" name = "minShipmentPremium1" class="form-control" id="minShipmentPremium1" value = "0" pattern="[0-9]+" readonly>
		<label for="maxShipmentPremium1">&nbsp;&nbsp;  до&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<input type="text" name = "maxShipmentPremium1" class="form-control" id="maxShipmentPremium1" value = "1999999" pattern="[0-9]+" readonly>
	  </div>
    </div>
	<br>
	<div class="form-inline">
    <div class="form-group">
		<label for="minShipmentPremium2">&nbsp;&nbsp; 0.2% &nbsp;&nbsp; от &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<input type="text" name = "minShipmentPremium2" class="form-control" id="minShipmentPremium2" value = "2000000" pattern="[0-9]+" readonly>
		<label for="maxShipmentPremium2">&nbsp;&nbsp;  до &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<input type="text" name = "maxShipmentPremium2" class="form-control" id="maxShipmentPremium2" value = "3499999" pattern="[0-9]+" readonly>
	  </div>
    </div>
	<br>
	<div class="form-inline">
    <div class="form-group">
		<label for="minShipmentPremium3">&nbsp;&nbsp; 0.3% &nbsp;&nbsp; от &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<input type="text" name = "minShipmentPremium3" class="form-control" id="minShipmentPremium3" value = "3500000" pattern="[0-9]+" readonly>
		<!--<label for="maxShipmentPremium5">&nbsp;&nbsp;  ДО &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<input type="text" name = "maxShipmentPremium5" class="form-control" id="maxShipmentPremium5" value = "5000000" pattern="[0-9]+">-->
	  </div>
    </div>
	<hr>
	
	<h5>Премия % закрытия</h5><br>
      <div class="form-inline">
	  <div class="form-group">
        <label for="firstclosingPremium">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; от 20% до 24.99%  &nbsp;</label>
		<input type="text" name = "firstclosingPremium" class="form-control" id="firstclosingPremium" placeholder = "Cумма премии" pattern="[0-9]+" value = "2000" readonly  >
		<label for="secondclosingPremium">&nbsp;&nbsp;&nbsp; от 25% до 29.99%  &nbsp;</label>
		<input type="text" name = "secondclosingPremium" class="form-control" id="secondclosingPremium" placeholder = "Cумма премии" pattern="[0-9]+" value = "5000" readonly >
		<label for="thirdclosingPremium">&nbsp;&nbsp;&nbsp;  от 30%   &nbsp;</label>
		<input type="text" name = "thirdclosingPremium" class="form-control" id="thirdclosingPremium" placeholder = "Cумма премии" pattern="[0-9]+" value = " 8000" readonly >
	  </div>
    </div>
	<hr>
	
	<h5>Премия СВ от менеджера</h5><br>
	<div class="form-inline">
	  <div class="form-group">
        <label for="firstSVPremium">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; от 400000 до 599999  &nbsp;</label>
		<input type="text" name = "firstSVPremium" class="form-control" id="firstSVPremium" placeholder = "Cумма премии" pattern="[0-9]+" value = "2000" readonly >
		<label for="secondSVPremium">&nbsp;&nbsp;&nbsp; от 600000 до 699999  &nbsp;</label>
		<input type="text" name = "secondSVPremium" class="form-control" id="secondSVPremium" placeholder = "Cумма премии" pattern="[0-9]+" value = "4000" readonly>
		
	  </div>
    </div>
	<br>
	<div class="form-inline">
	  <div class="form-group">
	    <label for="thirdSVPremium">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  от 700000 до 799999   &nbsp;</label>
		<input type="text" name = "thirdSVPremium" class="form-control" id="thirdSVPremium" placeholder = "Cумма премии" pattern="[0-9]+" value = "6000" readonly>
		<label for="fourSVPremium">&nbsp;&nbsp;&nbsp;  от 800000 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<input type="text" name = "fourSVPremium" class="form-control" id="fourSVPremium" placeholder = "Cумма премии" pattern="[0-9]+" value = "8000" readonly>
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

