<?php

	$outputFileList = array();

	$fileList = scandir("./comics");

	$theGet = htmlspecialchars_decode($_GET["res"]);

	$theExplode = explode("/", $theGet);
	
	$searchVal = htmlspecialchars_decode(end($theExplode)); 
	
	$retVal = array_search($searchVal, $fileList);
	
	echo '/'.$fileList[$retVal+1];

?>