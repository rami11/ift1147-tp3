<!-- navbar -->
    <nav id="navbar" class="navbar navbar-expand-md navbar-dark bg-dark" style="width: 100%; top:0px; left: 0px; z-index: 999">
      <a class="navbar-brand" style="color: #fff; font-weight: 500;">Films</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link"><?php echo empty($_GET['category']) ? "Tous les films" : $_GET['category']; ?><span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Catégories
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="index.php">Tous les films</a>
              <div class="dropdown-divider"></div>
              <form action="index.php" method="get">
                <?php foreach ($categories as $category) : ?>
                    <input class="dropdown-item" type="submit" name="category" value="<?php echo htmlentities($category->name) ?>" />
                <?php endforeach ?>
              </form>
            </div>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php if (isset($_SESSION['username'])) : ?>
            <?php if ($_SESSION['admin'] == false) : ?>
              <li id="nav-item-cart" class="nav-item"><a class="nav-link" href="views/cart.php"><i class="fas fa-shopping-cart"></i> <?php echo isset($_SESSION['cart_item']) ? $_SESSION['nb-item'] : "0"; ?></a></li>
            <?php endif ?>
          <li id="nav-item-email" class="nav-item"><a id="nav-item-anchor-email" class="nav-link"><?php echo $_SESSION['email'] ?></a></li>
          <li id="nav-item-logout" class="nav-item"><a class="nav-link" href="users/logoutController.php"><i class="fas fa-sign-out-alt"></i> Deconnexion</a></li>
          <?php else : ?>
            <li id="nav-item-register"class="nav-item"><a class="nav-link" href="" data-toggle="modal" data-target="#modal-register"><i class="fas fa-user-alt"></i> Devenir membre</a></li>
            <li id="nav-item-login" class="nav-item"><a class="nav-link" href="" data-toggle="modal" data-target="#modal-login"><i class="fas fa-sign-in-alt"></i> Connexion</a></li>
          <?php endif ?>
        </ul>
      </div>
    </nav>