<?php
namespace App\Services;
use App\ThirdParty\Crest\Crest;

//error_reporting(E_ERROR);
set_time_limit(500);

class FotSupervisorService
{
	public function svPremium($totalsum, $firstSVPremium, $secondSVPremium, $thirdSVPremium, $fourSVPremium)
	{
	    
		if($totalsum < 400000){
			return 0;
		}
		if(400000 <= $totalsum && $totalsum <= 599999){
		    $svPremium = $firstSVPremium;	
		}elseif(600000 <= $totalsum && $totalsum <= 699999){
			$svPremium = $secondSVPremium;
		}elseif(700000 <= $totalsum && $totalsum <= 799999){
			$svPremium = $thirdSVPremium;
		}elseif(800000 <= $totalsum){
			$svPremium = $fourSVPremium;
		}
		return $svPremium;
        		
	}
	
	public function shipmentPremiumSv($totalTotalsum, $minShipmentPremium1, $maxShipmentPremium1, $minShipmentPremium2, $maxShipmentPremium2,
	                                  $minShipmentPremium3)
		{
			if($minShipmentPremium1 <= $totalTotalsum && $totalTotalsum <= $maxShipmentPremium1)
			{
			  $percent = 0.1;
			}elseif($minShipmentPremium2 <= $totalTotalsum && $totalTotalsum <= $maxShipmentPremium2){
				$percent = 0.2;
			}elseif($minShipmentPremium3 <= $totalTotalsum ){
				$percent = 0.3;
			}
			$result = $totalTotalsum * $percent / 100;
			return $result;	
		}
		
	public function svClosingPremium($closingpercentSupervisor, $firstclosingPremium, $secondclosingPremium, $thirdclosingPremium)
	{
	    if($closingpercentSupervisor < 20){
			return 0;
		}
        if(20 <= $closingpercentSupervisor && $closingpercentSupervisor <= 24.99){
		    return $firstclosingPremium;	
		}elseif(25 <= $closingpercentSupervisor && $closingpercentSupervisor <= 29.99){
			return $secondclosingPremium;
		}elseif(30 <= $closingpercentSupervisor ){
			return $thirdclosingPremium;	
			}		
	}
}