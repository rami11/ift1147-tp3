<?php
require_once("../includes/modele.inc.php");

function doRegister() {
	$resultArray = array();

	$username = $_POST['username'];
	if (empty($username)) {
		$resultArray['msg'][] = "Le nom d'utilisateur est obligatoire.";
	}
	$email = $_POST['email'];
	if (empty($email)) {
		$resultArray['msg'][] = "Le courriel est obligatoire.";
	}
	$password = $_POST['password'];
	if (empty($password)) {
		$resultArray['msg'][] = "Le mot de passe est obligatoire.";
	}
	$confirmPassword = $_POST['confirm-password'];
	
	if ($password != $confirmPassword) {
		$resultArray['msg'][] = "Les deux mots de passe ne correspondent pas.";
	}

	$userCheckQuery = "SELECT * FROM users WHERE username=? OR email=? LIMIT 1";
	$model = new filmsModele($userCheckQuery, array($username, $email));
	$stmt = $model->executer();
	$user = $stmt->fetch(PDO::FETCH_OBJ);

	if ($user) { // if user exists
		if ($user->username === $username) {
		  $resultArray['msg'][] = "Ce nom d'utilisateur existe déjà.";
		}

		if ($user->email === $email) {
		  $resultArray['msg'][] = "Ce courriel existe déjà.";
		}
	}

	if (count($resultArray['msg']) == 0) {
		try {
			// Générer un sel aléatoire à utiliser pour ce compte
			$salt = bin2hex(random_bytes(32));

			$saltedPassword = $password . $salt;
			$hashedPassword = hash("sha256", $saltedPassword);

			$query = "INSERT INTO users (username, email, password, salt) ";
			$query .= "VALUES (?, ?, ?, ?)";
			$model = new filmsModele($query, array($username, $email, $hashedPassword, $salt));
			$stmt = $model->executer();
			
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['email'] = $email;

			$resultArray['success'] = true;
			$resultArray['msg'][] = "Vous vous êtes inscrit!";
			
		} catch(PDOException $e) {
			$resultArray['msg'][] = $e->getMessage();
		}
	}

	echo json_encode($resultArray);
}

doRegister();
?>