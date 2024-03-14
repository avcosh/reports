<?php
namespace App\Controllers;
use App\ThirdParty\Crest\Crest;
use App\Services\UserService;
use App\Services\FotService;
use App\Services\ReportService;

class Fot extends BaseController
{
    public function index()
    {
        
		$userService = new UserService();
		$allmanagers = $userService->alluserGet($uvol = null);
		return view('fot/index' , [
		'title' => "ФОТ",
		'allmanagers' => $allmanagers,
		]);
    }
	
	public function report()
    {
          
		return view('fot/report',[ 
		'title' => "ФОТ DSS",
	 
		]);
    }
	
	
	
}
