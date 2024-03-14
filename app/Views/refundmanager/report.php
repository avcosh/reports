<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<?php
use App\Services\RefundManagerService; 
use App\Services\ReportService;
?>

<div class ="container">
<a href="<?= route_to('refundmanager.index') ?>">На страницу формирования отчета</a>
<hr>
<h1>Отчет возвраты по менеджерам : <?= $startDate?> - <?= $endDate?></h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Менеджер</th>
      <th scope="col">Возврат сумма</th>
      <th scope="col">Возврат кол-во сделок</th>
	  <th scope="col">Возврат ППК</th>
	  <th scope="col">Возват РО</th>
	  <th scope="col">Возврат КО5</th>
	  <th scope="col">Возврат ЭНД</th>
	  <th scope="col">Возврат ЭП</th>
	  <th scope="col">Возврат прочие услуги</th>
	  <th scope="col">Сумма возвратов ППК</th>
	  <th scope="col">Сумма возвратов РО</th>
	  <th scope="col">Сумма возвратов КО5</th>
	  <th scope="col">Сумма возвратов ЭНД</th>
	  <th scope="col">Сумма возвратов ЭП</th>
	  <th scope="col">Сумма возвратов ПУ</th>
	  <th scope="col">Итого сделок</th>
	  <th scope="col">% возврата</th>
	  <th scope="col">Итого сумма</th>
	</tr>
  </thead>
  <tbody>
    <?php
	  $refundManagerService = new RefundManagerService();
	  $reportService = new ReportService();
	  
	  $ppksum = 0;
	  $rosum = 0;
	  $ko5sum = 0;
	  $endsum = 0;
	  $epsum = 0;
	  $allsum = 0;
	  
	  $itogppk = 0;
	  $itogro = 0;
	  $itogko5 = 0;
	  $itogend = 0;
	  $itogep = 0;
	  $itogother = 0;
	  $itogall = 0;
	  
	  $itogppksum = 0;
	  $itogrosum = 0;
	  $itogko5sum = 0;
	  $itogendsum = 0;
	  $itogepsum = 0;
	  $itogallsum = 0;
	  $itogothersum = 0;
	 
	  
	  $alldealssum = 0;
	  $itogtotalsum = 0;
	  
	  $itogdealsquantity = 0;
	?>
  <?php foreach($managers as $manager):?>
  <tr>
      <!-- Менеджер-->
	  <td><?=$manager['NAME']?> <?=$manager['LAST_NAME']?></td>
	  <!-- -->
	  
	  <!-- Возврат сумма-->
	  <td><?php
	   
	      $all =  $refundManagerService->all($manager['ID'], $startDate, $endDate);
		  foreach($all as $total){
				$allsum += $total['OPPORTUNITY'];
			  }
		  echo $allsum;
		  $itogallsum += $allsum;
		  
		  ?>
	  </td>
	  <!-- -->
	  
	  <!-- Возврат Кол-во сделок-->
	  <td>
	      <?php
	          echo count($all);
			  $itogall += count($all);
	      ?>
	  </td>
	  <!-- -->
	  
	  <!-- Возврат ППК-->
	  <td>
	      <?php
	      $ppkRefund =  $refundManagerService->ppk($manager['ID'], $startDate, $endDate);
		  echo count($ppkRefund);
		  $itogppk += count($ppkRefund);
	      ?>
	  </td>
	  <!-- -->
	  
	  <!-- Возврат РО-->
	  <td>
	      <?php
	      $roRefund =  $refundManagerService->ro($manager['ID'], $startDate, $endDate);
		  echo count($roRefund);
		  $itogro += count($roRefund);
	      ?>
	  </td>
	  <!-- -->
	  
	  <!-- Возврат КО5-->
	  <td>
	      <?php
	      $ko5Refund =  $refundManagerService->ko5($manager['ID'], $startDate, $endDate);
		  echo count($ko5Refund);
		  $itogko5 += count($ko5Refund);
	      ?>
	  </td>
	  <!-- -->
	  
	  <!-- Возврат ЭНД-->
	  <td>
	      <?php
	      $endRefund =  $refundManagerService->end($manager['ID'], $startDate, $endDate);
		  echo count($endRefund);
		  $itogend += count($endRefund);
	      ?>
	  </td>
	  <!-- -->
	  
	  <!-- Возврат ЭП-->
	  <td>
	      <?php
	      $epRefund =  $refundManagerService->ep($manager['ID'], $startDate, $endDate);
		  echo count($epRefund);
		  $itogep += count($epRefund);
	      ?>
	  </td>
	  <!-- -->
	  
	  <!-- Возврат Прочие услуги-->
	  <td>
	      <?php
	      echo count($all) - (count($ppkRefund) + count($roRefund) + count($ko5Refund) + count($endRefund));
		  $itogother += count($all) - (count($ppkRefund) + count($roRefund) + count($ko5Refund) + count($endRefund));
	      ?>
	  </td>
	  <!-- -->
	  
	  <!-- Сумма Возвата ППК-->
	  <td><?php
	        foreach($ppkRefund as $sum1){
				$ppksum += $sum1['OPPORTUNITY'];
			}
			echo $ppksum;
			$itogppksum += $ppksum;
		  
	      ?></td>
	  <!-- -->
	  
	  <!--Сумма Возврата РО -->
	  <td>
	      <?php
	        foreach($roRefund as $sum2){
				$rosum += $sum2['OPPORTUNITY'];
			}
			echo $rosum;
			$itogrosum += $rosum;
		  
	      ?>
	  </td>
	  <!-- -->
	  
	  <!-- Сумма Возврата КО5-->
	  <td>
	      <?php
	        foreach($ko5Refund as $sum3){
				$ko5sum += $sum3['OPPORTUNITY'];
			}
			echo $ko5sum;
			$itogko5sum += $ko5sum;
		  
	      ?>
	  </td>
	  <!-- -->
	  
	  <!-- Сумма Возврата ЭНД-->
	  <td>
	      <?php
	        foreach($endRefund as $sum4){
				$endsum += $sum4['OPPORTUNITY'];
			}
			echo $endsum;
			$itogendsum += $endsum;
		  
	      ?>
	  </td>
	  <!-- -->
	  
	  <!-- Сумма Возврата ЭП-->
	  <td>
	      <?php
	        foreach($epRefund as $sum5){
				$epsum += $sum5['OPPORTUNITY'];
			}
			echo $epsum;
			$itogepsum += $epsum;
		  
	      ?>
	  </td>
	  <!-- -->
	  
	  <!-- Сумма Возврата Прочие усдуги-->
	  <td><?php
	        echo $allsum - ($ppksum + $rosum + $ko5sum + $endsum );
			$itogothersum += $allsum - ($ppksum + $rosum + $ko5sum + $endsum  );
	      ?>
	  </td>
	  <!-- -->
	  
	  <!-- Итого сделок-->
	  <td><?php
	      $allDealsQuantuty =  $reportService->all($manager['ID'], $startDate, $endDate);
		  echo count($allDealsQuantuty) + count($all);
		  $itogdealsquantity +=  count($allDealsQuantuty) + count($all);
	  ?>
	  </td>
	  <!-- -->
	  
	  <!-- % Возврата-->
	  <td><?php 
	      if((count($allDealsQuantuty) + count($all)) === 0){
			  echo round(((count($allDealsQuantuty) + count($all)) * 100), 2);
		  }else{
			echo round((count($all) / (count($allDealsQuantuty) + count($all)) * 100), 2); 
		  }
	     
	  ?></td>
	  <!-- -->
	  
	  <!-- Итого сумма-->
	  <td><?php 
	      foreach($allDealsQuantuty as $totaldeals){
				$alldealssum += $totaldeals['OPPORTUNITY'];
			  }
		  echo $alldealssum + $allsum;
		  
		  $itogtotalsum += $alldealssum + $allsum;
	  ?></td>
	  <!-- -->
	  
  </tr>
  <?php
      $ppksum = 0;
	  $rosum = 0;
	  $ko5sum = 0;
	  $endsum = 0;
	  $epsum = 0;
	  $allsum = 0;
	  $alldealssum = 0;
	 
  ?>
  <?php endforeach ?>
  <tr>
	<th>Итого:</th>
	<td class = 'text-primary'><?=$itogallsum?></td>
	<td class = 'text-primary'><?=$itogall?></td>
	<td class = 'text-primary'><?=$itogppk?></td>
	<td class = 'text-primary'><?=$itogro?></td>
	<td class = 'text-primary'><?=$itogko5?></td>
	<td class = 'text-primary'><?=$itogend?></td>
	<td class = 'text-primary'><?=$itogep?></td>
	<td class = 'text-primary'><?=$itogother?></td>
	<td class = 'text-primary'><?=$itogppksum?></td>
	<td class = 'text-primary'><?=$itogrosum?></td>
	<td class = 'text-primary'><?=$itogko5sum?></td>
	<td class = 'text-primary'><?=$itogendsum?></td>
	<td class = 'text-primary'><?=$itogepsum?></td>
	<td class = 'text-primary'><?=$itogothersum?></td>
	<td class = 'text-primary'><?=$itogdealsquantity?></td>
	<td class = 'text-primary'><?php
	                           if($itogdealsquantity === 0){
								echo "0";   
							   }else{
								echo round(($itogall / $itogdealsquantity) * 100, 2);   
							   }
	                           
	?></td>
	<td class = 'text-primary'><?=$itogtotalsum?></td>

  </tr>
  </tbody>
</table>
</div>

<?= $this->endSection() ?>