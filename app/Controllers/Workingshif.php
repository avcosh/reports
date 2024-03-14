<?php
namespace App\Controllers;
use App\ThirdParty\Crest\Crest;
use App\Services\ShiftService;


class Workingshif extends BaseController
{
    public function getWorkingShiftQuantity()
    {
        $ShiftService = new ShiftService();
		$ShiftService->getWorkingShiftQuantity();
		
		return view('site/index' , ['title' => "Дашборд"]);
	}
	
	
	
}
