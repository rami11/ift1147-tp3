<?php
	require_once("../includes/modele.inc.php");

	$tabRes=array();

	function enregistrer() {
		global $tabRes;	
		$title = $_POST['title'];
		$duration = $_POST['duration'];
		$director = $_POST['director'];
		$category = $_POST['category'];
		$price = $_POST['price'];

		$tabRes['success'] = false;

		$tabRes['msg'] = "";
		if (empty($title)) {
			$tabRes['msg'] .= "Le titre est obligatoire.<br>";
			return;
		}
		if (empty($director)) {
		 	$tabRes['msg'] .= "Le réalisateur est obligatoire.<br>";
		 	return;
		}
		if (empty($category)) {
			$tabRes['msg'] .= "La catégorie est obligatoire.<br>";
			return;
		}
		if (empty($duration)) {
			$tabRes['msg'] .= "La durée est obligatoire.<br>";
			return;
		}
		if (empty($price)) {
			$tabRes['msg'] .= "Le prix est obligatoire.<br>";
			return;
		}

		try{
			$unModele = new filmsModele();
			$image = $unModele->verserFichier("img", "image", "avatar.png",$title);
			$requete="INSERT INTO films (title, director, category, duration, price, image) VALUES(?,?,?,?,?,?)";
			$unModele = new filmsModele($requete,array($title, $director, $category, $duration, $price, $image));
			$stmt=$unModele->executer();
			$tabRes['success'] = true;
			$tabRes['msg'] = "Film <em>{$title}</em> bien enregistré.";

			$tabRes['film']['id'] = $unModele->getLastInsertId();
			$tabRes['film']['title'] = $title;
			$tabRes['film']['director'] = $director;
			$tabRes['film']['category'] = $category;
			$tabRes['film']['duration'] = $duration;
			$tabRes['film']['price'] = $price;
			$tabRes['film']['image'] = $image;

		} catch(Exception $e){
			$tabRes['msg'] = $e->getMessage();
		} finally{
			unset($unModele);
		}
	}
	
	// function lister() {
	// 	global $tabRes;
	// 	$tabRes['action']="lister";
	// 	$requete="SELECT * FROM films ORDER BY id DESC";
	// 	try{
	// 		 $unModele=new filmsModele($requete,array());
	// 		 $stmt=$unModele->executer();
	// 		 $tabRes['listeFilms']=array();
	// 		 while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
	// 		    $tabRes['listeFilms'][]=$ligne;
	// 		}
	// 	}catch(Exception $e){
	// 	}finally{
	// 		unset($unModele);
	// 	}
	// }

	// function listCategories() {
	// 	global $tabRes;
	// 	$tabRes['action']="listerCategories";
	// 	$requete="SELECT * FROM categories";
	// 	try{
	// 		 $unModele=new filmsModele($requete,array());
	// 		 $stmt=$unModele->executer();
	// 		 $tabRes['listCategories']=array();
	// 		 while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
	// 		    $tabRes['listCategories'][]=$ligne;
	// 		}
	// 	}catch(Exception $e){
	// 	}finally{
	// 		unset($unModele);
	// 	}
	// }
	
	function enlever(){
		global $tabRes;
		$idf = $_POST['id'];
		$tabRes['id'] = $idf;

		$tabRes['success']=false;
		try {
			$requete = "SELECT * FROM films WHERE id = ?";
			$unModele = new filmsModele($requete, array($idf));
			$stmt = $unModele->executer();
			if ($ligne=$stmt->fetch(PDO::FETCH_OBJ)) {
				$unModele->enleverFichier("img",$ligne->image);
				$requete="DELETE FROM films WHERE id=?";
				$unModele=new filmsModele($requete,array($idf));
				$stmt=$unModele->executer();

				$tabRes['msg']="Film <em>{$idf}</em> bien enlevé.";
				$tabRes['id'] = $idf;
				$tabRes['success']=true;
			} else{
				$tabRes['msg']="Film <em>{$idf}</em> introuvable.";
			}
		} catch(Exception $e){
			$tabRes['msg']=$e->getMessage();
		} finally{
			unset($unModele);
		}
	}
	
	function fiche(){
		global $tabRes;
		$idf=$_POST['numF'];
		$tabRes['action']="fiche";
		$requete="SELECT * FROM films WHERE idf=?";
		try{
			 $unModele=new filmsModele($requete,array($idf));
			 $stmt=$unModele->executer();
			 $tabRes['fiche']=array();
			 if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			    $tabRes['fiche']=$ligne;
				$tabRes['OK']=true;
			}
			else{
				$tabRes['OK']=false;
			}
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	
	function modifier(){
		global $tabRes;	
		$titre=$_POST['titreF'];
		$duree=$_POST['dureeF'];
		$res=$_POST['resF'];
		$idf=$_POST['idf']; 
		try{
			//Recuperer ancienne pochette
			$requette="SELECT pochette FROM films WHERE idf=?";
			$unModele=new filmsModele($requette,array($idf));
			$stmt=$unModele->executer();
			$ligne=$stmt->fetch(PDO::FETCH_OBJ);
			$anciennePochette=$ligne->pochette;
			$pochette=$unModele->verserFichier("pochettes", "pochette",$anciennePochette,$titre);	
			
			$requete="UPDATE films SET titre=?,duree=?, res=?, pochette=? WHERE idf=?";
			$unModele=new filmsModele($requete,array($titre,$duree,$res,$pochette,$idf));
			$stmt=$unModele->executer();
			$tabRes['action']="modifier";
			$tabRes['msg']="Film $idf bien modifie";
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	//******************************************************
	//Contr�leur
	$action=$_POST['action'];
	switch($action){
		case "enregistrer" :
			enregistrer();
			break;
		case "lister" :
			lister();
			break;
		case "listerCategories" :
			listCategories();
			break;
		case "enlever" :
			enlever();
			break;
		case "fiche" :
			fiche();
			break;
		case "modifier" :
			modifier();
			break;
	}
    echo json_encode($tabRes);
?>