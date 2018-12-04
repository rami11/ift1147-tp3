<?php
require_once("../includes/modele.inc.php");

function doLogin() {
	//session_start();

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
			$_SESSION['user_session'] = $row->id;
			$_SESSION['email'] = $row->eamil;
			$_SESSION['admin'] = $row->admin;
			echo true;
		} else{
			echo "Le nom d'utilisateur ou le mot de passe est incorrect.";
		}

	} catch(PDOException $e) {
		echo $e->getMessage();
	}
}

doLogin();

?>