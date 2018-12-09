<div class="container">
	<div class="row">
		<?php //echo "Hello world!<br>" ?>
		<?php //var_dump($films) ?>

		<?php foreach ($films as $film) : ?>

			<div class="col-12 col-sm-6 col-md-4 col-lg-3">
				<div class="card-film card text-center">
					<img id="<?php echo $film->id; ?>" class="img-film card-img-top" src="<?php echo 'img/'.$film->image ?>" alt="Card image cap" data-toggle="modal" data-target="#modal<?php echo $film->id; ?>">
					<div class="card-body">
						<h5 class="card-title"><?php echo $film->title ?></h5>
						<h6 class="card-subtitle mb-2 text-muted"><?php echo $film->director ?></h6>
						<h6 class="card-subtitle mb-2 text-muted"><?php echo $film->category ?></h6>
						<h6 class="card-subtitle mb-2 text-muted" style="font-style: italic;">$<?php echo $film->price ?></h6>
						<?php if (isset($_SESSION['username'])) : ?>
							<form id="add-to-cart-form" name="add-to-cart-form" action="cart/addToCart.php?id=<?php echo $film->id ?>" method="post">
								<div>
									<input type="number" class="number-picker" name="quantity" min="1" max="50" value="1"/>
								</div>
								<div>
									<button type="submit" name="add-to-cart-submit" class="btn btn-success btn-sm" style="margin-top: 10px"><i class="fas fa-shopping-cart"></i>&nbsp;Ajouter</button>
								</div>
							</form>
						<?php endif ?>
					</div>
				</div>
			</div>


		<?php endforeach ?>

	</div>
</div>
