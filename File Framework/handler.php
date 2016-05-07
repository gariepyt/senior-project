<?php
	ini_set('display_errors', 'Off');

	//Create or Update Files - POST Request
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if ($_POST['id'] && $_POST['type'] && $_POST['index'] && $_POST['player']){
			//Create Game Data Directory if it does not exist
			//Path is /data/<<Game ID>>/
			$directory = 'data/' . $_POST['id'];
			mkdir($directory, 0777);

			//Convert POST Associative Array to JSON object
			//Write JSON Object to File in Game ID Directory
			//File Format is <<Player>> + <<Type>> + <<Index>>.txt
			$file = $_POST['player'] . '_' . $_POST['type'] . '_' . $_POST['index'] . '.txt';
			$path = $directory . '/' . $file;
			$handle = fopen($path, 'w');
			file_put_contents($path, json_encode($_POST));
		} else {
			//Missing one of the required parameters:
			//id, type, index, player

			//Send Bad Request Response
			header("HTTP/1.0 400 Bad Request");
		}
	}

	//Retrieve All Files into JSON Request - GET Request
	if ($_SERVER['REQUEST_METHOD'] == "GET") {
		if ($_GET['id']) {
			//Retrieve All Data Files Associated to Game ID
			//Send Data from All Files to Client in Single JSON Message
			//Open Directory Handle
			$directory = 'data/' . $_GET['id'] . '/';
			$dh = opendir($directory);

			//Define Array To Store File Data
			$files = array();
			$x = 0;

			//Loop Through Files
			while(false !== ($entry = readdir($dh))) {
				//Check to verify string has valid file
				if (file_exists($directory . $entry)) {
					if (filetype($directory . $entry) == 'file') {
						//Add Contents to Array
						$files[$x] = json_decode(file_get_contents($directory . $entry));
						$x++;
					}
				}
			}
			//Convert Array to JSON
			$files = json_encode($files);

			//Dump JSON Out
			echo($files);
		} else {
			//Missing one of the required parameters:
			//id

			//Send Bad Request Response
			header("HTTP/1.0 400 Bad Request");
		}
	}
?>