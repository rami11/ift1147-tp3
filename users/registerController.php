<?php
require_once("../includes/modele.inc.php");

function doRegister() {
	$resultArray = array();

	$username = $_POST['username'];
	if (empty($username)) {
		$resultArray['msg'][] = "Le nom d'utilisateur est obligatoire.";
	}
	$email = $_POST['email'];
	if (empty($username)) {
		$resultArray['msg'][] = "Le courriel est obligatoire.";
	}
	$password = $_POST['password'];
	$confirmPassword = $_POST['confirm_password'];
	if ($password != $confirmPassword) {
		$resultArray['msg'][] = "Les deux mots de passe ne correspondent pas.";
	}


	$userCheckQuery = "SELECT * FROM users WHERE username=? OR email=? LIMIT 1";
	$model = new filmsModele($userCheckQuery, array($username, $email));
	$stmt = $model->executer();
	$user = $stmt->fetch(PDO::FETCH_OBJ);
	// $result = mysqli_query($connection, $userCheckQuery);
	// $user = mysqli_fetch_assoc($result);

	if ($user) { // if user exists
		if ($user->username === $username) {
		  $resultArray['msg'][] = "Ce nom d'utilisateur existe déjà.";
		}

		if ($user->email === $email) {
		  $resultArray['msg'][] = "Ce courriel existe déjà.";
		}
	}

	var_dump($resultArray['msg']);

	if (count($resultArray['msg']) > 0) {
		return;
	}

	try {
		// $query = "SELECT * FROM users WHERE (username=? OR email = ?);";
		// $model = new filmsModele($query, array($username, $username));
		// $stmt = $model->executer();

		// $row = $stmt->fetch(PDO::FETCH_OBJ);
		// $count = $stmt->rowCount();

		// $saltedPassword =  $password . $row->salt;
		// $hashedPassword = hash('sha256', $saltedPassword);

		// if ($count == 1 && $row->password == $hashedPassword) {
		// 	session_start();
		// 	$_SESSION['user_session'] = $row->id;
		// 	$_SESSION['username'] = $row->username;
		// 	$_SESSION['email'] = $row->email;
		// 	$_SESSION['admin'] = $row->admin;

		// 	$resultArray['success'] = true;
		// 	$resultArray['msg'][] = "Vous vous êtes connecter!";

		// } else{
		// 	$resultArray['success'] = false;
		// 	$resultArray['msg'][] = "Le nom d'utilisateur ou le mot de passe est incorrect.";
		// }
		// Générer un sel aléatoire à utiliser pour ce compte
		$salt = bin2hex(random_bytes(32));

		$saltedPassword = $password . $salt;
		$hashedPassword = hash("sha256", $saltedPassword);

		// $query = "INSERT INTO users (username, email, password, salt) ";
		$query = "INSERT INTO users (username, email, password, salt) ";
		// $query .= "VALUES ('$username', '$email', '$hashedPassword', '$salt')";
		$query .= "VALUES (?, ?, ?, ?)";
		$model = new filmsModele($query, array($username, $email, $hashedPassword, $salt));
		$stmt = $model->executer();

		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['email'] = $email;
		$_SESSION['success'] = "You are now registered";

		$resultArray['success'] = true;
		$resultArray['msg'][] = "Vous vous êtes inscrit!";

	} catch(PDOException $e) {
		$resultArray['msg'][] = $e->getMessage();
	}

	echo json_encode($resultArray);
}

doRegister();
?>