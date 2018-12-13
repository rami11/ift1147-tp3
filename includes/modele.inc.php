<?php
require_once("connexion.inc.php");
class filmsModele{
	private $requete;
	private $params;
	private $connexion;

	private $lastInsertId;
	
function __construct($requete=null,$params=null){
		$this->requete=$requete;
		$this->params=$params;
}
	
function obtenirConnexion(){
	$maConnexion = new Connexion("127.0.0.1", "root", "vector2", "film_store");
	$maConnexion->connecter();
	return $maConnexion->getConnexion();
}

function executer(){
		$this->connexion = $this->obtenirConnexion();
		$stmt = $this->connexion->prepare($this->requete);
		$stmt->execute($this->params);
		$this->lastInsertId = $this->connexion->lastInsertId();
        // var_dump( $this->lastInsertId);
		$this->deconnecter();
		return $stmt;		
	}
function deconnecter(){
		unset($this->connexion);
}

function getLastInsertId(){
	return $this->lastInsertId;
}

function verserFichier($dossier, $inputNom, $fichierDefaut, $chaine){
	$dossier="$dossier/";
	$nomPochette=sha1($chaine.time());
	$pochette=$fichierDefaut;
	if($_FILES[$inputNom]['tmp_name']!==""){
		//Upload de la photo
		$tmp = $_FILES[$inputNom]['tmp_name'];
		$fichier= $_FILES[$inputNom]['name'];
		$extension=strrchr($fichier,'.');
		//echo "folder to move to: ". $dossier.$nomPochette.$extension . "<br>";
 
		// var_dump( $dossier.$nomPochette.$extension );
		// echo __FILE__."";
		// echo " -- ";
		// echo "../".$dossier.$nomPochette.$extension;
		@move_uploaded_file($tmp,"../".$dossier.$nomPochette.$extension);
		// echo move_uploaded_file($tmp,"/var/www/html/ift1147-tp3/img/".$nomPochette.$extension);
		// Enlever le fichier temporaire charg�
		@unlink($tmp); //effacer le fichier temporaire
		$pochette=$nomPochette.$extension;
	}
	return $pochette;
}
function enleverFichier($dossier,$pochette){
	if ($pochette != "avatar.png") {
		$rmPoc="../$dossier/".$pochette;
		$tabFichiers = glob("../$dossier/*");
		//print_r($tabFichiers);
		// parcourir les fichier
		foreach($tabFichiers as $fichier){
		  if(is_file($fichier) && $fichier==trim($rmPoc)) {
			// enlever le fichier
			unlink($fichier);
			break;
		  }
		}
	}
}
}//fin de la classe

?>