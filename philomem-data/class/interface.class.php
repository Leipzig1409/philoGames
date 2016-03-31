

<?php

class JSInterface {
	
	private $playerArray;
	private $cardArray;

function __construct( Game $game ) {
	$this->playerArray = $game->getPlayers();
	$this->cardArray = $game->cards();
}

}


?>

