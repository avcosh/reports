<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<?php
use App\Services\DealsregionService;

if(isset($_GET['submit'])){
			$startdate = strip_tags(htmlspecialchars(trim($_GET['startdate']))); 
	        $enddate = strip_tags(htmlspecialchars(trim($_GET['enddate']))); 
			
			$dealsregionService = new DealsregionService();
			
			if(!isset($_GET['regions'])){
				$regions = $dealsregionService->getAllRegions();
			}else{
				$regions = $_GET['regions'];  
                $regions = $dealsregionService->getRegions($regions);
				
			}
		}
?>

<div class ="container">
<a href="<?= route_to('dealsregion.index') ?>">На страницу формирования отчета</a>
<hr>
<h1>Отчет сделки по регионам : <?= $startdate?> - <?= $enddate?></h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Регион</th>
      <th scope="col">Общая сумма</th>
      <th scope="col">Кол-во сделок</th>
	  <th scope="col">Сделка ППК</th>
	  <th scope="col">Сделка РО</th>
	  <th scope="col">Сделка КО5</th>
	  <th scope="col">Сделка ЭНД</th>
	  <th scope="col">Прочие услуги</th>
	  <th scope="col">Сумма ППК</th>
	  <th scope="col">Сумма РО</th>
	  <th scope="col">Сумма КО5</th>
	  <th scope="col">Сумма ЭНД</th>
	  <th scope="col">Сумма прочие услуги</th>
	</tr>
  </thead>
  <tbody>
    <?php
	  $ppksum = 0;
	  $rosum = 0;
	  $ko5sum = 0;
	  $endsum = 0;
	  $allsum = 0;
	  
	  $itogppk = 0;
	  $itogro = 0;
	  $itogko5 = 0;
	  $itogend = 0;
	  $itogother = 0;
	  $itogall = 0;
	  
	  $itogppksum = 0;
	  $itogrosum = 0;
	  $itogko5sum = 0;
	  $itogendsum = 0;
	  $itogallsum = 0;
	  $itogothersum = 0;
	?>
  <?php foreach($regions as $region):?>
  <tr>
      <!-- Регион-->
	  <td><?=$region['VALUE']?></td>
	  <!-- -->
	  
	  <!-- Общая сумма-->
	  <td><?php
	      $dealsregionService = new DealsregionService();
	      $all =  $dealsregionService->all($region['ID'], $startdate, $enddate); 
		  foreach($all as $total){
				$allsum += $total['OPPORTUNITY'];
			  }
		  echo $allsum;
		  $itogallsum += $allsum;
		  
		  ?>
	  </td>
	  <!-- -->
	  
	  <!-- Кол-во сделок-->
	  <td>
	      <?php
	          echo count($all);
			  $itogall += count($all);
	      ?>
	  </td>
	  <!-- -->
	  
	  <!-- Кол-во Сделка ППК-->
	  <td>
	      <?php
	      $dealsregionService = new DealsregionService();
	      $ppk =  $dealsregionService->ppk($region['ID'], $startdate, $enddate);
		  echo count($ppk);
		  $itogppk += count($ppk);
	      ?>
	  </td>
	  <!-- -->
	  
	  <!-- Кол-во Сделка РО-->
	  <td>
	      <?php
	      $dealsregionService = new DealsregionService();
	      $ro =  $dealsregionService->ro($region['ID'], $startdate, $enddate);
		  echo count($ro);
		  $itogro += count($ro);
	      ?>
	  </td>
	  <!-- -->
	  
	  <!-- Кол-во Сделка КО5-->
	  <td>
	      <?php
	      $dealsregionService = new DealsregionService();
	      $ko5 =  $dealsregionService->ko5($region['ID'], $startdate, $enddate);
		  echo count($ko5);
		  $itogko5 += count($ko5);
	      ?>
	  </td>
	  <!-- -->
	  
	  <!-- Кол-во Сделка ЭНД-->
	  <td>
	      <?php
	      $dealsregionService = new DealsregionService();
	      $end =  $dealsregionService->end($region['ID'], $startdate, $enddate);
		  echo count($end);
		  $itogend += count($end);
	      ?>
	  </td>
	  <!-- -->
	  
	  <!-- Кол-во Прочие услуги-->
	  <td>
	      <?php
	      echo count($all) - (count($ppk) + count($ro) + count($ko5) + count($end));
		  $itogother += count($all) - (count($ppk) + count($ro) + count($ko5) + count($end));
	      ?>
	  </td>
	  <!-- -->
	  
	  <!-- Сумма ППК-->
	  <td><?php
	        foreach($ppk as $sum1){
				$ppksum += $sum1['OPPORTUNITY'];
			}
			echo $ppksum;
			$itogppksum += $ppksum;
		  
	      ?></td>
	  <!-- -->
	  
	  <!--Сумма РО -->
	  <td>
	      <?php
	        foreach($ro as $sum2){
				$rosum += $sum2['OPPORTUNITY'];
			}
			echo $rosum;
			$itogrosum += $rosum;
		  
	      ?>
	  </td>
	  <!-- -->
	  
	  <!-- Сумма КО5-->
	  <td>
	      <?php
	        foreach($ko5 as $sum3){
				$ko5sum += $sum3['OPPORTUNITY'];
			}
			echo $ko5sum;
			$itogko5sum += $ko5sum;
		  
	      ?>
	  </td>
	  <!-- -->
	  
	  <!-- Сумма ЭНД-->
	  <td>
	      <?php
	        foreach($end as $sum4){
				$endsum += $sum4['OPPORTUNITY'];
			}
			echo $endsum;
			$itogendsum += $endsum;
		  
	      ?>
	  </td>
	  <!-- -->
	  
	  <!-- Сумма Прочие усдуги-->
	  <td><?php
	        echo $allsum - ($ppksum + $rosum + $ko5sum + $endsum );
			$itogothersum += $allsum - ($ppksum + $rosum + $ko5sum + $endsum  );
	      ?>
	  </td>
	  <!-- -->
	  
  </tr>
  <?php
      $ppksum = 0;
	  $rosum = 0;
	  $ko5sum = 0;
	  $endsum = 0;
	  $allsum = 0;
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
	<td class = 'text-primary'><?=$itogother?></td>
	<td class = 'text-primary'><?=$itogppksum?></td>
	<td class = 'text-primary'><?=$itogrosum?></td>
	<td class = 'text-primary'><?=$itogko5sum?></td>
	<td class = 'text-primary'><?=$itogendsum?></td>
	<td class = 'text-primary'><?=$itogothersum?></td>

  </tr>
  </tbody>
</table>
</div>

<?= $this->endSection() ?>