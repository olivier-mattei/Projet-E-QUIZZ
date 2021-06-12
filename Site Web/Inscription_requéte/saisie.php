<?php
if(isset($_POST['valider']))
{
	$Nom= $_POST['Nom']; // Récupération de la variable Nom par la méthode POST
	$Prenom= $_POST['Prenom'];
	$Password= $_POST['password'];
	$Email= $_POST['email'];
	
	if(!filter_var($Email, FILTER_VALIDATE_EMAIL))
	{
		
		$dbh = new PDO ('mysql:host=78.122.136.24; dbname=equizz', 'qcm', 'projetqcm'); // adresse, nom de la bdd, identifiant et mot de passe de la BDD
		$req = $dbh->prepare("INSERT INTO Etudiants (Nom,Prenom,Mot_de_passe,Mail) VALUES(:nom, :prenom, :password, :email)"); //Préparation de la requête, déclaration des valeurs en paramètres
		$req->bindParam(':nom',$Nom); //Passage du paramètre nom, association de celui-ci avec la variable nom
		$req->bindParam(':prenom',$Prenom); //Passage du paramètre prenom, association de celui-ci avec la variable prenom
		$req->bindParam(':password',$Password); //Passage du paramètre password, association de celui-ci avec la variable password
		$req->bindParam(':email',$Email); //Passage du paramètre email, association de celui-ci avec la variable email
		$req->execute(); // Execution de la requete préparée
	}
}
	
?>
<html>
	<head>
		<meta charset='utf-8'>
		<title> Fin d'inscription </title>
		<link rel="stylesheet" href="php.css">
	</head>
	
	<body>
		<h1> Votre inscription a été validée: 
		</br> 
		avec succès</h1>
		
		<div id="cadre"> <h2> Vos informations </h2> 
			<div id="info1">
				<STRONG>Votre Nom: </STRONG> 
				</br>
				<?php echo $_POST['Nom']; ?>
				</br>
				</br>
				<STRONG>Votre Mot de passe:</STRONG> 
				</br>
				<?php echo $_POST['password']; ?>
			</div>
			
			<div id="info2">
			    <STRONG>Votre Prénom:</STRONG> 
				</br>
				<?php echo $_POST['Prenom']; ?>
				</br>
				</br>
				<STRONG>Votre Email: </STRONG>
				</br>
				<?php echo $_POST['email']; ?>
			
			</div>
			<div id="identifiant">
				Votre identifiant est : 
			</div>
		</div>
	</body>
</html>







