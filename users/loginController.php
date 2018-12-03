<?php
require_once("../includes/modele.inc.php");

$resultArray=array();

function doLogin() {
	session_start();

	if (isset($_POST['btn-login'])) {
		$username = $_POST['login-username'];
		$password = $_POST['login-password'];

		try {
			$query = "SELECT * FROM users WHERE username=:username";
			$model = new filmsModele($query , array(":username" => $username));

			$stmt = $model->executer();

			$row = $stmt->fetch(PDO::FETCH_OBJ);
			$count = $stmt->rowCount();

			if ($row->password == $password) {
				echo "ok"; // log in
				$_SESSION['user_session'] = $row->id;
				$_SESSION['admin'] = $row->admin;
			} else{
				echo "Username or password does not exist."; // wrong details 
			}

		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
}

doLogin();

?>