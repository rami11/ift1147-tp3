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
		$id = $_POST['id'];
		$tabRes['id'] = $id;

		$tabRes['success']=false;
		try {
			$requete = "SELECT * FROM films WHERE id = ?";
			$unModele = new filmsModele($requete, array($id));
			$stmt = $unModele->executer();
			if ($ligne = $stmt->fetch(PDO::FETCH_OBJ)) {
				$unModele->enleverFichier("img", $ligne->image);
				$requete="DELETE FROM films WHERE id=?";
				$unModele=new filmsModele($requete,array($id));
				$stmt=$unModele->executer();

				$tabRes['msg']="Film <em>{$id}</em> bien enlevé.";
				$tabRes['id'] = $id;
				$tabRes['success'] = true;
			} else{
				$tabRes['msg']="Film <em>{$id}</em> introuvable.";
			}
		} catch(Exception $e){
			$tabRes['msg']=$e->getMessage();
		} finally{
			unset($unModele);
		}
	}
	
	function fiche() {
		global $tabRes;
		$id = $_POST['id'];
		//$_SESSION['id_film_to_modify'] = $id;
		
		$requete = "SELECT * FROM films WHERE id = ?";
		try {
			 $unModele = new filmsModele($requete, array($id));
			 $stmt=$unModele->executer();
			 $tabRes['film'] = array();
			 if ($ligne = $stmt->fetch(PDO::FETCH_OBJ)) {
			    $tabRes['film'] = $ligne;
				$tabRes['success']  = true;
			} else {
				$tabRes['success'] = false;
			}
		} catch(Exception $e){

		} finally {
			unset($unModele);
		}
	}
	
	function modifier(){
		global $tabRes;	

		$id = $_POST['id'];
		$title = $_POST['title'];
		$director = $_POST['director'];
		$category = $_POST['category'];
		$duration = $_POST['duration'];
		$price = $_POST['price'];

		$tabRes['success'] = false;

		$tabRes['msg'] = array();
		if (empty($title)) {
			$tabRes['msg'][] = "Le titre est obligatoire.<br>";
		}
		if (empty($director)) {
		 	$tabRes['msg'][] = "Le réalisateur est obligatoire.<br>";
		}
		if (empty($category)) {
			$tabRes['msg'][] = "La catégorie est obligatoire.<br>";
		}
		if (empty($duration)) {
			$tabRes['msg'][] = "La durée est obligatoire.<br>";
		}
		if (empty($price)) {
			$tabRes['msg'][] = "Le prix est obligatoire.<br>";
		}
		
		if (count($resultArray['msg']) == 0) {
			try {
				//Recuperer ancienne pochette
				$requette = "SELECT image FROM films WHERE id = ?";
				$unModele = new filmsModele($requette, array($id));
				$stmt = $unModele->executer();
				$ligne = $stmt->fetch(PDO::FETCH_OBJ);
				$oldImage = $ligne->image;
				$image = $unModele->verserFichier("img", "image", $oldImage, $titre);	
				
				$requete = "UPDATE films SET ";
				$requete .= "title = ?, director = ?, category = ?, duration = ?, price = ?, image = ? ";
				$requete .= "WHERE id = ?";
				$unModele = new filmsModele($requete, array($title,$director,$category,$duration,$price,$image,$id));
				$stmt = $unModele->executer();
				//$film=$stmt->fetch(PDO::FETCH_OBJ);
				//var_dump($film);

				// $tabRes['action']="modifier";
				$tabRes['success'] = true;
				$tabRes['film'] = true;
				$tabRes['message'] = "Film <em>{$id}</em> bien modifie ";
			}catch(Exception $e){
				$tabRes['msg'][] = $e->getMessage();
			}finally{
				unset($unModele);
			}
		}
	}
	//******************************************************
	//Controleur
	$action=$_POST['action'];
	switch($action){
		case "enregistrer" :
			enregistrer();
			break;
		// case "lister" :
		// 	lister();
		// 	break;
		// case "listerCategories" :
		// 	listCategories();
		// 	break;
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