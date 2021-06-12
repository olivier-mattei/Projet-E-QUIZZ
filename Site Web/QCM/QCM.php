<?php
include "accesBdd.php";

$bdd = new accesBdd ('localhost', 'id17025726_equizz', 'id17025726_olimatt', 'cuHXeenhv@$Bgh21FUA6');

$num = $_GET['numQCM'];
$qnum = $_GET['qnum'];

$qnumSuivant = $qnum + 1;

$req="SELECT * FROM questions where fk_qcm = '$num' AND qnum = '$qnum'" ;
$data = $bdd->selectReqN($req); // Tableau à index numérique

if(empty($data)) //si data est égal à rien alors
{
	header('Location: https://e-quizz.000webhostapp.com/QCM/fin.html'); //envoie à la page fin.html
	//header("Location:http://e-quizz:8280/QCM/resultat.php?numQCM=".$num); 
}

?>

<html>
	
	<head>
		<meta charset='utf-8'>
		<link rel="stylesheet" href="QCM.css" />
		<title>Questionnaire </title>
		
		
	</head>
	
	<body>
	
		<div id="bordure">
			<h1> Question N°<?php echo $qnum ?></h1>
			<h2> Questionnaire <?php echo $num ?> </h2>
			
		</div>
		
		<form method="GET"> 
				<input type="submit" value="Suivant" id="suivant"/>
				<input type="hidden" name="qnum" value="<?php echo $qnumSuivant ?>" /> <!-- on affiche le num de la question suivante dans l'URL récuperer par $qnum ensuite -->
				<input type="hidden" name="numQCM" value="<?php echo $num ?>" />	<!-- on affiche num du questionaire dans l'url -->
		</form>
		
		<div id="grandcadre">
				<h3> <?php  echo $data[0][1] ?></h3>
			<div id="persotext">
					<div id="cadre1">
						 
						 <p><?php echo"A.","	",$data[0][2] ?> </p>
					</div>
								
					<div id="cadre2">
						 <p><?php echo"B.","	",$data[0][3] ?></p>
					</div>
								
					<div id="cadre3">
						 <p><?php echo"C.","	",$data[0][4] ?> </p>
					</div>
								
					<div id="cadre4">
					 <p><?php echo"D.","	",$data[0][5] ?></p> 
				    </div>		
			</div>
		</div>
			
	</body>
	
</html>