<?php
function datesForReport($startdate, $enddate, $arrayextraholidays)
{
    $startDate = new DateTime($startdate);
    $endDate = new DateTime($enddate);
 
    $dates = [];
        while($startDate <= $endDate) {
            $dates[] = $startDate->format('Y-m-d');
            $startDate->modify('+1 day');
        }
	if(!empty($arrayextraholidays)){
	    $dates = array_merge(array_diff($arrayextraholidays,$dates),array_diff($dates,$arrayextraholidays));
        sort($dates);	
	}
	$resDateArray = [];
	foreach($dates as $dat){
		if ((date('N', strtotime($dat)) < 6)){
		    $resDateArray[] = $dat;   	
		}
	}
	return $resDateArray;
}

function datesForReportDays($startdate, $enddate)
{
    $startDate = new DateTime($startdate);
    $endDate = new DateTime($enddate);
 
    $dates = [];
        while($startDate <= $endDate) {
            $dates[] = $startDate->format('Y-m-d');
            $startDate->modify('+1 day');
        }
	/*if(!empty($arrayextraholidays)){
	    $dates = array_merge(array_diff($arrayextraholidays,$dates),array_diff($dates,$arrayextraholidays));
        sort($dates);	
	}*/
	$resDateArray = [];
	foreach($dates as $dat){
		if ((date('N', strtotime($dat)) < 6)){
		    $resDateArray[] = $dat;   	
		}
	}
	return $resDateArray;
}

function getDates($start, $end, $format = 'Y-m-d')

{

	$day = 86400;
    $start = strtotime($start . ' -1 days');
    $end = strtotime($end . ' +1 days');
    $nums = round(($end - $start) / $day); 

    $days = [];

	for ($i = 1; $i < $nums; $i++) { 
        $days[] = date($format, ($start + ($i * $day)));
    }

    return $days;

}