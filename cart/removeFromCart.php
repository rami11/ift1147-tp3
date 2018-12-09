<?php
require_once('../includes/CartItem.php');
// require_once("../includes/modele.inc.php");
require_once("../includes/functions.php");

session_start();

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	foreach ($_SESSION['cart_item'] as $key => $item) {
		if ($item->getFilm()->id == $id) {
			unset($_SESSION['cart_item'][$key]);
			break;
		}
	}

	// Calculate shopping cart quantity
	$nbItems = 0;
	foreach ($_SESSION['cart_item'] as $item) {
		$nbItems += $item->getQuantity();
	}
	$_SESSION['nb-item'] = $nbItems;

	header("location: ../views/cart.php");
}

?>