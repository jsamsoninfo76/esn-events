 <?php 
 session_start();
/********************************/ 
/*                              */ 
/*         CONNECTION           */ 
/*                              */ 
/********************************/ 


  function connect(){
		
		$mydatabase="esn"; 
		  
		//$connection = mysql_connect("mysql","k0137239","a3qDbcaN"); 
		$connection = mysql_connect("localhost","root","mgpr"); 
		// test la connection 
		if ( ! $connection ) 
		  die ("Sorry, connection impossible!"); 
		  // Connecte la base 
		  mysql_select_db($mydatabase) or die ("No connection"); 
		return $connection;
        }

	/***************************************************************/
        // Fermeture de la connexion
        /***************************************************************/
        function close(){
                mysql_close();
        }
		
?> 