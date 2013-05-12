<?php
session_start();
	$_SESSION['login'] = $_POST['login'];
	$_SESSION['pwd'] = $_POST['pwd'];

		if((isset($_SESSION['login'])) && ($_SESSION['login']=='Sushi') && ($_SESSION['pwd']=='meuhnix59'))
		{
			$_SESSION['TIME'] = time();
			echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php\"> \n";
		}
		else
		{
			echo "<meta http-equiv=\"refresh\" content='0;url=login.php?mess=Login error, try again!'> \n";
		}
		
		/*
	if (!isset($_SESSION['CREATED'])) {
		$_SESSION['CREATED'] = time();
	} else if (time() - $_SESSION['CREATED'] > 1800) {
    // session started more than 30 minutes ago
    session_regenerate_id(true);    // change session ID for the current session an invalidate old session ID
    $_SESSION['CREATED'] = time();  // update creation time
}
	*/
	

?>