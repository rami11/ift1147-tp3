<?php
require_once("../includes/CartItem.php");
require_once("../includes/modele.inc.php");
require_once("../includes/functions.php");


session_start();


$film = getFilm($_GET['id']);
$quantity = $_POST['quantity'];

$cartItem = NULL;
if (is_array($_SESSION['cart_item']) || is_object($_SESSION['cart_item'])) {
	foreach ($_SESSION['cart_item'] as $item) {
		if ($item->getFilm() == $film) {
			$cartItem = $item;
			break;
		}
	}
}

if ($cartItem) {
	$cartItem->setQuantity($cartItem->getQuantity() + $quantity);

} else {
	$cartItem = new CartItem($film, $quantity);
	$_SESSION['cart_item'][] = $cartItem;
}

// Calculate shopping cart quantity
$nbItems = 0;
foreach ($_SESSION['cart_item'] as $item) {
	$nbItems += $item->getQuantity();
}
$_SESSION['nb-item'] = $nbItems;

header("location: ../views/cart.php");

?>