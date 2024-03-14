<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<?php
use App\Services\ReportService;
use App\Services\UserService;
use App\Services\FotSupervisorService;
use App\Services\ShiftService;

if(isset($_GET['submit'])){
			$startdate = strip_tags(htmlspecialchars(trim($_GET['startdate']))); 
	        $enddate = strip_tags(htmlspecialchars(trim($_GET['enddate']))); 
			
			$managers = $_GET['managers']; 
			$sv = strip_tags(htmlspecialchars(trim($_GET['supervisor'])));
	        $salary = strip_tags(htmlspecialchars(trim($_GET['salary'])));
			
			$minShipmentPremium1 = strip_tags(htmlspecialchars(trim($_GET['minShipmentPremium1']))); 
            $maxShipmentPremium1 = strip_tags(htmlspecialchars(trim($_GET['maxShipmentPremium1'])));
			$minShipmentPremium2 = strip_tags(htmlspecialchars(trim($_GET['minShipmentPremium2'])));
			$maxShipmentPremium2 = strip_tags(htmlspecialchars(trim($_GET['maxShipmentPremium2'])));
			$minShipmentPremium3 = strip_tags(htmlspecialchars(trim($_GET['minShipmentPremium3'])));
			
			$firstclosingPremium = strip_tags(htmlspecialchars(trim($_GET['firstclosingPremium'])));
			$secondclosingPremium = strip_tags(htmlspecialchars(trim($_GET['secondclosingPremium'])));
			$thirdclosingPremium = strip_tags(htmlspecialchars(trim($_GET['thirdclosingPremium'])));
			
			$firstSVPremium = strip_tags(htmlspecialchars(trim($_GET['firstSVPremium'])));
			$secondSVPremium = strip_tags(htmlspecialchars(trim($_GET['secondSVPremium'])));
			$thirdSVPremium = strip_tags(htmlspecialchars(trim($_GET['thirdSVPremium'])));
			$fourSVPremium = strip_tags(htmlspecialchars(trim($_GET['fourSVPremium'])));
			
		$userService = new UserService();
		$managers = $userService->userGet($managers);
		$supervisor = $userService->supervisorGet($sv);
			
		}
?>
<div class ="container">
<a href="<?= route_to('fotsupervisor.index') ?>">На страницу формирования отчета</a>
<hr>
<h1>Отчет ФОТ за период : <?= $startdate?> - <?= $enddate?></h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Менеджер</th>
      <th scope="col">Количество смен</th>
      <th scope="col">Новая заявка</th>
	  <th scope="col">Количество сделок</th>
	  <th scope="col">% Закрытия</th>
	  <th scope="col">Сумма общая</th>
	  <th scope="col">Премия СВ от мен</th>
	</tr>
  </thead>
  <tbody>
      <?php
	    $totalsum = 0;
		$totalTotalsum = 0;
		$totalsvPremium = 0;
		$totalnewApplication = 0;
		$totalDealQuantity = 0;
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
		  
		  <!-- Премия СВ от мен -->
		  <td><?php
            $fotSupervisorService = new FotSupervisorService();
			$svPremium = $fotSupervisorService->svPremium($totalsum, $firstSVPremium, $secondSVPremium, $thirdSVPremium, $fourSVPremium);
			echo $svPremium;
			$totalsvPremium += $svPremium;;
		  ?></td>
		  <!-- -->
		  
		
		  
      </tr>
	 <?php
	    $totalsum = 0;
	  ?>
      <?php endforeach ?>
	  
	 
  </tbody>
</table>
<hr>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Супервайзер</th>
      <th scope="col">Количество смен</th>
      <th scope="col">Новая заявка</th>
	  <th scope="col">Количество сделок</th>
	  <th scope="col">% Закрытия</th>
	  <th scope="col">Сумма общая</th>
	  <th scope="col">Оклад СВ</th>
	  <th scope="col">Премия СВ отгрузки</th>
	  <th scope="col">Премия СВ % закрытия</th>
	  <th scope="col">Премия СВ от мен</th>
	  <th scope="col">Общая ФОТ СВ</th>
	</tr>
  </thead>
  <tbody>
      <?php
	    $totalsum = 0;
	  ?>
    
      <tr>
          <!-- Супервайзер-->
		  <td><?=$supervisor['NAME']?> <?=$supervisor['LAST_NAME']?></td>
		  <!-- -->
		  
		  <!-- Количество смен -->
		  <td><?php
		 // $ShiftService = new ShiftService();
		  $workingShiftSupervisor = $ShiftService->workingShift($supervisor['ID'], $startdate, $enddate);
		  echo $workingShiftSupervisor;
		  ?></td>
		  <!-- -->
		  
		  <!-- Новая заявка -->
		  <td><?php
		 
			//$newApplicationSupervisor = $ReportService->newRequest($supervisor['ID'], $startdate, $enddate);
			//echo $newApplicationSupervisor;
			echo $totalnewApplication;
			?></td>
		  <!-- -->
		  
		  <!-- Количество сделок -->
		  <td><?php
		    //$allSupervisor = $ReportService->all($supervisor['ID'], $startdate, $enddate);
		
			//echo count($allSupervisor); // + count($allRefund);
			echo $totalDealQuantity;
		    ?></td>
		  <!-- -->
		  
		  <!-- % Закрытия -->
		  <td><?php
		     if($totalnewApplication === 0){
			  $closingpercentSupervisor =  round((($totalDealQuantity) * 100), 2);
			  echo $closingpercentSupervisor;
			  } else{
			      $closingpercentSupervisor = round(((($totalDealQuantity)/$totalnewApplication) * 100), 2);
				  echo $closingpercentSupervisor;
			  }
          ?></td>
		  <!-- -->
		  
		  <!-- Сумма общая -->
		  <td><?php
		    echo $totalTotalsum;
		
           ?></td>
		  <!-- -->
		  
		  <!-- Оклад СВ -->
		  <td><?php
		        $svsalary =  $workingShiftSupervisor * $salary;
				echo $svsalary;
		      ?></td>
		  <!-- -->
		  
		  <!-- Премия СВ отгрузки-->
		  <td><?php
		      $shipmentPremiumSv =  $fotSupervisorService->shipmentPremiumSv($totalTotalsum, $minShipmentPremium1,
			                        $maxShipmentPremium1, $minShipmentPremium2, $maxShipmentPremium2,
	                                $minShipmentPremium3);
			    echo $shipmentPremiumSv;
		      ?></td>
		  <!-- -->
		  
		  <!-- Премия СВ % закрытия-->
		  <td><?php
		      $svClosingPremium =  $fotSupervisorService->svClosingPremium($closingpercentSupervisor, $firstclosingPremium,
			                       $secondclosingPremium, $thirdclosingPremium);
				echo $svClosingPremium;				   
		      ?></td>
		  <!-- -->
		  
		  
		  <!-- Премия СВ от мен -->
		  <td><?php
           
			echo $totalsvPremium;
		  ?></td>
		  <!-- -->
		  
		<!-- Общая ФОТ СВ-->
		  <td><?php
		      echo $svsalary + $shipmentPremiumSv + $svClosingPremium + $totalsvPremium;
		      ?></td>
		  <!-- -->
		  
      </tr>
	 <?php
	    $totalsum = 0;
	  ?>
     
	  
	 
  </tbody>
</table>

</div>
</div><?= $this->endSection() ?>