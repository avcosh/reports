<?php
namespace App\Services;
use App\ThirdParty\Crest\Crest;

//error_reporting(E_ERROR);
set_time_limit(500);

class FotService
{
	
	
	public function shipmentPremium($totalsum, $minShipmentPremium2, $maxShipmentPremium2,
		            $minShipmentPremium35, $maxShipmentPremium35, $minShipmentPremium5, $maxShipmentPremium5,
					$minShipmentPremium55, $maxShipmentPremium55, $minShipmentPremium65)
	{
		if($minShipmentPremium2 <= $totalsum && $totalsum <= $maxShipmentPremium2){
			$percent = 2;
		}elseif($minShipmentPremium35 <= $totalsum && $totalsum <= $maxShipmentPremium35){
			$percent = 4;
		}elseif($minShipmentPremium5 <= $totalsum && $totalsum <= $maxShipmentPremium5){
			$percent = 5;
		}elseif($minShipmentPremium55 <= $totalsum && $totalsum <= $maxShipmentPremium55){
			$percent = 5.5;
		}elseif($minShipmentPremium65 < $totalsum ){
			$percent = 6.5;
		}
			
		$result = $totalsum * $percent / 100;
		return $result;	
	}
		
	public function closingPremium($newApplication, $callsQuantity, $closingpercent, $firstclosingPremium,
            	    $secondclosingPremium, $thirdclosingPremium, $fourclosingPremium)
	{
	    if($newApplication < $callsQuantity){
			return 0;
		}
		if($closingpercent < 20){
			return 0;
		}
		if(20 <= $closingpercent && $closingpercent <= 24.99){
		    $closingPremium = $firstclosingPremium;	
		}elseif(25 <= $closingpercent && $closingpercent <= 29.99){
			$closingPremium = $secondclosingPremium;
		}elseif(30 <= $closingpercent && $closingpercent <= 39.99){
			$closingPremium = $thirdclosingPremium;
		}elseif(40 <= $closingpercent){
			$closingPremium = $fourclosingPremium;
		}
		return $closingPremium;
        		
	}
}