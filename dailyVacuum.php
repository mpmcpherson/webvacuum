<?php

dateGen();



function dateGen()
{
	//The date that you want to start at.
	$start = date("Y-m-d");
	 
	//The date that you want to stop at.
	$end = strtotime("+1 day", date("Y-m-d"));
	 
	//We set our counter to the start date.
	$currentDate = strtotime($start);
	 
	//While the current timestamp is smaller or equal to
	//the timestamp of the end date.
	while($currentDate <= strtotime($end)){
	    
	    //Format the timestamp and print it out
	    //for illustrative purposes.
	    $formatted = date("mdY", $currentDate);
	    //$urlString = "https://somethingpositive.net/wp-content/uploads/".date("Y", $currentDate) . "/" . date("m", $currentDate) . "/sp".$formatted;
	    
	    $urlString = "https://somethingpositive.net/wp-content/uploads/".date("Y", $currentDate) . "/" . date("m", $currentDate) . "/sp".$formatted;
	    
	    sleep(3);
	    //echo $urlString.".png\n";
	    $reformatted = date("Ymd", $currentDate);
	    saveIt($urlString.".png",getcwd()."/comics/sp".$reformatted.".png");
	    
	    //sleep(10);
	    //echo $urlString .".gif\n";
	    //saveIt($urlString .".gif",getcwd()."/comics/sp".date("Ymd",$formatted).".gif");
	    
	    //Add one day onto the timestamp / counter.
	    $currentDate = strtotime("+1 day", $currentDate);
	}
}

function saveIt($url,$target)
{
	echo "Target: " . $target."\n";
	echo "URL: " . $url."\n";
	file_put_contents($target, file_get_contents($url));

}


?>