<?php

class Game {
	
	private $numberOfPlayers;
	private $numberOfCards;
	private $cardsArray;
	private $playersArray;
	private $prohibited = array("<",">","?",";","\\");

	function __construct() {
		$this->numberOfPlayers = $this->defineNumberOfPlayers();
		$this->numberOfCards = $this->defineNumberOfCards();
		$this->cardsArray = $this->dealOutCards(20);
		$this->playersArray = $this->createPlayers();
	}
	
	
	/**
	* Defining methods that deal with the Players of a game…
	*
	*
	*/

	private function defineNumberOfPlayers() {
	if( 	isset( $_POST["setNumberOfPlayers"] )
			and is_numeric( $_POST["setNumberOfPlayers"] )
			and $_POST["setNumberOfPlayers"] < 5
			and $_POST["setNumberOfPlayers"] > 0 ) {
			$numberOfPlayers = (int) $_POST["setNumberOfPlayers"];
		} else {
			$numberOfPlayers = 1;
		}
	return $numberOfPlayers;
	}
	
	private function createPlayers() {
		$array = array();
		for( $i = 1; $i <= $this->getNumberOfPlayers(); $i++ ) {
			$str = "Spieler" . $i;
			(isset( $_POST[$str] ) and is_string($_POST[$str]) and $_POST[$str] != "") ? $interim = $_POST[$str] : $interim = "Spieler " . $i;
			$interim = preg_replace("/[^a-zA-Z0-9\s]/", "", $interim);
			$interim = preg_replace("/^\s{1,}/", "", $interim);
			$interim = preg_replace("/\s{2,}/", " ", $interim);
			$nameOfPlayer = substr($interim, 0, 25);
			$array[$i] = new Player( $i, $nameOfPlayer );
		};
		return $array;
	}
	
	public function getPlayers() {
		return $this->playersArray;
	}
	
	public function printPlayers() {
		foreach( $this->playersArray as $player ) {
			$player->printPlayerField();
		}
	}
		
	public function nameOfPlayer( $id ) {
		if( $id <= $this->numberOfPlayers ) {
			$player = $this->playersArray[$id];
			return $player->getName();
			} else {
				return "Spieler " . $id;
	}
}
	
		public function getNumberOfPlayers() {
		return $this->numberOfPlayers;
	}
	
	
		/**
		* Defining methods that deal with the cards of a game…
		*
		*
		*/
	
	private function defineNumberOfCards() {
	if( 	isset( $_POST["numberOfCards"] )
			and is_numeric( $_POST["numberOfCards"] )
			and $_POST["numberOfCards"] <= 40
			and $_POST["numberOfCards"] >= 10 ) {
			$numberOfCards = (int) $_POST["numberOfCards"];
		} else {
			$numberOfCards = 24;
		}

	if( $numberOfCards % 2 == 1 ) {
		$numberOfCards--;
		}
	return $numberOfCards;
	}
	
	 /** Funktion, die eine Verteilung der Karten auf ein entsprechendes Array erzeugt.
	 *
	 * Als Input nimmt die Funktion die Anzahl der zu legenden Karten und die möglichen Werte entgegen.
	 * Die möglichen Werte werden zunächst als Zahlen eines bestimmten Bereichs aus N aufgefasst. Dies lässt sich später auf Array-Positionen anwenden.
	 * Als Ausgabe liefert sie ein Array mit den Werten der zu legenden Karten.
	 */
	private function dealOutCards( $numberOfValues ) {
		if( 2 * $numberOfValues < $this->numberOfCards ) {
			return;
		}
		$numberArray = array();
		$cardArray = array();
		$i = 1;
		while( 2 * $i <= $this->numberOfCards) {
			$random = rand(1, $numberOfValues);
			if (! in_array($random, $numberArray) ) {
				array_push($numberArray,$random);
				array_push($numberArray,$random);
				$i++;
				}
				shuffle($numberArray);
			}
			foreach( $numberArray as $ID => $number ) {
				$interim = new Card( $ID, $number );
				array_push($cardArray,$interim);
			}
		return $cardArray;
}
	
	public function getNumberOfCards() {
		return $this->numberOfCards;
	}
	
	public function cards() {
		return $this->cardsArray;
	}
	
	public function printCards() {
		foreach( $this->cards() as $value ) {
			$value->printCard();
		}
	}


}
?>