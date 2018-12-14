<?php 
require_once("../includes/CartItem.php");
require_once("../includes/modele.inc.php");
require_once('../includes/functions.php');

session_start();

if ($_POST['clear-cart']) {
  unset($_SESSION['cart_item']);
  unset($_SESSION['nb-item']);
}

?>
<!DOCTYPE html>
<html>
<?php include('../includes/header.html'); ?>
<head>
    <title>Panier</title>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" style="color: #fff;" href="../index.php">Accueil client</a>
</nav>
<?php if (!isset($_SESSION['cart_item']) || empty($_SESSION['cart_item'])) : ?>
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Votre panier est vide</h1>
      <p class="lead">Retour à la page d'accueil pour ajouter des films au panier.</p>
    </div>
  </div>
<?php else : ?>
<div style="margin: 25px">
<div style="margin: 10px; position: relative;">
  <div style="display: inline-block;">
     <h4 style="color: #218838">Votre Panier</h4>
  </div>
    <div style="display: inline-block; float: right;">
      <form action="cart.php" method="post">
        <input type="submit" name="clear-cart" class="btn btn-danger" value="Vider le panier"/>
      </form>
    </div>
  
</div>
<table class="table table-striped" style="">
  <thead>
    <tr>
      <th scope="col">Pochette</th>
      <th scope="col">Titre</th>
      <th scope="col">Quantité</th>
      <th scope="col">Prix</th>
      <th scope="col">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if (isset($_SESSION['cart_item'])) {
      foreach ($_SESSION['cart_item'] as $cartItem) :
        $film = $cartItem->getFilm();
        $price = $film->price * $cartItem->getQuantity();
        $subtotal += $price;
    ?>
    <tr>
      <th scope="row"><img src="<?php echo "../img/".$film->image; ?>" style="width:50px; height: 55px;"></th>
      <td ><?php echo $film->title; ?></td>
      <td><?php echo $cartItem->getQuantity(); ?></td>
      <td>$<?php echo $price; ?></td>
      <!-- <td><input type="button" class="btn btn-danger btn-sm" value="Supprimer" /></td> -->
      <td><a class="btn btn-danger btn-sm" href="../cart/removeFromCart.php?id=<?php echo $film->id; ?>">Supprimer</a></td>
    </tr>
    <?php
       endforeach;
       $total = $subtotal + 2.94 + 2.1;
      }
    ?>
  </tbody>
</table>
<div style="text-align: right; float: right;">
  <ul style="list-style: none;">
    <li><b>Sous-total:</b>$<?php echo $subtotal ?></li>
    <li><b>TVQ:</b> $2.94</li>
    <li><b>TPS:</b> $2.1</li>
    <li><b>Total:</b>$<?php echo $total ?></li>
  </ul>
</div>
<div>
<?php endif ?>
</body>
</html>