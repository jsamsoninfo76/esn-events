<?php
session_start();
include_once("directories.php");
include_once("connect_SQL.php");

	
		$id_event = $_GET['id_event'];

		connect();	
		//On récupère le chemin d'accès de l'image pour l'effacer.
		$request = "SELECT picture_event FROM events WHERE id_event='$id_event'";
		$result =mysql_query($request) or die("Request impossible!");
		$row = mysql_fetch_array($result);
		$pic = $row['picture_event'];
		if (!unlink($users_images_dir.$pic)){echo "Aucune image n'a été supprimée";}
		
		
		//On supprime tout l'évenement de la table SQL.
		$request = "DELETE FROM events WHERE id_event='$id_event'";
		$result =mysql_query($request) or die("Request impossible!");
		
		echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php\"> \n";




?>