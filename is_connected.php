<?php
session_start();

			if(!(isset($_SESSION['login'])) || !(isset($_SESSION['pwd'])))
			{
				echo "<meta http-equiv=\"refresh\" content=\"0;url=login.php\"> \n";
			}	
			else
			{
				if(time() - $_SESSION['TIME'] >1800)
				{
					session_destroy();
					echo "<meta http-equiv=\"refresh\" content=\"0;url=login.php\"> \n";
				}
			}
	
?>