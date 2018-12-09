<?php
//require_once('classFilm.inc.php');

class CartItem {
	private $id;
	private $film;
	private $quantity;

	public function __construct($film, $quantity) {
		$this->setFilm($film);
		$this->setQuantity($quantity);
	}

	public function getFilm() {
		return $this->film;
	}

	public function setFilm($film) {
		$this->film = $film;
	}

	public function getQuantity() {
		return $this->quantity;
	}

	public function setQuantity($quantity) {
		$this->quantity = $quantity;
	}
}

?>