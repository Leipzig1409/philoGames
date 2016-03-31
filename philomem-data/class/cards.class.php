<?php

class Card {

private $cardPosition;
private $cardControlValue;
private $cardContent;
private $cardID;
private $cardType = "Picture";

function __construct($id,$content) {
	$this->setPosition( $id );
	$this->setContent( $content );
	$this->cardControlValue = $content;
	$this->cardID = "card-" . $id;
}

public function setPosition( $position ) {
	$this->cardPosition = $position;
}

public function getPosition() {
	return $this->cardPosition;
}

public function setContent( $content ) {
	$this->cardContent = $content;
}

public function getContent() {
	return $this->cardContent;
}

public function printCard() {
	?>
	<div class="cardWrapper" data-controlvalue="<?php echo $this->cardControlValue; ?>" id="<?php echo $this->cardID; ?>">
		<div class="card cardFace" id="pictureNumber<?php echo $this->getContent(); ?>">
			<img src="Bilder/<?php echo $this->getContent(); ?>.jpg" width="100px" alt="Bild">
		</div>
		<div class="card cardBack">
			<?php
			?>
		</div>
	</div>
	<?php
}

}


?>