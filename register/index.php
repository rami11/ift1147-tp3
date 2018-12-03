<!DOCTYPE html>
<html>
<head>
  <title>Inscrire</title>
  <link rel="stylesheet" href="../css/login.css" />
  <?php include('../includes/header.html'); ?>
</head>
<body>

<div style="margin-top: 25px">

<div id="view-register" class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="card card-login">
        <!-- card header -->
        <div class="card-header">
          <div class="row">
            <div class="col-sm-6">
              <a class="active" id="register-form-link">Inscrire</a>
            </div>
          </div>
          <hr>
        </div>
        <!-- card body -->
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <!-- <form id="register-form" style="display: block;"> -->
                <!-- username -->
                <div class="form-group">
                  <!-- is-invalid -->
                  <label for="username">Nom d'utilisateur</label>
                  <input type="text" name="username" id="username" class="form-control" autofocus>
                </div>
                <!-- email -->
                <div class="form-group">
                  <label for="email">Courriel</label>
                  <input type="email" name="email" id="email" class="form-control">
                </div>
                <!-- password -->
                <div class="form-group">
                  <label for="password">Mot de passe</label>
                  <input type="password" name="password" id="password" class="form-control">
                </div>
                <!-- confirm password -->
                <div class="form-group">
                  <label for="confirm-password">Confirmer mot de passe</label>
                  <input type="password" name="confirm-password" id="confirm-password" class="form-control">
                </div>
                <!-- register -->
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-6 offset-sm-3">
                      <input type="submit" name="register-submit" id="register-submit" class="form-control btn btn-success" value="Inscrire">
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
              <!-- </form> -->
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