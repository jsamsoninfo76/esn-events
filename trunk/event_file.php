<?php
session_start();
include_once("connect_SQL.php");


if ($_FILES["file"]["size"] < 20000000)
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
	$rename=rand(0,100000);	// ATTENTION !!!!!!!!! Codé comme un cochon, on renome le fichier avec un nombre généré aléatoirement entre 0 et 100000.
							// Cependant, il n'y pas "impossible" que le fichicher renomé porte le même non qu'un fichier éxistant => écrasement
							// Solution, avant de renomé, vérifier si fichier existant porte le même nom, si oui, on renome le notre en lui ajoutant un nombre
							//incrémenté de 1. Et ainsi de suite.
							
		$fichier_name = $_FILES["file"]["name"];

	
	//On remplace les éventuels espaces dans le nom du fichier par des underscore
	$fichier_name = str_replace (" ", "_", $fichier_name);
	
	//On remplace les A avec accent par un A normal
	$a = array("ä", "â", "à");
	$fichier_name = str_replace ($a, "a", $fichier_name);
		
	//On remplace les E avec accent par un E normal
	$e = array("é", "è", "ê", "ë");
	$fichier_name = str_replace ($e, "e", $fichier_name);
	
	//On remplace les I avec accent par un I normal
	$i = array("ï", "î");
	$fichier_name = str_replace ($i, "i", $fichier_name);
	
	//On remplace les O avec accent par un O normal
	$o = array("ö", "ô");
	$fichier_name = str_replace ($o, "o", $fichier_name);
	
	//On remplace les U avec accent par un U normal
	$u = array("ù", "û", "ü");
	$fichier_name = str_replace ($u, "u", $fichier_name);
	
	//On met le nom du fichier dans la variable $newfichier
	$newfichier=$fichier_name;

	//on sépare en deux le nom et l'extension
	list($nom, $ext) = explode(".", $newfichier);

	//Au nom, on rajoute un underscore et le nombre généré
	$nom = $nom."_".$rename;

	//On lui rajoute l'extension pour la copie dans le dossier
	$savefile= $nom.".".$ext;
	
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("images/" . $savefile))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "images/" . $savefile);
      echo "Stored in: " . "images/" . $savefile;
	  
      }
    }
  }
else
 {
  $savefile=NULL;
  }

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