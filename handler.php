<?php
	require_once 'connection.php';
	
	require_once 'stlib.php';
	
	if($_GET["mode"] == "post"){
			
			$message = $_GET["msg"];
			$rid = $_GET["rid"];
			postToStream($rid,$message);
			
	}
	else if($_GET["mode"] == "get"){
		
		echo getStream($_GET["object"]);
	}
	else if($_GET["mode"] == "gets"){
		
		echo getStreamByObject($_GET["object"]);
	}
?>
