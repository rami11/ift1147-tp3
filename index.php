<?php
    session_start();

    if (!isset($_SESSION['username'])) {
      session_unset();
      session_destroy();
    }

    require_once("includes/modele.inc.php");
    require_once('includes/functions.php');

    $films = getFilms($_GET['category']);
    $categories = getCategories();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Films</title>

  <?php include 'includes/header.html'; ?>
  <link rel="stylesheet" href="css/index.css" />

  <script language="javascript" src="films/filmsRequetes.js"></script>
  <script language="javascript" src="films/filmsControleurVue.js"></script>
  <script language="javascript" src="users/usersQueries.js"></script>
  <script language="javascript" src="js/global.js"></script>
</head>
<body>

<!-- Navigation Bar -->
<?php include 'views/navbar.php'; ?>

<div style=" position: relative; margin-top: 15px">
  <div id="message" style="margin-left: 10px; margin-right: 10px; "></div> 

  <?php if ($_SESSION['admin']) : ?>
    <?php include 'views/adminView.php'; ?>
  <?php else : ?>
    <?php include 'views/memberView.php'; ?>
  <?php endif ?>

</div>

<!-- dialogs -->
<?php include 'views/registerDialog.html'; ?>
<?php include 'views/loginDialog.html'; ?>
<?php include 'views/addFilmDialog.php'; ?>

</body>
</html>
