<?php
namespace App\Services;
use App\ThirdParty\Crest\Crest;

//error_reporting(E_ERROR);
set_time_limit(500);

class RefundManagerService
{
	
	//Сделка ППК
	public function ppk($assigned_by_id, $date1, $date2)
	{
		
		$result = CRest::call(
				'crm.deal.list',
				[
					'filter' => [
						'>=UF_CRM_1686304720' => $date1,
						'<=UF_CRM_1686304720' => $date2,
						'ASSIGNED_BY_ID' => $assigned_by_id,
						'CATEGORY_ID' => 0,
						'UF_CRM_1633524770' => 2864,
						'STAGE_ID' => 5
								],
							
				]
			); 
			if(isset($result['result']))
			{
			    $arRes = $result['result'];	
			}
			else
			{
				while(!isset($result['result'])){
					$result = CRest::call(
						'crm.deal.list',
						[
							'filter' => [
							'>=UF_CRM_1686304720' => $date1,
							'<=UF_CRM_1686304720' => $date2,
							'ASSIGNED_BY_ID' => $assigned_by_id,
							'CATEGORY_ID' => 0,
							'UF_CRM_1633524770' => 2864,
							'STAGE_ID' => 5
						],
							
						]
						);
				}
				$arRes = $result['result'];
	        }
			
		
		if($result['total'] > 50){
				$i = 50;
				while($i < $result['total']){
					$res_x = CRest::call(
						'crm.deal.list',
						[
							'filter' => [
							'>=UF_CRM_1686304720' => $date1,
							'<=UF_CRM_1686304720' => $date2,
							'ASSIGNED_BY_ID' => $assigned_by_id,
							'CATEGORY_ID' => 0,
							'UF_CRM_1633524770' => 2864,
							'STAGE_ID' => 5
						],
							'start' => $i
						]
			        );
					
					if(isset($res_x['result']))
					{
					    $arRes = array_merge($arRes, $res_x['result']);
		                $i = $i + 50; 	
					}else
					
					{
					    while(!isset($res_x['result'])){
							$res_x = CRest::call(
							'crm.deal.list',
							[
								'filter' => [
								'>=UF_CRM_1686304720' => $date1,
								'<=UF_CRM_1686304720' => $date2,
								'ASSIGNED_BY_ID' => $assigned_by_id,
								'CATEGORY_ID' => 0,
								'UF_CRM_1633524770' => 2864,
								'STAGE_ID' => 5
							    ],
								
							]
							);
				        }
						
						$arRes = array_merge($arRes, $res_x['result']);
		                $i = $i + 50;
						
					}
					
	                
				}
            }
		return $arRes;
	}
	
	// Сделка РО
	public function ro($assigned_by_id, $date1, $date2)
	{
	    $result = CRest::call(
				'crm.deal.list',
				[
					'filter' => [
					
					'>=UF_CRM_1686304720' => $date1,
					'<=UF_CRM_1686304720' => $date2,
				    'ASSIGNED_BY_ID' => $assigned_by_id,
					'CATEGORY_ID' => 0,
					'UF_CRM_1633524770' => 2860,
					'STAGE_ID' => 5
				],
							
				]
			); 
			if(isset($result['result']))
			{
			    $arRes = $result['result'];	
			}
			else
			{
				while(!isset($result['result'])){
					$result = CRest::call(
						'crm.deal.list',
						[
							'filter' => [
					
							'>=UF_CRM_1686304720' => $date1,
							'<=UF_CRM_1686304720' => $date2,
							'ASSIGNED_BY_ID' => $assigned_by_id,
							'CATEGORY_ID' => 0,
							'UF_CRM_1633524770' => 2860,
							'STAGE_ID' => 5
						    ],
							
						]
						);
				}
				$arRes = $result['result'];
	        }
			
		
		if($result['total'] > 50){
				$i = 50;
				while($i < $result['total']){
					$res_x = CRest::call(
						'crm.deal.list',
						[
							'filter' => [
					
							'>=UF_CRM_1686304720' => $date1,
							'<=UF_CRM_1686304720' => $date2,
							'ASSIGNED_BY_ID' => $assigned_by_id,
							'CATEGORY_ID' => 0,
							'UF_CRM_1633524770' => 2860,
							'STAGE_ID' => 5
						    ],
							'start' => $i
						]
			        );
					
					if(isset($res_x['result']))
					{
					    $arRes = array_merge($arRes, $res_x['result']);
		                $i = $i + 50; 	
					}else
					
					{
					    while(!isset($res_x['result'])){
							$res_x = CRest::call(
							'crm.deal.list',
							[
								'filter' => [
					
								'>=UF_CRM_1686304720' => $date1,
								'<=UF_CRM_1686304720' => $date2,
								'ASSIGNED_BY_ID' => $assigned_by_id,
								'CATEGORY_ID' => 0,
								'UF_CRM_1633524770' => 2860,
								'STAGE_ID' => 5
							    ],
								
							]
							);
				        }
						
						$arRes = array_merge($arRes, $res_x['result']);
		                $i = $i + 50;
						
					}
					
	                
				}
            }
		return $arRes;	
		
		
	}
	
