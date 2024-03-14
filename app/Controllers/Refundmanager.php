<?php
namespace App\Controllers;
use App\Services\UserService;
use App\ThirdParty\Crest\Crest;

class Refundmanager extends BaseController
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
		$allManagers = $userService->alluserGet(130);
	
		return view('refundmanager/index' , [
		'title' => "Отчет возвраты по менеджерам",
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
			
			
		}
		
		
		return view('refundmanager/report',[ 
		'title' => "Отчет возвраты по регионам",
		'startDate'         => $startDate,
		'endDate'           => $endDate,
		'managers'          => $managers,
	 
		]);
    }
	
	
	
}
