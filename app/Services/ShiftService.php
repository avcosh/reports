<?php
namespace App\Services;
use App\Services\UserService;
use App\ThirdParty\Crest\Crest;

class ShiftService
{
    // Возвращает рабочий день или нет
	public function isWorkingDay($managerId, $date)
	{
	    $db = db_connect();
		$query  = $db->query("SELECT `status`
		FROM workingshift 
		WHERE manager_id = $managerId 
		AND date = '$date' 
		");
		$res = $query->getRow();
		if (isset($res)) {
			
			if($res->status === '1'){
		    return 1;
				
		}else{
		    return 0;
		}
		}
		
	}
	
	
	// Возвращает кол-во рабочих смен за данный период
	public function workingShift($manager_id, $startdate, $enddate)
	{
	    $db = db_connect();
		$res = $db->query("SELECT COUNT(*) AS count 
		FROM workingshift 
		WHERE manager_id = $manager_id 
		AND date >= '$startdate' 
		AND date <= '$enddate' 
		AND status = '1' 
		GROUP BY manager_id, status; ")->getRow();
		
		if($res == null){
		    return 0;
				
		}else{
		    return $res->count;	
		}		
		
	}
	
	
	
	// Вызывается по CRON ежедневно в 15-00
    public function getWorkingShiftQuantity()
    {
        $userService = new UserService();
		$managers = $userService->AlluserGet();
		foreach($managers as $manager){
			$res = $this->getStatus($manager['ID']); 
			if($res == 'OPENED' || $res == 'PAUSED'){
				$status = 1;
			}elseif($res == 'CLOSED' || $res == 'EXPIRED'){
			    $status = 0;	
			}
			
			$this->insertWorkingShiftStatus($manager['ID'], date('Y-m-d'), $status);
		}
    }
	
	
	// получает из REST Б24 статус текущего рабочего дня TO DO цикл стучаться
	private function getStatus($userId)
	{
	    $result = CRest::call(
			'timeman.status',
			  [
				'USER_ID' => $userId,
			  ]
			);
		if(isset($result['result'])){
			return $result['result']['STATUS'];    
		   }
		while(!isset($result['result'])){
			$result = CRest::call(
			   'timeman.status',
			  [
				'USER_ID' => $userId,
			  ]);
		}
		return $result['result']['STATUS'];	
	}
	
	// записывает в БД текущий статус каждого менеджера
	private function insertWorkingShiftStatus($manager_id, $date, $status)
	{
	    $db = db_connect();
	    $res = $db->query("SELECT `date` 
		FROM workingshift 
		WHERE `manager_id` = $manager_id
		AND date = '$date'  ")->getRow();
		if($res == null){
			$db->query("INSERT INTO `workingshift` (`manager_id`, `date`, `status`) VALUES ($manager_id, '$date', '$status') ");
		}
		
	}
}