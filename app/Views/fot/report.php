<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<?php
use App\Services\ReportService;
use App\Services\UserService;
use App\Services\FotService;
use App\Services\ShiftService;

if(isset($_GET['submit'])){
			$startdate = strip_tags(htmlspecialchars(trim($_GET['startdate']))); 
	        $enddate = strip_tags(htmlspecialchars(trim($_GET['enddate']))); 
			
			$managers = $_GET['managers']; 
	        $salary = strip_tags(htmlspecialchars(trim($_GET['salary'])));
			
			$minShipmentPremium2 = strip_tags(htmlspecialchars(trim($_GET['minShipmentPremium2']))); 
            $maxShipmentPremium2 = strip_tags(htmlspecialchars(trim($_GET['maxShipmentPremium2'])));
			$minShipmentPremium35 = strip_tags(htmlspecialchars(trim($_GET['minShipmentPremium35'])));
			$maxShipmentPremium35 = strip_tags(htmlspecialchars(trim($_GET['maxShipmentPremium35'])));
			$minShipmentPremium5 = strip_tags(htmlspecialchars(trim($_GET['minShipmentPremium5'])));
			$maxShipmentPremium5 = strip_tags(htmlspecialchars(trim($_GET['maxShipmentPremium5'])));
			$minShipmentPremium55 = strip_tags(htmlspecialchars(trim($_GET['minShipmentPremium55'])));
			$maxShipmentPremium55 = strip_tags(htmlspecialchars(trim($_GET['maxShipmentPremium55'])));
			$minShipmentPremium65 = strip_tags(htmlspecialchars(trim($_GET['minShipmentPremium65'])));
			
			$callsQuantity = strip_tags(htmlspecialchars(trim($_GET['callsQuantity'])));
			$firstclosingPremium = strip_tags(htmlspecialchars(trim($_GET['firstclosingPremium'])));
			$secondclosingPremium = strip_tags(htmlspecialchars(trim($_GET['secondclosingPremium'])));
			$thirdclosingPremium = strip_tags(htmlspecialchars(trim($_GET['thirdclosingPremium'])));
			$fourclosingPremium = strip_tags(htmlspecialchars(trim($_GET['fourclosingPremium'])));
		$userService = new UserService();
		$managers = $userService->userGet($managers);
		
			
		}
