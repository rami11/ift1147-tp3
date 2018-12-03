<?php
require_once("../includes/modele.inc.php");

function doLogin() {
	//$resultArray=array();
	//session_start();

	if (isset($_POST['btn-login'])) {

		$username = $_POST['login-username'];
		$password = $_POST['login-password'];

		try {
			$query = "SELECT * FROM users WHERE (username=:username OR email = :usename)";
			$model = new filmsModele($query, array(':username' => $username));
			$stmt = $model->executer();

			$row = $stmt->fetch(PDO::FETCH_OBJ);
			$count = $stmt->rowCount();

			$saltedPassword =  $password . $row->salt;
			$hashedPassword = hash('sha256', $saltedPassword);

			if ($count == 1 && $row->password == $hashedPassword) {
				echo "ok"; // log in
				$_SESSION['user_session'] = $row->id;
				$_SESSION['admin'] = $row->admin;
			} else{
				echo "Le nom d'utilisateur ou le mot de passe est incorrect.";
			}

		} catch(PDOException $e) {
			echo "bla bla bla";
			//echo $e->getMessage();
		}
	}
}

session_start();
doLogin();

?>