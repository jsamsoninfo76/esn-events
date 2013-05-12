<?php 
include_once("directories.php");
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 2000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
	/*$rename=rand(0,100000);*/

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
	$x = 0;
	
		while(is_file( $users_images_dir. $newfichier))
		{
			//on sépare en deux le nom et l'extension
			list($nom, $ext) = explode(".", $newfichier);
			
			if ((strcmp(substr($nom,-1),$x)==0) && ($x<10)){$nom = substr($nom,0,-1).($x+1);}
			elseif ((strcmp(substr($nom,-2),$x)==0)&& ($x<100)){$nom = substr($nom,0,-2).($x+1);}
			elseif (strcmp(substr($nom,-3),$x)==0){$nom = substr($nom,0,-3).($x+1);}
			else{$nom = $nom."1";}
			//On lui rajoute l'extension pour la copie dans le dossier
			$newfichier= $nom.".".$ext;
			$x++;
		}	
	$savefile = $newfichier;
	
	
	/*
	
	//on sépare en deux le nom et l'extension
			list($nom, $ext) = explode(".", $newfichier);
			
			//Au nom, on rajoute le nombre généré
				$nom = $nom."_".$rename;
			//On lui rajoute l'extension pour la copie dans le dossier
			$savefile= $nom.".".$ext;
	*/
	
  //  echo "Upload: " . $_FILES["file"]["name"] . "<br />";
   // echo "Type: " . $_FILES["file"]["type"] . "<br />";
    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists( $users_images_dir. $savefile))
      {
		echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      $users_images_dir.$savefile);
      //echo "Stored in: " . "images/" . $savefile;
	  
      }
    }
  }
else
  {
  $savefile=NULL;
  }
 
  ?>