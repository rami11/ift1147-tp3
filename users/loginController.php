<?php
require_once("../includes/modele.inc.php");

function doLogin() {
	//session_start();
	$resultArray = array();

	$username = $_POST['login-username'];
	$password = $_POST['login-password'];

	try {
		$query = "SELECT * FROM users WHERE (username=? OR email = ?);";
		$model = new filmsModele($query, array($username, $username));
		$stmt = $model->executer();

		$row = $stmt->fetch(PDO::FETCH_OBJ);
		$count = $stmt->rowCount();

		$saltedPassword =  $password . $row->salt;
		$hashedPassword = hash('sha256', $saltedPassword);

		if ($count == 1 && $row->password == $hashedPassword) {
			session_start();
			$_SESSION['user_session'] = $row->id;
			$_SESSION['email'] = $row->email;
			$_SESSION['admin'] = $row->admin;

			$resultArray['success'] = true;
			$resultArray['message'] = "Vous vous êtes connecter!";
			$resultArray['email'] = $row->email;
			$resultArray['admin'] = $row->admin;

		} else{
			$resultArray['success'] = false;
			$resultArray['message'] = "Le nom d'utilisateur ou le mot de passe est incorrect.";
		}

	} catch(PDOException $e) {
		$resultArray['message'] = $e->getMessage();
	}

	echo json_encode($resultArray);
}

doLogin();

?>