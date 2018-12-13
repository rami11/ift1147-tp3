<?php
require_once("../includes/modele.inc.php");

function doLogin() {
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
			$_SESSION['username'] = $row->username;
			$_SESSION['email'] = $row->email;
			$_SESSION['admin'] = $row->admin;

			$resultArray['success'] = true;
			$resultArray['msg'] = "Vous vous êtes connecter!";

		} else{
			$resultArray['success'] = false;
			$resultArray['msg'] = "Le nom d'utilisateur ou le mot de passe est incorrect.";
		}

	} catch(PDOException $e) {
		$resultArray['msg'] = $e->getMessage();
	}

	echo json_encode($resultArray);
}

doLogin();
?>