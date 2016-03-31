<?php

class Player {
	
	private $name;
	private $playerId;

	function __construct( $id, $newname ) {
		// Ein Constructor, der den Namen und die Spieler-Id festlegt.
		$newname = $newname ? $newname : "Spieler ".$id;
		$this->name = $newname;
		$this->playerId = $id;
	}
	
	public function getName() {
		return $this->name;
	}
	public function setName($newname) {
		$this->name = $newname;
	}
	
	public function getID() {
		return $this->playerId;
	}
	
	public function printPlayerField() {
		?>
		   <div id="panelPlayer<?php echo $this->getID(); ?>" class="playerPanel">
  			<h1 id="namePlayer<?php echo $this->getID(); ?>"><?php echo $this->getName(); ?></h1>
			<p>gewonnene Karten:</p>
			<p><span id="wonPairsPlayer<?php echo $this->getID(); ?>">0</span> Paare</p>
			<p>nach <span id="movesPlayer<?php echo $this->getID(); ?>">0</span> Versuchen.</p>
			</div>
<?php

	}

}

?>