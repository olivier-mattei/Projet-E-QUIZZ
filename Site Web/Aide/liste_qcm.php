<?php

include "accesBdd.php";

$bdd = new accesBdd ('78.122.136.24', 'equizz', 'qcm', 'projetqcm');

$req = "SELECT * FROM qcm";
$data = $bdd->selectReq($req); // Tableau à index numérique

$json = json_encode($data); 
   
// Envoi des données à l'AJAX au format JSON 
echo($json); 

?>