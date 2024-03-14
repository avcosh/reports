<?php
namespace App\Services;
use App\ThirdParty\Crest\Crest;

class UserService
{
	
	public function userGet($users = [], $uvol = null)
	{
	    $result = CRest::call(
           'user.get',
           [
		       'filter' =>[
		           'UF_DEPARTMENT' => [32, 128, $uvol],
				   'ACTIVE' => true,
				   'ID' => $users
		       ],
		   ]);
        if(isset($result['result'])){
			return $result['result'];    
		   }
        while(!isset($result['result'])){
			$result = CRest::call(
			   'user.get',
			   [
				   'filter' =>[
					   'UF_DEPARTMENT' => [32, 128, $uvol],
					   'ACTIVE' => true,
					   'ID' => $users
				   ],
			   ]);
			
		}		   
 		return $result['result'];    
		   	
	}
	
	public function alluserGet($uvol = null)
	{
	    $result = CRest::call(
           'user.get',
           [
		       'filter' =>[
		           'UF_DEPARTMENT' => [32, 128, $uvol],
				   'ACTIVE' => true,
				   
		       ],
		   ]); 
		if(isset($result['result'])){
			return $result['result'];    
		   }
        while(!isset($result['result'])){
			$result = CRest::call(
           'user.get',
           [
		       'filter' =>[
		           'UF_DEPARTMENT' => [32, 128, $uvol],
				   'ACTIVE' => true,
				   
		       ],
		   ]);
		 }
        return $result['result']; 		 
	}
	
	public function allSupervisorGet()
	{
	    $result = CRest::call(
           'user.get',
           [
		       'filter' =>[
		           'UF_DEPARTMENT' => [128],
				   'ACTIVE' => true,
				   
		       ],
		   ]); 
		if(isset($result['result'])){
			return $result['result'];    
		   }
        while(!isset($result['result'])){
			$result = CRest::call(
           'user.get',
           [
		       'filter' =>[
		           'UF_DEPARTMENT' => [128],
				   'ACTIVE' => true,
				   
		       ],
		   ]);
		 }
        return $result['result'];	
	}
	
	public function supervisorGet($sv)
	{
	    $result = CRest::call(
           'user.get',
           [
		       'filter' =>[
		           'UF_DEPARTMENT' => [128],
				   'ACTIVE' => true,
				   'ID' => $sv,
		       ],
		   ]);
        if(isset($result['result'])){
			return $result['result'][0];    
		   }
        while(!isset($result['result'])){
			$result = CRest::call(
			   'user.get',
			   [
				   'filter' =>[
					   'UF_DEPARTMENT' => [128],
					   'ACTIVE' => true,
					   'ID' => $sv,
				   ],
			   ]);
			
		}		   
 		return $result['result'][0];    
		   	
	}
	
	
	
}

