<?php
namespace App\Controllers;
use App\Services\DealsregionService;
use App\ThirdParty\Crest\Crest;

class Refundregion extends BaseController
{
    public function index()
    {
        
		/*$result = CRest::call(
			'crm.deal.fields',
			[
				
			]
			);
		print_r($result['result']); die; */
		$dealsregionService = new DealsregionService();
		$allRegions = $dealsregionService->getAllRegions();
	
		return view('refundregion/index' , [
		'title' => "Отчет возвраты по регионам",
		'allRegions' => $allRegions,
	
		]);
    }
	
	public function report()
    {
       
		return view('refundregion/report',[ 
		'title' => "Отчет возвраты по регионам",
	 
		]);
    }
	
	
	
}
