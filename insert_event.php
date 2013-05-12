<?php
session_start();
include_once("connect_SQL.php");
include_once("date_fr.php");
include_once("event_picture.php");

		$name = addslashes($_POST['name']);
		$datefr = $_POST['date'];
		$time = addslashes($_POST['time']);
		$persons = addslashes($_POST['persons']);
		$description = addslashes($_POST['description']);

		$dateen = dateen($datefr);
		connect();
			
		if ($savefile)
		{
			$request = "INSERT INTO events (picture_event, name_event,description_event,date_event,time_event,persons) VALUES ('$savefile','$name','$description','$dateen','$time','$persons')";
		}
		else
		{
			$request = "INSERT INTO events (name_event,description_event,date_event,time_event,persons) VALUES ('$name','$description','$dateen','$time','$persons')";
		}
	
		
		
		$result =mysql_query($request) or die("Request impossible!");
		
		echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php\"> \n";
	


?>