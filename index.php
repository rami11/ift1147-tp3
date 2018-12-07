  <?php session_start();
    echo "Hello, world!<br>";
    echo $_SESSION['email'];
    if (isset($_SESSION['email'])) {
      echo "<br>set";
    } else {
      echo "<br>not set";
    }
  ?>

  <!DOCTYPE html>
  <html>
  <head>
    <title>Films</title>
    <link rel="stylesheet" href="css/login.css" />

    <?php include('includes/header.html'); ?>

    <script language="javascript" src="films/filmsRequetes.js"></script>
    <script language="javascript" src="films/filmsControleurVue.js"></script>
    <script language="javascript" src="users/usersQueries.js"></script>
    <script language="javascript" src="js/global.js"></script>
  </head>
  <body>

    <!-- navbar -->
    <nav id="navbar" class="navbar navbar-expand-md navbar-dark bg-dark" style="width: 100%; top:0px; left: 0px; z-index: 999">
      <a class="navbar-brand" style="color: #fff; font-weight: 500;">Films</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link">Tous les films<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Catégories
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="index.php">Tous les films</a>
              <div class="dropdown-divider"></div>
              <div id="dropdown-categories"><!-- Here shown the categories --></div>
            </div>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li id="nav-item-cart" class="nav-item" style="display: none"><a class="nav-link" href="viewsfilms/cart.php"><i class="fas fa-shopping-cart"></i> 0</a></li>
          <li id="nav-item-email" class="nav-item"><a id="nav-item-anchor-email" class="nav-link"><?php echo $_SESSION['email'] ?></a></li>
          <li id="nav-item-logout" class="nav-item" style="display: none"><a class="nav-link" href="viewsfilms/doLogout.php"><i class="fas fa-sign-out-alt"></i> Deconnexion</a></li>
          <li id="nav-item-register"class="nav-item"><a class="nav-link" href="" data-toggle="modal" data-target="#modal-register"><i class="fas fa-user-alt"></i> Devenir membre</a></li>
          <li id="nav-item-login" class="nav-item"><a class="nav-link" href="" data-toggle="modal" data-target="#modal-login"><i class="fas fa-sign-in-alt"></i> Connexion</a></li>
        </ul>
      </div>
    </nav>

    <?php include 'includes/addFilmDialog.html'; ?>

    <?php include 'includes/loginDialog.html'; ?>

    <?php include 'includes/registerDialog.html'; ?>

    <div style=" position: relative; margin-top: 66px">

      <div id="message" style="margin-left: 10px; margin-right: 10px; ">
        <!-- Message -->
      </div>  

      <div id="view-admin"><!-- Admin view --></div>

    </div>

  </body>
  </html>
