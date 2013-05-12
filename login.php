<!DOCTYPE html>
<?php 
session_start();
session_destroy();
 ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Esn Events - Login</title>
<link href="css/new_event.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="images/website/favicon.ico">
<script type="text/javascript" src="tiny_mce/tiny_mce.js">

	tinyMCE.init({ 
	mode : "textareas",
	valid_elements : "em/i,strike,u,strong/b,div[align],br,#p[align],-ol[type|compact],-ul[type|compact],-li"
	});

</script>
</head>

<body>
<?php
	$mess = $_GET['mess'];
	
?>
		<br>
		<br>
		<div id="main">
			<br>
			<div id="logo"></div>
			<br>
			<br>
					<form id="form" enctype="multipart/form-data" method="POST" action="logged.php">
						<table  align="center" style="width:20%; background-color: #e6f5fb; color:#0090ce; padding:40px; box-shadow: 5px 15px 20px #555;">
							<tr>
								<td style="color:red;"><center><b><?php echo $mess; ?></b></center></td>
							</tr>
							<tr>
								<td >Username:</td>
							</tr>
							<tr>
								<td><INPUT TYPE="text" NAME="login" value="" SIZE="30" MAXLENGTH="30"></td>
							</tr>
							<tr>
								<td>Password:</td>
							</tr>
							<tr>
								<td><INPUT TYPE="password" NAME="pwd" value="" SIZE="30" MAXLENGTH="30"></td>
							</tr>
							<tr>
								<td><input id='login' type='submit' value= 'Login' ></td>
							</tr>
						</table>
					</form>
			<br>
			<br>
			<br>
		</div>
		
		<div id="frameFoot">
			<center><p>Website made by ESN Valenciennes</p></center>
		</div>

<body>
</html>