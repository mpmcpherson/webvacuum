<?php



	$outputFileList = array();

	$fileList = scandir("./comics");

	foreach($fileList as &$files)
	{
		if($files != "." && $files != "..")
		{
			array_push($outputFileList, "/" . $files);
		}
	}
	unset($files);

	//PrintCurrentFunction(__FUNCTION__);

	echo $outputFileList[0];


?>