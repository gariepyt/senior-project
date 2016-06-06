<?php
	ini_set('display_errors', 'On');

	if ($_SERVER['REQUEST_METHOD'] == "GET") {
		header('Access-Control-Allow-Origin: *');

		$id = 0;

		$path = 'data/gameid.txt';
		$handle = fopen($path, 'a');
		$idArray = file($path);

		if ($idArray == false) {
			//Write 1 into file and set id to 1
			fwrite($handle, "1\r\n");
			$id = 1;
		} else {
			//Increment by 1
			//Write value to file and set id to value
			//Get last element of idArray
			$id = $idArray[sizeof($idArray) - 1] + 1;
			fwrite($handle, "$id\r\n");
		}
		echo $id;
	}

?>