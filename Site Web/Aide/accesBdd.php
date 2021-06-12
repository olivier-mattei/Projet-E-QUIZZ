<?php

class accesBdd {

	private $my; // descripteur connexion
	private $host;
	private $base;
	private $nom;
	private $mdp;
	
	public function __construct($host, $base, $login, $mdp)	{

		$this->host = $host;
		$this->base = $base;
		$this->nom = $login;
		$this->mdp = $mdp;


		try {
			$this->my = new PDO('mysql:host='.$this->host.';dbname='.$this->base, $this->nom, $this->mdp);
		}
		catch (Exception $e) {
			echo "ERR Exception : ". $e->getMessage();
			die();
		}
	}
	
	public function simpleReq($req) {
		if ($this->my->query($req) )
			return "OK";
		else
			return "KO";
	}
	
	public function selectReq($req) {
		$sql = $this->my->prepare($req);
		$sql->execute();
		return $sql->fetchAll(); // Double resultat (Numerique et associatif)
	}
	
	public function selectReqN($req) {
		return $this->select($req, PDO::FETCH_NUM); // Resultat Numerique
	}
	
	public function selectReqA($req) {
		return $this->select($req, PDO::FETCH_ASSOC); // Resultat associatif
	}
	
	public function selectReqO($req) {
		return $this->select($req, PDO::FETCH_OBJ); // Resultat objet
	}
	
	private function select($req, $methode) {
		$sql = $this->my->prepare($req);
		$sql->execute();
		return $sql->fetchAll($methode); 
	}
	
	
}	

?>
