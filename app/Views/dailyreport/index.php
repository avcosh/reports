<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<?php
use App\Services\ReportService;
use App\Services\UserService;

$date1 = date('Y-m-d');
$date2 = date('Y-m-d');
$users = [];
$uvol = null;

if(isset($_GET['submit'])){
	$date1 = strip_tags(htmlspecialchars(trim($_GET['date']))); 
	$date2 = strip_tags(htmlspecialchars(trim($_GET['date']))); 
	
	if(!empty($_GET['users'])){
	    $users = $_GET['users']; $users;
	}
	
	if(!empty($_GET['date1'])){
		$date1 = strip_tags(htmlspecialchars(trim($_GET['date1'])));
	}
	
	if(!empty($_GET['date2'])){
		$date2 = strip_tags(htmlspecialchars(trim($_GET['date2'])));
	}
	
	if(!empty($_GET['uvol'])){
		$uvol = strip_tags(htmlspecialchars(trim($_GET['uvol'])));
	}
	
	$userService = new UserService();
	$managers = $userService->userGet($users, $uvol);
	$allmanagers = $userService->alluserGet($uvol);
}



?>

<h1>Отчет по сделкам менеджеров</h1>
<hr>
<form class="form-inline" method = "get" action = "">
    <label class="my-1 mr-2" for="period">Отчетный период за &nbsp;
	<?php
	    if($date1 == date('Y-m-d')){
		    echo "<span class = 'text-primary'> Сегодня </span>";
		}elseif($date1 == 'YESTERDAY'){
			echo "<span class = 'text-primary'> Вчера </span>";
		}elseif(!empty($_GET['date1']) && !empty($_GET['date2'])){
			echo "<span class = 'text-primary'>" . $date1 . " - " . $date2 . "</span>";
			
		}
		
		
    ?></label>
	  <select class="custom-select my-1 mr-sm-2" id="period" name = "date">
	    <option value="<?=date('Y-m-d');?>">Сегодня</option>
		<option value="YESTERDAY" <?=$date1 == 'YESTERDAY'? "selected" : "" ?>>Вчера</option>
		<option value="diapazon" <?=(!empty($_GET['date1'])) ? "selected" : "" ?>>Диапазон</option>
	  </select>
	  
	  <label for="validationCustom02" class="form-label"><strong>Выбрать менеджеров &nbsp;</strong></label>
  
	<select name = "users[]" id="example-getting-started" multiple="multiple">
		<?php foreach($allmanagers as $manag):?>
		<option value="<?=$manag['ID']?>" <?=(!empty($_GET['users'])) && in_array($manag['ID'], $users) 
		? "selected" : "" ?>><?=$manag['NAME']?> <?=$manag['LAST_NAME']?></option>
		<?php endforeach ?>
	</select>
	
	&nbsp;
	<label for="" class="form-label"><strong>Показать уволенных &nbsp;</strong></label>
	<input type="checkbox" name="uvol" value="130" <?=(!empty($_GET['uvol'])) ? "checked" : "" ?>>
	  
	  <div class = "date-input" style="display:none;">
          <input type="date" name = "date1" >
		  <input type="date" name = "date2" >
      </div>
	  &nbsp;&nbsp;&nbsp; 
    <input type="submit" class="btn btn-primary mb-2" name = "submit" value = "Сформировать отчет">
</form>

<hr>

