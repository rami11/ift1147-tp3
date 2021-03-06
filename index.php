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
  <script language="javascript" src="films/filmsControleurVue.js"></script>
  <script language="javascript" src="users/usersQueries.js"></script>
  <script language="javascript" src="js/global.js"></script>
  <script language="javascript" src="films/filmsRequetes.js"></script>

 
</head>
<body>
<script>
  function onSignIn(googleUser) {
    // Useful data for your client-side scripts:
    var profile = googleUser.getBasicProfile();
    console.log("ID: " + profile.getId()); // Don't send this directly to your server!
    console.log('Full Name: ' + profile.getName());
    console.log('Given Name: ' + profile.getGivenName());
    console.log('Family Name: ' + profile.getFamilyName());
    console.log("Image URL: " + profile.getImageUrl());
    console.log("Email: " + profile.getEmail());

    // The ID token you need to pass to your backend:
    var id_token = googleUser.getAuthResponse().id_token;
    console.log("ID Token: " + id_token);
  }
</script>

  <!-- Navigation Bar -->
  <?php include 'views/navbar.php'; ?>

  <div style=" position: relative; margin-top: 15px">

    <div style="margin-left: 10px; margin-right: 10px; ">
      <div id="message" class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
        <!-- response.msg -->
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div> 

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
  <?php include 'views/updateFilmDialog.php'; ?>

</body>
</html>
