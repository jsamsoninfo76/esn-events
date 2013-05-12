<?php	
session_start();
include_once("connect_SQL.php");
include_once("date_fr.php");
include_once("event_picture.php");

		$id_event = $_POST['id_event'];

		$query = "SELECT * FROM events WHERE id_event ='$id_event'";
		connect();
		$result = mysql_query($query) or die("Request impossible!");
		$row = mysql_fetch_array($result);
		$name = addslashes($_POST['name']);
		$datefr = $_POST['date'];
		$time = addslashes($_POST['time']);
		$persons = addslashes($_POST['persons']);
		$description = addslashes($_POST['description']);
		
		$dateen = dateen($datefr);
		if ($savefile)
		{
			$request = "UPDATE events SET picture_event='$savefile', name_event='$name',description_event='$description',date_event='$dateen',time_event='$time',persons='$persons' WHERE id_event ='$id_event'";
		}
		else
		{
			$request = "UPDATE events SET name_event='$name',description_event='$description',date_event='$dateen',time_event='$time',persons='$persons' WHERE id_event ='$id_event'";
		}

		$result =mysql_query($request) or die("Request impossible!");
		
		echo "<meta http-equiv=\"refresh\" content=\"0;url=event.php?id_event=".$id_event."\"> \n";
?>