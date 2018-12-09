<?php
	session_start();

	function doLogout() {
		session_unset();
		header("location: ../index.php");
	}

	doLogout();

?>