<?php
namespace App\Controllers;
use App\ThirdParty\Crest\Crest;
use App\Services\UserService;
use App\Services\FotService;
use App\Services\ReportService;

class Supervisor extends BaseController
{
    public function index()
    {
        
		$userService = new UserService();
		$allmanagers = $userService->alluserGet($uvol = null);
		$supervisors = $userService->allSupervisorGet();
		return view('supervisor/index' , [
		'title' => "Отчет ФОТ Супервайзер",
		'allmanagers' => $allmanagers,
		'supervisors' => $supervisors,
		]);
    }
	
	public function report()
    {
          
		return view('supervisor/report',[ 
		'title' => "Отчет ФОТ Супервайзер",
	 
		]);
    }
	
	
	
}
