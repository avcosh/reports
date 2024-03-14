<?php
namespace App\Controllers;
use App\Services\UserService;
use App\Services\ReportService;
use App\ThirdParty\Crest\Crest;

class Dailyreport extends BaseController
{
    public function index()
    {
        
		$UserService = new UserService();
		
		$managers = $UserService->userGet($users = []);
		$allmanagers = $UserService->alluserGet($uvol = null); 
		
		return view('dailyreport/index' , [
		'title' => "Ежедневный отчет DSS",
		'managers' => $managers,
		'allmanagers' => $allmanagers,
		]);
    }
	
	public function show()
	{
		echo "show";
	}
	
	
	
}
