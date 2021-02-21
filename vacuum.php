<?php

dateGen();



function dateGen()
{
	//The date that you want to start at.
	$start = '2001-12-19';
	 
	//The date that you want to stop at.
	$end = '2020-12-31';
	 
	//We set our counter to the start date.
	$currentDate = strtotime($start);
	 
	//While the current timestamp is smaller or equal to
	//the timestamp of the end date.
	while($currentDate <= strtotime($end)){
	    
	    //Format the timestamp and print it out
	    //for illustrative purposes.
	    $formatted = date("mdY", $currentDate);
	    echo $formatted."\n";
	    $outputDate = date("Ymd", $currentDate);
	    echo $outputDate."\n";
	    $urlString = "https://somethingpositive.net/wp-content/uploads/".date("Y", $currentDate) . "/" . date("m", $currentDate) . "/sp".$formatted;
	    
	    sleep(10);
	    echo $urlString.".png\n";

	    saveIt($urlString.".png",getcwd()."/comics/sp".$outputDate.".png");
	    
	    sleep(10);
	    echo $urlString .".gif\n";
	    saveIt($urlString .".gif",getcwd()."/comics/sp".$outputDate.".gif");
	    
	    //Add one day onto the timestamp / counter.
	    $currentDate = strtotime("+1 day", $currentDate);
	}
}

function saveIt($url,$target)
{
	file_put_contents($target, file_get_contents($url));

}


?>