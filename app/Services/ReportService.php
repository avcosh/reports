<?php
namespace App\Services;
use App\ThirdParty\Crest\Crest;

//error_reporting(E_ERROR);
set_time_limit(500);

//STAGE_ID = 5

class ReportService
{
	
	// Новая завка Дата передачи в работу
	public function newRequest($assigned_by_id, $date1, $date2)
	{
		$result = CRest::call(
			'crm.deal.list',
			[
				'filter' => [
					'>=UF_CRM_1686304672' => $date1,
					'<=UF_CRM_1686304672' => $date2,
					'ASSIGNED_BY_ID' => $assigned_by_id,
					'CATEGORY_ID' => 0,
				],
				
			]
			); 
			if(isset($result['result']))
			{
			    return $result['total'];	
			}
			else
			{
				while(!isset($result['result'])){
					$result = CRest::call(
						'crm.deal.list',
						[
							'filter' => [
								'>=UF_CRM_1686304672' => $date1,
								'<=UF_CRM_1686304672' => $date2,
								'ASSIGNED_BY_ID' => $assigned_by_id,
								'CATEGORY_ID' => 0,
							],
							
						]
						);
				}
				return $result['total'];
	        }
	}
	
	
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
						'STAGE_SEMANTIC_ID' => 'S'
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
							'STAGE_SEMANTIC_ID' => 'S'
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
							'STAGE_SEMANTIC_ID' => 'S'
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
								'STAGE_SEMANTIC_ID' => 'S'
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
					'STAGE_SEMANTIC_ID' => 'S'
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
							'STAGE_SEMANTIC_ID' => 'S'
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
							'STAGE_SEMANTIC_ID' => 'S'
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
								'STAGE_SEMANTIC_ID' => 'S'
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
					'STAGE_SEMANTIC_ID' => 'S'
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
							'STAGE_SEMANTIC_ID' => 'S'
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
							'STAGE_SEMANTIC_ID' => 'S'
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
								'STAGE_SEMANTIC_ID' => 'S'
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
					'STAGE_SEMANTIC_ID' => 'S'
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
							'STAGE_SEMANTIC_ID' => 'S'
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
							'STAGE_SEMANTIC_ID' => 'S'
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
								'STAGE_SEMANTIC_ID' => 'S'
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
					'STAGE_SEMANTIC_ID' => 'S'
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
							'STAGE_SEMANTIC_ID' => 'S'
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
							'STAGE_SEMANTIC_ID' => 'S'
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
								'STAGE_SEMANTIC_ID' => 'S'
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
					
					'>=UF_CRM_1686304720' => $date1.'T00:00:00',
					'<=UF_CRM_1686304720' => $date2.'T23:59:59',
				    'ASSIGNED_BY_ID' => $assigned_by_id,
					'CATEGORY_ID' => 0,
				
					'STAGE_SEMANTIC_ID' => 'S'
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
					
								'>=UF_CRM_1686304720' => $date1.'T00:00:00',
								'<=UF_CRM_1686304720' => $date2.'T23:59:59',
								'ASSIGNED_BY_ID' => $assigned_by_id,
								'CATEGORY_ID' => 0,
							
								'STAGE_SEMANTIC_ID' => 'S'
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
					
								'>=UF_CRM_1686304720' => $date1.'T00:00:00',
								'<=UF_CRM_1686304720' => $date2.'T23:59:59',
								'ASSIGNED_BY_ID' => $assigned_by_id,
								'CATEGORY_ID' => 0,
							
								'STAGE_SEMANTIC_ID' => 'S'
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
					
									'>=UF_CRM_1686304720' => $date1.'T00:00:00',
								'<=UF_CRM_1686304720' => $date2.'T23:59:59',
									'ASSIGNED_BY_ID' => $assigned_by_id,
									'CATEGORY_ID' => 0,
								
									'STAGE_SEMANTIC_ID' => 'S'
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
	
	
	//Сделка ППК Возврат
	public function ppkRefund($assigned_by_id, $date1, $date2)
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
	
	// Сделка РО возврат
	public function roRefund($assigned_by_id, $date1, $date2)
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
	
	// Сделка КО5 Возврат
	public function ko5Refund($assigned_by_id, $date1, $date2)
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
	
	// Сделка ЭнД возврат
	public function endRefund($assigned_by_id, $date1, $date2)
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
	
	// Сделка ЭП возврат
	public function epRefund($assigned_by_id, $date1, $date2)
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
	
	
	// Все сделки возврат
	public function allRefund($assigned_by_id, $date1, $date2)
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