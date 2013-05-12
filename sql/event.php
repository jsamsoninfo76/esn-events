<!DOCTYPE html>
<?php
/*session_start();*/
include_once("is_connected.php");
include_once("connect_SQL.php");
include_once("date_fr.php");
include("directories.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Da ESN Event Form Bro! </title>
<link href="css/new_event.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="<?php echo $website_images_dir; ?>/favicon.ico">
<link href='http://fonts.googleapis.com/css?family=Baumans' rel='stylesheet' type='text/css'>
<script type="text/javascript">
	
		 function goto_confirm(url)

		{

		  if(confirm("Are you sure you want to delete this event??")) document.location.href = url;

		  return false; //pour ne pas revenir au début de la page

		}


</script>
</head>

<?php


		$id_event = $_GET['id_event'];

		$query = "SELECT * FROM events WHERE id_event ='$id_event'";
		connect();
		$result = mysql_query($query) or die("Request impossible!");
		$row = mysql_fetch_array($result);
		
		$name = $row['name_event'];
		$date = datefr($row['date_event']);
		$time = $row['time_event'];
		$persons = $row['persons'];
		$description = $row['description_event'];
		$pic = $row['picture_event'];
?>
<body>
			<br>
			<br>
			<div id="main">
			<br>
			<a href="index.php"><img src="<?php echo $website_images_dir; ?>/LOGO_CYGNE.jpg"	style="width:900px;	height:200px;	position: relative;"/></a>
			
			<div id="pic">
				<?php 
					if ($row['picture_event']==NULL){
						echo "<img src=\"".$website_images_dir."/masques.png\">";
					}else{
						echo "<a href=\"".$users_images_dir."/".$pic."\"><img src=\"".$users_images_dir."/".$pic."\"></a>";
					} 
				?>
			</div>
			
			<div id="date"><p><?php echo $date; ?>  <?php echo $time; ?></p></div>
				
			<center><div id="name"><p><?php echo $name ?></p></div></center>
				
			<br>
			<br>
			<div id="content_event">
				<h4>Persons in charge: </h4>	
					<p>
					<?php echo nl2br($persons) ?>
					</p>
					</br>
				<h4>Description of the event: </h4>	
					<p>
					<?php echo nl2br($description) ?>
					</p>
					</br>
					
			</div>		
					
					<!--
					<table  align="center" style="width:95%;">
					<tr>
						<td><span>Persons in charge:</span></td>
					</tr>
					<tr>
						<td><p id="tab_titles">Description of the event:</p></td>
					</tr>
					<tr>
						<td><?php /*echo $description */?></td>
					</tr>
					</table>			-->	
					<br>
					<?php
						
						echo "<div id=\"button_contener\">";
							echo "<a href=\"delete.php?id_event=".$id_event."\" onclick=\"return goto_confirm('delete.php?id_event=".$id_event."');\"><div id=\"buttondelete\"></div></a>";
							echo "<a href=\"edit.php?id_event=".$id_event."\"><div id=\"buttonedit\"></div></a>";
							echo "<div onclick=\"window.print();return false;\"id=\"buttonprint\"></div>";
						echo "</div>";
					?>	
				<br>
				<br>
			</div>
			<div id="frameFoot">
				<center><p>Website made by ESN Valenciennes</p></center>
			</div>
		
</body>
</html>