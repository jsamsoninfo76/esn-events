<!DOCTYPE html>
<?php 
session_start(); 
include_once("is_connected.php");
include_once("directories.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>ESN Style</title>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	     <link rel="stylesheet" media="screen" type="text/css" title="Design" href="css/main.css" />
		 <link rel="shortcut icon" href="<?php echo $website_images_dir;?>/favicon.ico">
		 <link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
		 <link href='http://fonts.googleapis.com/css?family=Lobster+Two:700' rel='stylesheet' type='text/css'>
		 <link href='http://fonts.googleapis.com/css?family=Baumans' rel='stylesheet' type='text/css'>
		 
		 <script>
		 function goto_confirm(url)

		{

		  if(confirm("Are you sure you want to delete this event??")) document.location.href = url;

		  return false; //pour ne pas revenir au début de la page

		}

		</script>
   </head>
 
   <body>

<?php

include_once("connect_SQL.php");
include_once("date_fr.php");
include("top.php");

		echo $_SESSION['login'];
		echo "<br>";
		echo "<br>";
		echo "<div id=\"main\">";
		echo "<br>";
		echo "<a href=\"index.php\"><div id=\"logo\"></div></a>";
		echo "<br>";
		echo "<br>";
		echo "<div id=\"button_contener\"><a href=\"new_event.php\"><div id=\"button\"></div></a></div>";
		
		connect();
		$select = 'SELECT * FROM events';
		$result = mysql_query($select) or die ('Erreur : '.mysql_error() );
		$total = mysql_num_rows($result);
		
		/***********************************************************************************************/
		/***********************************************************************************************/
		/*************   On vérifie si des evénements sont passés, on update    ************************/
		/***********************************************************************************************/
		/***********************************************************************************************/

		while($row = mysql_fetch_array($result)) {
			
			$id_event=$row["id_event"];
			$query="SELECT fait, date_event FROM events WHERE id_event='$id_event' and fait='0'";
			$result1=mysql_query($query);
			$row1 = mysql_fetch_array($result1);
			
			
			// si on a récupéré un résultat on l'affiche.
			if($total) {
					
				$date_event = $row1['date_event'];
				$todays_date = date("Y-m-d");

				$today = strtotime($todays_date);
				$date_eventBDD = strtotime($date_event);

				if ($date_eventBDD < $today) {
						$request3 = "UPDATE events SET fait= '1' WHERE id_event='$id_event' ";
						$result3 =mysql_query($request3) or die("Request impossible!");
				}
			}
		}
		
		/***********************************************************************************************/
		/***********************************************************************************************/
		/*************                Tableau, les événement à venir            ************************/
		/***********************************************************************************************/
		/***********************************************************************************************/
		
		echo "<h3>Events to come</h3>";
		$query="SELECT * FROM events WHERE fait='0' ORDER BY date_event";
		$result = mysql_query($query) or die ('Erreur : '.mysql_error() );
		$total = mysql_num_rows($result);
		tab($result);
		
		/***********************************************************************************************/
		/***********************************************************************************************/
		/*************               Tableau les evenements passés              ************************/
		/***********************************************************************************************/
		/***********************************************************************************************/
		echo "<h3>Previous events</h3>";
		$query="SELECT * FROM events WHERE fait='1' ORDER BY date_event DESC";
		$result = mysql_query($query) or die ('Erreur : '.mysql_error() );
		$total = mysql_num_rows($result);
		tab($result);
		
		
		
		// on libère le résultat
		mysql_free_result($result);
					
		echo "</div>";
		echo  " <div id=\"frameFoot\">";
		echo	  " <p>Website made by ESN Valenciennes</p>";
		echo  " </div>";
	
	
	
	function tab($result)
	{
		include("directories.php");
		// debut du tableau 1
		echo '<table class ="table_blue" id="table_index" align="center">';
		echo "<tr class=\"i_tr\">";
		echo "<th style=\"width:100px;\">Date</th>";
		echo "<th style=\"width:64px;\">Picture</th>";
		echo "<th style=\"width:150px;\">Name</th>";
		echo "<th  style=\"width:526px\" >Description</th>";
		echo "</tr>";
		// lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne.    
		while($row1 = mysql_fetch_array($result)) {
					
			$id_event=$row1["id_event"];
			$query="SELECT picture_event, name_event, description_event, date_event FROM events WHERE id_event='$id_event'";
			$result2=mysql_query($query);
			$row2 = mysql_fetch_array($result2);
			$des = truncate($row2['description_event']);
						
			echo "<tr class=\"i_tr\" >";
			echo "<td onclick=\"document.location='event.php?id_event=".$id_event."'\">";		
			echo datefr($row2['date_event']);											
			echo "</td>";
			echo "<td>";
			if ($row2['picture_event']==NULL){
				echo '<img src="'.$website_images_dir.'masques.png">';
			}else{
				echo "<a href=\"".$users_images_dir."/".$row2['picture_event']."\"><img src=\"".$users_images_dir."/".$row2['picture_event']."\"></a>";
				}
			echo "</td>";
			echo "<td onclick=\"document.location='event.php?id_event=".$id_event."'\">";							
			echo $row2['name_event'];
			echo "</td>";
			echo "<td onclick=\"document.location='event.php?id_event=".$id_event."'\">";
			echo $des;
			echo "</td>";
			echo "<td  style=\"background:white;\" >";
			echo "<div class=\"icones\">";
				echo "<a href=\"edit.php?id_event=".$id_event."\"><div class=\"icone1\"></div></a>";
				echo "<a href=\"#\" onclick=\"return goto_confirm('delete.php?id_event=".$id_event."');\" ><div class=\"icone2\"></div></a>";
			echo "</div>";
			echo "</td>";
			echo "</tr>";
		}					
		echo '</table>';
		echo "<br>";
		// fin du tableau.
		echo "<br>";
	}
	
	function truncate($text)
   {
      $trunc = (strlen($text)>130)?true:false;

      if($trunc)
         return substr(strip_tags($text), 0, 130).'...';
      else
         return $text;
   }
?>
 </body>
</html>