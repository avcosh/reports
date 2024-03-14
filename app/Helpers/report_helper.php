<?php
use App\ThirdParty\Crest\Crest;

function userGet()
	{
	    $result = CRest::call(
           'user.get',
           [
		       'filter' =>[
		           'UF_DEPARTMENT' => 32
		       ],
		   ]); 
		   return $result['result'];	
	}