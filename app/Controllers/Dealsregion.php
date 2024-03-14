<?php
namespace App\Controllers;
use App\Services\DealsregionService;

class Dealsregion extends BaseController
{
    public function index()
    {
        
		$dealsregionService = new DealsregionService();
		$allRegions = $dealsregionService->getAllRegions();
		//$supervisors = $userService->allSupervisorGet();
		return view('dealsregion/index' , [
		'title' => "Отчет сделки по регионам",
		'allRegions' => $allRegions,
		//'supervisors' => $supervisors,
		]);
    }
	
	public function report()
    {
       
		return view('dealsregion/report',[ 
		'title' => "Отчет сделки по регионам",
	 
		]);
    }
	
	
	
}
