<?php
function datefr($date) {
    $split = preg_split("#-#",$date);
    
    $annee = $split[0];
    $mois = $split[1];
    $jour = $split[2];
    
    return $jour."-".$mois."-".$annee;
}
//$date = date("Y-m-d"); // Le contenue de cette variable pourrais provenir d'une base de donnée.


function dateen($date) {
    $split = preg_split("#-#",$date);
    
	$jour = $split[0];
	$mois = $split[1];
    $annee = $split[2];
   
    
    return $annee."-".$mois."-".$jour;
}
//$date = date("Y-m-d"); // Le contenue de cette variable pourrais provenir d'une base de donnée.
//echo datefr($date);


?>