<?php //dd($managers)?>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Менеджер отдела продаж</th>
      <th scope="col">Новая заявка</th>
      <th scope="col">Сделка ППК</th>
	  <th scope="col">Сделка РО</th>
	  <th scope="col">Сделка КО5</th>
	  <th scope="col">Сделка ЭНД</th>
	  <th scope="col">Сделка ЭП</th>
	  <th scope="col">Прочие услуги</th>
	  <th scope="col">Сумма ППК</th>
	  <th scope="col">Сумма РО</th>
	  <th scope="col">Сумма КО5</th>
	  <th scope="col">Сумма ЭнД</th>
	  <th scope="col">Сумма ЭП</th>
	  <th scope="col">Сумма прочих услуг</th>
	  <th scope="col">Количество сделок</th>
	  <th scope="col">% закрытия</th>
	  <th scope="col">Сумма общая</th>
	  <th scope="col">ССЗ</th>
    </tr>
  </thead>
  <tbody>
  
    <?php 
        $labels = [];
		$data = [];
		$ppksum = 0;
		$rosum = 0;
		$ko5sum = 0;
		$endsum = 0;
        $epsum = 0;
		$totalsum = 0;
		$qntSelectedDeals = 0;
		
		$itognewres = 0;
		$itogppk = 0;
		$itogro = 0;
		$itogko5 = 0;
		$itogend = 0;
		$itogep = 0;
		$itogall = 0;
		$itogppksum = 0;
		$itogrosum = 0;
		$itogko5sum = 0;
		$itogendsum = 0;
		$itogepsum = 0;
		$itogtotalsum = 0;
		$itogothersum = 0;
		$itogalldeals = 0;
		
		$totalprocent = 0;
		$totalccz = 0;
		$i = 0;
		
	?>
  
    <?php foreach($managers as $manager):?>
    <tr>
      <th scope="row"><?=$manager['ID']?></th>
	  
      <td><?=$manager['NAME']?> <?=$manager['LAST_NAME']?></td>
	  
	  <?php $labels[] = $manager['NAME']. ' ' . $manager['LAST_NAME'];   ?>
	  
      <!-- Новая завка-->
	  <td>
	      <?php 
		      $ReportService = new ReportService();
			  $newres = $ReportService->newRequest($manager['ID'], $date1, $date2);
			  $dat = $newres;
			  echo $dat;
			  $data[] = $dat;
	          $itognewres += $dat;
	      ?>
	  </td>
	  <!-- -->
	  
	  <!-- Сделка ППК-->
      <td><?php 
	        $ReportService = new ReportService();
	        $ppk =  $ReportService->ppk($manager['ID'], $date1, $date2);
			
			$ppkRefund = $ReportService->ppkRefund($manager['ID'], $date1, $date2); // сделки на стадии возврат
			
			echo (count($ppk) + count($ppkRefund)); // вывод количества
			
			$qntSelectedDeals = (count($ppk) + count($ppkRefund));
			
			$itogppk += (count($ppk) + count($ppkRefund));
			
			foreach($ppk as $sum1){
				$ppksum += $sum1['OPPORTUNITY'];
			  }
			
            foreach($ppkRefund as $sum1Refund){
				$ppksum += $sum1Refund['OPPORTUNITY'];
			  }
			
			$itogppksum += $ppksum;
	  ?></td>
	  <!-- -->
	  
	  <!-- Сделка РО-->
	  <td><?php
	        $ro = $ReportService->ro($manager['ID'], $date1, $date2);
			$roRefund = $ReportService->roRefund($manager['ID'], $date1, $date2); // сделки на стадии возврат
			
			echo (count($ro) + count($roRefund)); // вывод количества
			
			$qntSelectedDeals += (count($ro) + count($roRefund));
			$itogro += (count($ro) + count($roRefund));
			
			foreach($ro as $sum2){
				$rosum += $sum2['OPPORTUNITY'];
			  }
			  
			foreach($roRefund as $sum2Refund){
				$rosum += $sum2Refund['OPPORTUNITY'];
			  }
			  
			$itogrosum += $rosum; 
	  ?></td>
	  <!-- -->
	  
	  <!-- Сделка КО5-->
	  <td><?php
	        $ko5 = $ReportService->ko5($manager['ID'], $date1, $date2);
			$ko5Refund = $ReportService->ko5Refund($manager['ID'], $date1, $date2);
			
			echo (count($ko5) + count($ko5Refund)); // вывод количества
			
			$qntSelectedDeals += (count($ko5) + count($ko5Refund));
			$itogko5 += (count($ko5) + count($ko5Refund));
			
			foreach($ko5 as $sum3){
				$ko5sum += $sum3['OPPORTUNITY'];
			  }
			  
			foreach($ko5Refund as $sum3Refund){
				$ko5sum += $sum3Refund['OPPORTUNITY'];
			  }
			$itogko5sum += $ko5sum;
	  ?></td>
	  <!-- -->
	  
	  <!-- Сделка ЭнД-->
	  <td><?php
	        $end = $ReportService->end($manager['ID'], $date1, $date2);
			$endRefund = $ReportService->endRefund($manager['ID'], $date1, $date2);
			
			echo (count($end) + count($endRefund));
			
			$qntSelectedDeals += (count($end) + count($endRefund));
			$itogend += (count($end) + count($endRefund));
			
			foreach($end as $sum4){
				$endsum += $sum4['OPPORTUNITY'];
			  }
			  
			foreach($endRefund as $sum4Refund){
				$endsum += $sum4Refund['OPPORTUNITY'];
			  }
			  
			$itogendsum += $endsum;
	  ?></td>
	  <!-- -->
	  
	  <!-- Сделка ЭП-->
	  <td><?php 
	        $ep = $ReportService->ep($manager['ID'], $date1, $date2);
			$epRefund = $ReportService->epRefund($manager['ID'], $date1, $date2);
			
			echo (count($ep) + count($epRefund));
			
			$qntSelectedDeals += (count($ep) + count($epRefund));
			$itogep += (count($ep) + count($epRefund));
			
			foreach($ep as $sum5){
				$epsum += $sum5['OPPORTUNITY'];
			  }
			  
			foreach($epRefund as $sum5Refund){
				$epsum += $sum5Refund['OPPORTUNITY'];
			  }
			  
			$itogepsum += $epsum;
	  ?></td>
	  <!-- -->
	  
	  <!-- Прочие услуги-->
	  <td><?php
	        $all1 = $ReportService->all($manager['ID'], $date1, $date2);
			$all2 = $ReportService->allRefund($manager['ID'], $date1, $date2);
			$all = array_merge($all1, $all2);
		
	        echo (count($all) - $qntSelectedDeals);
			
		    $itogall += (count($all) - $qntSelectedDeals);
			$itogalldeals += count($all);
	  ?></td>
	  <!-- -->
	  
	  
	  <td><?php echo $ppksum;
	    
		  ?></td>
	  
	  <td><?php echo $rosum;
	   
		  ?></td>
		  
	  <td><?php echo $ko5sum;
	     
		  ?></td>
		  
	  <td><?php echo $endsum;
	     
		  ?></td>
		  
	  <td><?php echo $epsum;
	      
		  ?></td>
		  
	  <!-- Сумма прочих услуг-->
	  <td><?php
	       foreach($all as $total){
				$totalsum += $total['OPPORTUNITY'];
			  }
			$itogtotalsum += $totalsum;
	        echo $totalsum - ($ppksum + $rosum + $ko5sum + $endsum + $epsum );
			$itogothersum += $totalsum - ($ppksum + $rosum + $ko5sum + $endsum + $epsum );
			
	     
	  ?></td>
	  <!-- -->
	  
	  <!-- Количество сделок-->
	  <td><?php
	       echo count($all);
	  ?></td>
	  <!-- -->
	  
	  <!-- % закрытия-->
	  <td><?php
	      if($newres === 0){
			  echo round((count($all) * 100), 2);
			  $totalprocent += 0;
		  } else{
			 
			  echo round(((count($all)/$newres) * 100), 2);
			  $totalprocent += round(((count($all)/$newres) * 100), 2);
		  }
	      
		?></td>
	  <!-- -->
	  
	  
	   <!-- Сумма общая-->
	   <td><?php
	        echo $totalsum;
	     ?></td>
	  <!-- -->
	  
	  <!-- ССЗ-->
	  <td><?php 
	      if(count($all) === 0){
			  echo '0';
			$totalccz += 0;
		  }else{
			  echo round(($totalsum / count($all)), 2);
			  $totalccz += round(($totalsum / count($all)), 2);
			  }
		  ?></td>
	  <!-- -->
	  
    </tr>
	<?php
	    $ppksum = 0;
		$rosum = 0;
		$ko5sum = 0;
		$endsum = 0;
        $epsum = 0;
		$totalsum = 0;
		$qntSelectedDeals = 0;
		
		$i++;
	?>
    <?php endforeach ?>
	
	<tr>
	<td></td>
	<th>Итого:</th>
	<td class = 'text-primary'><?=$itognewres?></td>
	<td class = 'text-primary'><?=$itogppk?></td>
	<td class = 'text-primary'><?=$itogro?></td>
	<td class = 'text-primary'><?=$itogko5?></td>
	<td class = 'text-primary'><?=$itogend?></td>
	<td class = 'text-primary'><?=$itogep?></td>
	<td class = 'text-primary'><?=$itogall?></td>
	<td class = 'text-primary'><?=$itogppksum?></td>
	<td class = 'text-primary'><?=$itogrosum?></td>
	<td class = 'text-primary'><?=$itogko5sum?></td>
	<td class = 'text-primary'><?=$itogendsum?></td>
	<td class = 'text-primary'><?=$itogepsum?></td>
	<td class = 'text-primary'><?=$itogothersum?></td>
	
	<!-- Итого Количество сделок -->
	<td class = 'text-primary'><?=$itogalldeals?></td>
	<!-- -->
	
	<!-- Итого % закрытия -->
	<td class = 'text-primary'><?php
	    if($itognewres === 0){
			echo round($itogalldeals * 100, 2);}else
			{echo round(($itogalldeals / $itognewres) * 100, 2);}
	?></td>
	<!-- -->
	
	<!-- Итого Сумма общая -->
	<td class = 'text-primary'><?=$itogtotalsum?></td>
	<!-- -->
	
	<!-- Итого ССЗ-->
	<td class = 'text-primary'><?php
	    /*if($i === 0){
			echo '0';}else{
				echo round(($totalccz / $i), 2);
			}*/
		if($itogalldeals === 0){echo '0';}else{
	    echo round(($itogtotalsum / $itogalldeals), 2);}
	?></td>
	<!-- -->
	
	</tr>
	
  </tbody>
