//////////////////////////////////////
// Programme Principal ///////////////
//////////////////////////////////////


boutonA.addEventListener('click', actionA);



///////////////////////////////
// Zone pour les fonctions ////
///////////////////////////////

function actionA () // Mécanisme Ajax pour l'appel des données
{
	var xhr = new XMLHttpRequest(); 
	xhr.open("GET", "liste_qcm.php", true);
	xhr.onload = (e) => { afficherA(e); }; // Travail à faire
	xhr.send(); 
}

function afficherA(e)
{
	// Recupération du tableau Ajax :
	var reponse = JSON.parse(e.target.responseText); 
	
	// Créer le menu déroulant ( <select> <option> ...)
	var selecteur = document.createElement("select");
	
	// Creation des <option> pour le <select> :
	for (let i = 0; i < reponse.length; i++)
	{
		
		let une_option = document.createElement("option");
		une_option.innerHTML = reponse[i][0] + " - " + reponse[i][1];
		une_option.value = reponse[i][0];
		selecteur.appendChild(une_option);
	}
	
	// Ajout du <select> complet
	cible.appendChild(selecteur); //permet d'ajouter un élément enfant selecteur sur la page HTML
}
		
	