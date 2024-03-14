<?php
namespace App\Controllers;
use App\ThirdParty\Crest\Crest;
use App\Services\ShiftService;


class Site extends BaseController
{
    public function index()
    {
      
	   /* $db = db_connect();
	    $res = $db->query("SELECT * 
		FROM workingshift 
		WHERE 
		date = '2023-09-25' ")->getResult();
		dd($res); */
		return view('site/index' , ['title' => "Дашборд"]);
	}
	
	public function login()
    {
        return view('site/login' , ['title' => "Дашборд"]);
    }
	
}