	// Сделка КО5
	public function ko5($assigned_by_id, $date1, $date2)
	{
	    $result = CRest::call(
				'crm.deal.list',
				[
					'filter' => [
					
					'>=UF_CRM_1686304720' => $date1,
					'<=UF_CRM_1686304720' => $date2,
				    'ASSIGNED_BY_ID' => $assigned_by_id,
					'CATEGORY_ID' => 0,
					'UF_CRM_1633524770' => 2866,
					'STAGE_ID' => 5
				],
							
				]
			); 
			if(isset($result['result']))
			{
			    $arRes = $result['result'];	
			}
			else
			{
				while(!isset($result['result'])){
					$result = CRest::call(
						'crm.deal.list',
						[
							'filter' => [
					
							'>=UF_CRM_1686304720' => $date1,
							'<=UF_CRM_1686304720' => $date2,
							'ASSIGNED_BY_ID' => $assigned_by_id,
							'CATEGORY_ID' => 0,
							'UF_CRM_1633524770' => 2866,
							'STAGE_ID' => 5
						    ],
							
						]
						);
				}
				$arRes = $result['result'];
	        }
			
		
		if($result['total'] > 50){
				$i = 50;
				while($i < $result['total']){
					$res_x = CRest::call(
						'crm.deal.list',
						[
							'filter' => [
					
							'>=UF_CRM_1686304720' => $date1,
							'<=UF_CRM_1686304720' => $date2,
							'ASSIGNED_BY_ID' => $assigned_by_id,
							'CATEGORY_ID' => 0,
							'UF_CRM_1633524770' => 2866,
							'STAGE_ID' => 5
						    ],
							'start' => $i
						]
			        );
					
					if(isset($res_x['result']))
					{
					    $arRes = array_merge($arRes, $res_x['result']);
		                $i = $i + 50; 	
					}else
					
					{
					    while(!isset($res_x['result'])){
							$res_x = CRest::call(
							'crm.deal.list',
							[
								'filter' => [
					
								'>=UF_CRM_1686304720' => $date1,
								'<=UF_CRM_1686304720' => $date2,
								'ASSIGNED_BY_ID' => $assigned_by_id,
								'CATEGORY_ID' => 0,
								'UF_CRM_1633524770' => 2866,
								'STAGE_ID' => 5
							    ],
								
							]
							);
				        }
						
						$arRes = array_merge($arRes, $res_x['result']);
		                $i = $i + 50;
						
					}
					
	                
				}
            }
		return $arRes;	
		
	}
	
	// Сделка ЭнД
	public function end($assigned_by_id, $date1, $date2)
	{
		$result = CRest::call(
				'crm.deal.list',
				[
					'filter' => [
					
					'>=UF_CRM_1686304720' => $date1,
					'<=UF_CRM_1686304720' => $date2,
				    'ASSIGNED_BY_ID' => $assigned_by_id,
					'CATEGORY_ID' => 0,
					'UF_CRM_1633524770' => 2868,
					'STAGE_ID' => 5
				],
							
				]
			); 
			if(isset($result['result']))
			{
			    $arRes = $result['result'];	
			}
			else
			{
				while(!isset($result['result'])){
					$result = CRest::call(
						'crm.deal.list',
						[
							'filter' => [
					
							'>=UF_CRM_1686304720' => $date1,
							'<=UF_CRM_1686304720' => $date2,
							'ASSIGNED_BY_ID' => $assigned_by_id,
							'CATEGORY_ID' => 0,
							'UF_CRM_1633524770' => 2868,
							'STAGE_ID' => 5
						    ],
							
						]
						);
				}
				$arRes = $result['result'];
	        }
			
		
		if($result['total'] > 50){
				$i = 50;
				while($i < $result['total']){
					$res_x = CRest::call(
						'crm.deal.list',
						[
							'filter' => [
					
							'>=UF_CRM_1686304720' => $date1,
							'<=UF_CRM_1686304720' => $date2,
							'ASSIGNED_BY_ID' => $assigned_by_id,
							'CATEGORY_ID' => 0,
							'UF_CRM_1633524770' => 2868,
							'STAGE_ID' => 5
						    ],
							'start' => $i
						]
			        );
					
					if(isset($res_x['result']))
					{
					    $arRes = array_merge($arRes, $res_x['result']);
		                $i = $i + 50; 	
					}else
					
					{
					    while(!isset($res_x['result'])){
							$res_x = CRest::call(
							'crm.deal.list',
							[
								'filter' => [
					
								'>=UF_CRM_1686304720' => $date1,
								'<=UF_CRM_1686304720' => $date2,
								'ASSIGNED_BY_ID' => $assigned_by_id,
								'CATEGORY_ID' => 0,
								'UF_CRM_1633524770' => 2868,
								'STAGE_ID' => 5
							    ],
								
							]
							);
				        }
						
						$arRes = array_merge($arRes, $res_x['result']);
		                $i = $i + 50;
						
					}
					
	                
				}
            }
		return $arRes;
		
	}
	
