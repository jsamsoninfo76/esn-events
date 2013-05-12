<?php
session_start();
	echo ('<div id="top"><table   style="">
			<tr>
				<td>Bonjour '.$_SESSION['login'].' | <a href="login.php" style="text-decoration:none;">Logout</a></td>
			</tr>
		</table></div>');
?>