?>
<div class ="container">
<a href="<?= route_to('fot.index') ?>">На страницу формирования отчета</a>
<hr>
<h1>Отчет ФОТ за период : <?= $startdate?> - <?= $enddate?></h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Менеджер отдела продаж</th>
      <th scope="col">Количество смен</th>
      <th scope="col">Новая заявка</th>
	  <th scope="col">Количество сделок</th>
	  <th scope="col">% Закрытия</th>
	  <th scope="col">Сумма общая</th>
	  <th scope="col">Оклад</th>
	  <th scope="col">Премия отгрузки</th>
	  <th scope="col">Премия % Закрытия</th>
	  <th scope="col">Общая ФОТ</th>
	</tr>
  </thead>
  <tbody>
      <?php
	    $i = 0;
	    $totalsum = 0;
		$totalworkingShift = 0;
		$totalnewApplication = 0;
		$totalDealQuantity = 0;
		$totalTotalsum = 0;
		$totalSalary = 0;
		$totalShipmentPremium = 0;
		$totalClosingPremium = 0;
		$totalFot = 0;
	  ?>
      <?php foreach($managers as $manager):?>
      <tr>
          <!-- Менеджер отдела продаж-->
		  <td><?=$manager['NAME']?> <?=$manager['LAST_NAME']?></td>
		  <!-- -->
		  
		  <!-- Количество смен -->
		  <td><?php
		  $ShiftService = new ShiftService();
		  $workingShift = $ShiftService->workingShift($manager['ID'], $startdate, $enddate);
		  echo $workingShift;
		  $totalworkingShift += $workingShift;
		  ?></td>
		  <!-- -->
		  
		  <!-- Новая заявка -->
		  <td><?php
		    $ReportService = new ReportService();
			$newApplication = $ReportService->newRequest($manager['ID'], $startdate, $enddate);
			echo $newApplication;
			$totalnewApplication += $newApplication;
		  ?></td>
		  <!-- -->
		  
		  <!-- Количество сделок -->
		  <td><?php
		    $all = $ReportService->all($manager['ID'], $startdate, $enddate);
			$allRefund = $ReportService->allRefund($manager['ID'], $startdate, $enddate);
			echo count($all) + count($allRefund);
		
			$totalDealQuantity += (count($all) + count($allRefund));
		  ?></td>
		  <!-- -->
		  
		  <!-- % Закрытия -->
		  <td><?php
		     if($newApplication === 0){
			  $closingpercent =  round(((count($all)  + count($allRefund)) * 100), 2);
			  echo $closingpercent;
			  } else{
			      $closingpercent = round((((count($all)  + count($allRefund))/$newApplication) * 100), 2);
				  echo $closingpercent;
			  }
          ?></td>
		  <!-- -->
		  
		  <!-- Сумма общая -->
		  <td><?php
		    foreach($all as $total){
				$totalsum += $total['OPPORTUNITY'];
			  }
			foreach($allRefund as $totalRefund){
				$totalsum += $totalRefund['OPPORTUNITY'];
			  }
			echo $totalsum;
			$totalTotalsum += $totalsum;
           ?></td>
		  <!-- -->
		  
		  <!-- Оклад -->
		  <td><?php
            echo $salary * $workingShift;
			$totalSalary += ($salary * $workingShift);
		  ?></td>
		  <!-- -->
		  
		  <!-- Премия отгрузки -->
		  <td><?php
            $fotService = new FotService();
			$shipmentPremium = $fotService->shipmentPremium($totalsum, $minShipmentPremium2, $maxShipmentPremium2,
		        $minShipmentPremium35, $maxShipmentPremium35, $minShipmentPremium5, $maxShipmentPremium5,
				$minShipmentPremium55, $maxShipmentPremium55, $minShipmentPremium65);
			echo $shipmentPremium;
			$totalShipmentPremium += $shipmentPremium;
		  ?></td>
		  <!-- -->
		  
		  <!-- Премия % Закрытия -->
		  <td><?php
             $closingPremium = $fotService->closingPremium($newApplication, $callsQuantity, $closingpercent, $firstclosingPremium,
            	    $secondclosingPremium, $thirdclosingPremium, $fourclosingPremium);
			 echo $closingPremium;
			 $totalClosingPremium += $closingPremium;
		  ?></td>
		  <!-- -->
		  
		  <!-- Общая ФОТ -->
		  <td><?php
            echo (($salary * $workingShift) + $shipmentPremium + $closingPremium);
			$totalFot += (($salary * $workingShift) + $shipmentPremium + $closingPremium);
		  ?></td>
		  <!-- -->
		  
      </tr>
	  <?php
	    $totalsum = 0;
		
		$i++;
	  ?>
      <?php endforeach ?>
	  
	  <tr>
	      <th>Итого:</th>
		  <!-- Итого Количество смен -->
		  <td class = 'text-primary'><?= $totalworkingShift?></td>
		  <!-- -->
		  
		  <!-- Итого Новая заявка-->
		  <td class = 'text-primary'><?= $totalnewApplication ?></td>
		  <!-- -->
		  
		  <!-- Итого Количество сделок-->
		  <td class = 'text-primary'><?= $totalDealQuantity ?></td>
		  <!-- -->
		  
		  <!-- Итого % Закрытия-->
		  <td class = 'text-primary'><?php 
		      if($totalnewApplication === 0){
			    echo round($totalDealQuantity * 100, 2);}else
			    {echo round(($totalDealQuantity / $totalnewApplication) * 100, 2);}
		  ?></td>
		  <!-- -->
		  
		  <!-- Итого Сумма общая-->
		  <td class = 'text-primary'><?= $totalTotalsum ?></td>
		  <!-- -->
		  
		  <!-- Итого Оклад-->
		  <td class = 'text-primary'><?= $totalSalary ?></td>
		  <!-- -->
		  
		  <!-- Итого Премия отгрузки-->
		  <td class = 'text-primary'><?= $totalShipmentPremium ?></td>
		  <!-- -->
		  
		  <!-- Итого Премия % Закрытия-->
		  <td class = 'text-primary'><?= $totalClosingPremium ?></td>
		  <!-- -->
		  
		  <!-- Итого Общая ФОТ-->
		  <td class = 'text-primary'><?= $totalFot ?></td>
		  <!-- -->
	  </tr>
  </tbody>
</table>

</div>
</div><?= $this->endSection() ?>