window.onload = actionA; //exécution de l'action A au chargement de la page  

function actionA() 
{
	var xhr = new XMLHttpRequest(); //préparation de la requéte
	xhr.open ("GET", "choix.php" , true); //true = asynchrone
	xhr.onload = (e) => { afficher(e); }; 
	xhr.send(); //envoie de la requéte (asynchrone)
}

function afficher(e) // traitement de la réponse AJAX
{
	var reponse = JSON.parse(e.target.responseText); // Recupération du tableau Ajax :
		
	for (let i =0 ; i < reponse.length; i++)
	{
		let choix_case = document.createElement("div"); //on crée une div 
		choix_case.setAttribute("class","case"); //on met attributs class a choix case
		choix_case.id = "m" + reponse[i][0];
		choix_case.innerHTML = reponse[i][0]+ " - " + reponse[i][1]; // on demande colonne 0(id) et colonne 1(titre) à la ligne i
		choix_case.addEventListener('click', travail); //au click sur le bouton réalisation de l'événement travail 
		propositions.appendChild(choix_case);
	} 
		
}

function travail(e)
{
	let num = e.target.id;   // m1
	num = num.split('m')[1]; // [0]:""   [1]:"1" //tri l'id pour avoir que le numéro
	//alert(num); 
	window.location = "QCM.php?numQCM=" + num +"&qnum=1"; //on envoie num qcm et num questions
}	
