<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="../css/login.css" />
  <?php include('../includes/header.html'); ?>
  <script type="text/javascript" src="../users/usersQueries.js"></script>
</head>
<body>
<div style="margin-top: 25px">
  <!-- login view -->
  <div id="view-login" class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div id="error">
        <!-- error will be shown here ! -->
        </div>
        <div class="card card-login">
          <!-- card heading -->
          <div class="card-header">
            <div class="row">
              <div class="col-sm-6">
                <a class="active" id="login-form-link">Connexion</a>
              </div>
            </div>
            <hr>
          </div>
          <!-- card body -->
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
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
                  <!-- login -->
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 offset-sm-3">
                        <!-- <input type="button" name="btn-login" id="btn-login" class="form-control btn btn-primary" value="Se connecter" onclick="loginButtonClicked();"> -->
                        <button type="submit" name="btn-login" id="btn-login" class="form-control btn btn-primary">Se connecter</button>
                      </div>
                    </div>
                  </div>
                  <!-- cancel -->
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 offset-sm-3">
                        <a class="form-control btn btn-danger" href="../index.php">Annuler</a>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>