<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<?php
use App\Services\ShiftService;

$shiftService = new ShiftService;
?>

<div class ="container">
<a href="<?= route_to('workedshifts.index') ?>">На страницу формирования отчета</a>
<hr>
<h1>Отчет вывод фактически отработанных смен за период : <?= $startDate?> - <?= $endDate?></h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Менеджер</th>
      <?php foreach($datesForReport as $date):?>
	  <th><?=$date?></th>
	    <?php endforeach ?>
	  <th>Итого смен</th>
	</tr>
  </thead>
  <tbody>
  <?php
    $totalShifts = 0;
  ?>
  <?php foreach($managers as $manager):?>
  <tr>
      <!-- Менеджер-->
	  <td><?=$manager['NAME']?> <?=$manager['LAST_NAME']?></td>
	  <!-- -->
	  
	  <!-- "Нет" если смены небыло, "Да", если смена была -->
	   <?php foreach($datesForReport as $date):?>
	  <td><?php $isShift =  $shiftService->isWorkingDay($manager['ID'], $date);
	      echo $isShift;
		  $totalShifts += $isShift;
	  ?>
	  </td>
	  <?php endforeach ?>
	  <!-- -->
	  
	  <td><?=$totalShifts?></td>
  </tr>
  
	<?php
	$totalShifts = 0;
	?>

  <?php endforeach ?>
  
  </tbody>
</table>
</div>

<?= $this->endSection() ?>