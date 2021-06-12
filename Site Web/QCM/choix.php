<?php
	
include "accesBdd.php";
$bdd = new accesBdd ('localhost', 'id17025726_equizz', 'id17025726_olimatt', 'cuHXeenhv@$Bgh21FUA6');

$req="SELECT * FROM qcm";
$data = $bdd->selectReq($req); // Tableau à index numérique

$json = json_encode($data); // Envoi des données à l'AJAX au format JSON 

echo ($json) ;

?>

