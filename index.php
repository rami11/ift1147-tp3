  <!DOCTYPE html>
  <html>
  <head>
    <title>Films</title>
    <link rel="stylesheet" href="css/login.css" />

    <?php include('includes/header.html'); ?>

    <script language="javascript" src="films/filmsRequetes.js"></script>
    <script language="javascript" src="films/filmsControleurVue.js"></script>
    <script language="javascript" src="js/global.js"></script>
  </head>
  <body>

    <!-- navbar -->
    <nav id="navbar" class="navbar navbar-expand-md navbar-dark bg-dark" style="position: fixed; width: 100%; top:0px; left: 0px; z-index: 999">
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
          <li id="nav-item-email" class="nav-item"><a class="nav-link"><?php echo $_SESSION['email']." Hi" ?></a></li>
          <li id="nav-item-logout" class="nav-item" style="display: none"><a class="nav-link" href="viewsfilms/doLogout.php"><i class="fas fa-sign-out-alt"></i> Deconnexion</a></li>
          <li id="nav-item-register"class="nav-item"><a class="nav-link" href="register/index.php""><i class="fas fa-user-alt"></i> Devenir membre</a></li>
          <li id="nav-item-login" class="nav-item"><a class="nav-link" href="" data-toggle="modal" data-target="#modal-login"><i class="fas fa-sign-in-alt"></i> Connexion</a></li>
        </ul>
      </div>
    </nav>

    <!-- preview dialog -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="color: #218838;">Ajouter film</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="form-add-film" method="post">
            <div class="modal-body">

              <!-- Add film view -->
              <div class="row">
                <div class="col-md-12">
                  <!-- Errors will show here -->
                  <!-- title -->
                  <div class="form-group row">

                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="title" name="title">
                    </div>

                  </div>
                  <!-- director -->
                  <div class="form-group row">
                    <label for="director" class="col-sm-2 col-form-label">Réalisateur</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="director" name="director">
                    </div>
                  </div>

                  <!-- duration -->
                  <div class="form-group row">
                    <label for="duration" class="col-sm-2 col-form-label">Durée</label>
                    <div class="col-sm-10">
                      <input type="number" min="0" max="300" class="form-control" id="duration" name="duration">
                    </div>
                  </div>
                  <!-- price -->
                  <div class="form-group row">
                    <label for="duration" class="col-sm-2 col-form-label">Prix</label>
                    <div class="col-sm-10">
                      <input type="number" step="0.01" min="0" max="50" class="form-control" id="price" name="price">
                    </div>
                  </div>

                  <!-- category -->
                  <div class="form-group">
                    <select name="category" id="category" class="form-control">
                      <option disabled selected value placeholder="hello">Catégorie</option>                  
                    </select>
                  </div>

                  <!-- image -->
                  <div class="form-group">
                    <input type="file" name="image" id="image">
                  </div>

                  <!-- </form> -->
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button class="btn btn-danger" data-dismiss="modal" onclick="$('#modal input').val('');">Annuler</button>
              <button class="btn btn-success" onclick="addFilmButtonClicked();">Ajouter</button>
            </div>
          </form>
        </div>
      </div>
    </div>


    <!-- Login dialog -->
    <div class="modal fade" id="modal-login" role="dialog" aria-labelledby="modal-login-title" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal-login-title" style="color: #218838;">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="form-add-film" method="post">
            <div class="modal-body">


              <div class="row">
                <div class="col-md-12">
                  <div id="error">
                    <!-- error will be shown here ! -->
                  </div>
                 <!--  <div class="card card-login"> -->
                    <!-- card body -->
                    <!-- <div class="card-body">
                      <div class="row">
                        <div class="col-lg-12"> -->
                          <form id="form-login" action="javascript:void(0);" onsubmit="loginButtonClicked();">
                            <!-- username -->
                            <div class="form-group">
                              <label for="login-username">Nom d'utilisateur ou courriel</label>
                              <input type="text" name="login-username" id="login-username" class="form-control" autofocus>
                            </div>
                            <!-- password -->
                            <div class="form-group">
                              <label for="login-password">Mot de passe</label>
                              <input type="password" name="login-password" id="login-password" class="form-control">
                            </div>
                          </form>
                        <!-- </div>
                      </div>
                    </div> -->
               <!--    </div> -->
                </div>
              </div>


            </div>
            <div class="modal-footer">
              <button class="btn btn-danger" data-dismiss="modal" onclick="$('#modal-login input').val('');">Annuler</button>
              <button class="btn btn-primary" onclick="addFilmButtonClicked();">Se connecter</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div style=" position: relative; margin-top: 66px">

      <div id="message" style="margin-left: 10px; margin-right: 10px; ">
        <!-- Message -->
      </div>  

      <div id="view-admin"><!-- Admin view --></div>

    </div>

  </body>
  </html>