<div class="philmemheader">
<form method="post" action="index.php" id="settings">
<fieldset>
<legend>Anzahl</legend>
<label for="setNumberOfPlayers">Anzahl der Spieler:</label>
<input id="setNumberOfPlayers" name="setNumberOfPlayers" type="number" min="1" max="3" class="inputNumber" value="<?php echo $game->getNumberOfPlayers(); ?>" />
<br>
<label for="numberOfCards">Anzahl der Karten:</label>
<input type="number" id="numberOfCards" name="numberOfCards" min="10" max="40" step="2" class="inputNumber" value='<?php echo $game->getNumberOfCards(); ?>' />
</fieldset>

<fieldset>
<legend>Namen</legend>
<label class="inputPlayerName" data-id="1" for="Spieler1">Spieler 1:</label>
<input type="text" class="inputPlayerName" data-id="1" name="Spieler1" id="Spieler1" maxlength="25" value="<?php echo $game->nameOfPlayer(1); ?>" />
<br>
<label class="inputPlayerName" data-id="2" for="Spieler2">Spieler 2:</label>
<input type="text" class="inputPlayerName" data-id="2" name="Spieler2" id="Spieler2" maxlength="25" value="<?php echo $game->nameOfPlayer(2); ?>"
<?php if( $game->getNumberOfPlayers() < 2 ) {echo " disabled ";} ?> />
<br>
<label class="inputPlayerName" data-id="3" for="Spieler3">Spieler 3:</label>
<input type="text" class="inputPlayerName" data-id="3" name="Spieler3" id="Spieler3" maxlength="25" value="<?php echo $game->nameOfPlayer(3); ?>" 
<?php if( $game->getNumberOfPlayers() < 3 ) {echo " disabled ";} ?> />
</fieldset>

<fieldset>
<legend>Neues Spiel:</legend>
<input type="reset" />
<br>
<input type="submit" />
</fieldset>
</form>
<div class="clearfix"></div>
</div>

