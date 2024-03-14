<?php
namespace App\Controllers;
use App\Services\UserService;
use App\ThirdParty\Crest\Crest;

class Workedshifts extends BaseController
{
    public function index()
    {
       
		/*$result = CRest::call(
			'crm.deal.fields',
			[
				
			]
			);
		print_r($result['result']); die; */
		$userService = new UserService();
		$allManagers = $userService->alluserGet($uvol = null);
	
		return view('workedshifts/index' , [
		'title' => "Отчет вывод фактически отработанных смен",
		'allManagers' => $allManagers,
	
		]);
    }
	
	public function report()
    {
        $userService = new UserService();
		$managers = null;
		if(isset($_GET['submit'])){
			$startDate = strip_tags(htmlspecialchars(trim($_GET['startDate']))); 
			$endDate = strip_tags(htmlspecialchars(trim($_GET['endDate'])));
			if(!empty($_GET['managers'])){
				$managers = $_GET['managers'];
			}
			if(!empty($_GET['allusers'])){
		    $managers = $userService->alluserGet($uvol = null);
           			
	       }else{
			   $managers = $userService->userGet($managers, $uvol = null);
		   }
		helper('mydate_helper');
		$datesForReport = getDates($startDate, $endDate);	
			
		}
		
		
		return view('workedshifts/report',[ 
		'title' => "Отчет вывод фактически отработанных смен",
		'startDate'         => $startDate,
		'endDate'           => $endDate,
		'managers'          => $managers,
	    'datesForReport'    => $datesForReport,
		]);
    }
	
	
	
}