	// Сделка ЭП
	public function ep($assigned_by_id, $date1, $date2)
	{
		$result = CRest::call(
				'crm.deal.list',
				[
					'filter' => [
					
					'>=UF_CRM_1686304720' => $date1,
					'<=UF_CRM_1686304720' => $date2,
				    'ASSIGNED_BY_ID' => $assigned_by_id,
					'CATEGORY_ID' => 0,
					'UF_CRM_1633524770' => 5412,
					'STAGE_ID' => 5
				],
							
				]
			); 
			if(isset($result['result']))
			{
			    $arRes = $result['result'];	
			}
			else
			{
				while(!isset($result['result'])){
					$result = CRest::call(
						'crm.deal.list',
						[
							'filter' => [
					
							'>=UF_CRM_1686304720' => $date1,
							'<=UF_CRM_1686304720' => $date2,
							'ASSIGNED_BY_ID' => $assigned_by_id,
							'CATEGORY_ID' => 0,
							'UF_CRM_1633524770' => 5412,
							'STAGE_ID' => 5
						    ],
							
						]
						);
				}
				$arRes = $result['result'];
	        }
			
		
		if($result['total'] > 50){
				$i = 50;
				while($i < $result['total']){
					$res_x = CRest::call(
						'crm.deal.list',
						[
							'filter' => [
					
							'>=UF_CRM_1686304720' => $date1,
							'<=UF_CRM_1686304720' => $date2,
							'ASSIGNED_BY_ID' => $assigned_by_id,
							'CATEGORY_ID' => 0,
							'UF_CRM_1633524770' => 5412,
							'STAGE_ID' => 5
						    ],
							'start' => $i
						]
			        );
					
					if(isset($res_x['result']))
					{
					    $arRes = array_merge($arRes, $res_x['result']);
		                $i = $i + 50; 	
					}else
					
					{
					    while(!isset($res_x['result'])){
							$res_x = CRest::call(
							'crm.deal.list',
							[
								'filter' => [
					
								'>=UF_CRM_1686304720' => $date1,
								'<=UF_CRM_1686304720' => $date2,
								'ASSIGNED_BY_ID' => $assigned_by_id,
								'CATEGORY_ID' => 0,
								'UF_CRM_1633524770' => 5412,
								'STAGE_ID' => 5
							    ],
								
							]
							);
				        }
						
						$arRes = array_merge($arRes, $res_x['result']);
		                $i = $i + 50;
						
					}
					
	                
				}
            }
		return $arRes;
		
	}
	
	public function all($assigned_by_id, $date1, $date2)
	{
	    $result = CRest::call(
				'crm.deal.list',
				[
					'filter' => [
					
					'>=UF_CRM_1686304720' => $date1,
					'<=UF_CRM_1686304720' => $date2,
				    'ASSIGNED_BY_ID' => $assigned_by_id,
					'CATEGORY_ID' => 0,
				
					'STAGE_ID' => 5
				],
							
				]
			); 
			if(isset($result['result']))
			{
			    $arRes = $result['result'];	
			}
			else
			{
				while(!isset($result['result'])){
					$result = CRest::call(
						'crm.deal.list',
						[
							'filter' => [
					
								'>=UF_CRM_1686304720' => $date1,
								'<=UF_CRM_1686304720' => $date2,
								'ASSIGNED_BY_ID' => $assigned_by_id,
								'CATEGORY_ID' => 0,
							
								'STAGE_ID' => 5
							],
							
						]
						);
				}
				$arRes = $result['result'];
	        }
			
		
		if($result['total'] > 50){
				$i = 50;
				while($i < $result['total']){
					$res_x = CRest::call(
						'crm.deal.list',
						[
							'filter' => [
					
								'>=UF_CRM_1686304720' => $date1,
								'<=UF_CRM_1686304720' => $date2,
								'ASSIGNED_BY_ID' => $assigned_by_id,
								'CATEGORY_ID' => 0,
							
								'STAGE_ID' => 5
							],
							'start' => $i
						]
			        );
					
					if(isset($res_x['result']))
					{
					    $arRes = array_merge($arRes, $res_x['result']);
		                $i = $i + 50; 	
					}else
					
					{
					    while(!isset($res_x['result'])){
							$res_x = CRest::call(
							'crm.deal.list',
							[
								'filter' => [
					
									'>=UF_CRM_1686304720' => $date1,
									'<=UF_CRM_1686304720' => $date2,
									'ASSIGNED_BY_ID' => $assigned_by_id,
									'CATEGORY_ID' => 0,
								
									'STAGE_ID' => 5
								],
								
							]
							);
				        }
						
						$arRes = array_merge($arRes, $res_x['result']);
		                $i = $i + 50;
						
					}
					
	                
				}
            }
		return $arRes;	
		
	}
}