</table>

<hr>
    <h2>Вариант графика</h2>
		
		<div class="chart">
            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
			</canvas>
        </div>
		
<hr>

<script>
    $(function () {

        var areaChartData = {
            labels: [
			        <?php foreach($labels as $label){
				        echo ' " '. $label. ' " , ';
				    }?>
				],
            datasets: [
                {
                    label: 'Количество новых сделок по менеджерам',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgb(54, 162, 235)',
                    borderWidth: 1,
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [
					<?php foreach($data as $qnt){
					    echo $qnt. ' , ';	
					}?>
					]
                },
            ]
        }

        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        barChartData.datasets[0] = temp0

        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false,
            scales: {
                yAxes: [{
                    display: true,
                    ticks: {
                        suggestedMin: 0,
                        // suggestedMax: 120
                        //suggestedMin: 0,    // minimum will be 0, unless there is a lower value.
                        // OR //
                        //beginAtZero: true   // minimum value will be 0.
                    }
                }]
            }
        }

        new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })


    });
</script>

<script>
$(function () {
		$('#period').change(function(){
		var selectval= $(this).val(); // Получим значение из select со значением #participation
		if( selectval== 'diapazon' ) {
			$('.date-input').show();
		} else {
			$('.date-input').hide();
		}
    });
  });
</script>

<script>
$(function () {
		
		var selectval= $('#period').val(); // Получим значение из select со значением #participation
		if( selectval== 'diapazon' ) {
			$('.date-input').show();
		} else {
			$('.date-input').hide();
		}
    
  });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example-getting-started').multiselect();
    });
</script>

<?= $this->endSection() ?>