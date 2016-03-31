$(document).one("ready",startGame);


function startGame() {
	$("header").addClass("notFixed");
	$("nav").addClass("notFixed");
    $("#socialWrapper").addClass("notFixed");
    $("nav a").removeClass("current");

    numberOfPlayers = $(".philmemaside .playerPanel").length;
console.log("Anzahl der Spieler: "+numberOfPlayers);
numberOfCards = $(".philmemmain .cardWrapper").length;
console.log("Anzahl der Karten: "+numberOfCards);
chosenInterval = 1000;
playerInCharge = 0;
numberOfPairsLeft = numberOfCards / 2;
numberOfPairsFound = 0;
playersArray = new Array();
cardsArray = new Array();
openCards = new Array();
definePlayers();
defineCards();
clearPlayerPanels();
$(".philmemmain").on("click",".cardWrapper",activate);

$("form").on("click",".inputPlayerName",changeNumberOfPlayers);
$("#setNumberOfPlayers").on("change",newPlayer);

    }

function endGame() {
	$(".philmemmain").off("click");
}

function changeNumberOfPlayers() {
	var numberOfNameFields = $(this).data("id");
	if ( numberOfNameFields > $("#setNumberOfPlayers").val() ) {
		$("#setNumberOfPlayers").val( numberOfNameFields );
		newPlayer();
	}
}

function newPlayer() {
	var numberOfFields = $("#setNumberOfPlayers").val();
	$("form .inputPlayerName").removeAttr("disabled");
	for ( var i = 3; i > numberOfFields; i-- ) {
		var j = "#Spieler" + i;
		$(j).attr('disabled','disabled');
	}
}

function clearPlayerPanels() {
	$(".philmemaside .playerPanel")
	.removeClass("inCharge")
	.eq(playerInCharge)
	.addClass("inCharge");
}

function definePlayers() {
	for ( i = 0 ; i < numberOfPlayers ; i++ ) {
		var k = i + 1;
		playersArray[i] = {
			panel: $(".philmemaside .playerPanel h1").eq(i),
			name: $(".philmemaside .playerPanel h1").eq(i).text(),
			wonCards: new Array(),
			movesNumber: 0,
			movesField: document.getElementById("movesPlayer"+k),
			wonNumber: 0,
			wonField: document.getElementById("wonPairsPlayer"+k)
		};
	};
}

function defineCards() {
	for ( i = 0 ; i < numberOfCards ; i++ ) {
		cardsArray[i] = {
			position: i + 1,
			cardValue: $(".philmemmain .cardWrapper").eq(i).children(".cardFace").first().attr('id'),
		};
	};
}

function activate() {
	if ( openCards.length > 1 ) { return;
	} else {
	$(this).toggleClass("turnedToFace");
	var controlnumber = $(this).data('controlvalue');
	openCards.push(controlnumber);
	test();
}
}

function test() {
	if ( openCards.length < 2 ) {
		return false;
	} else if ( openCards[0] == openCards[1] ) {
		playerWins();
		setTimeout(wipeout,chosenInterval);
		testEndOfGame();
		return true;
	} else {
		setTimeout(playerLooses,chosenInterval);
		return false;
	}
}

function testEndOfGame() {
	numberOfPairsFound++;
	numberOfPairsLeft--;
	if ( numberOfPairsLeft == 0 ) {
		showAllCards();
		endGame();
	}
}
	
function showAllCards() {
	var allCards = $(".cardWrapper")
	allCards.addClass("turnedToFace");
	setTimeout(function () {
	allCards.removeClass("found");
}, 2000);
}

function wipeout() {
		openCards = [];
	$(".philmemmain .turnedToFace").addClass("found");
}

function clearAll() {
		openCards = [];
		$(".philmemmain .turnedToFace").removeClass("turnedToFace");
}

function playerLooses() {
	var player = playersArray[playerInCharge];
	player.movesNumber++;
	$(player.movesField).text(player.movesNumber);
	clearAll();
	changePlayer();
	}

function changePlayer() {
	playerInCharge++;
	playerInCharge = playerInCharge % numberOfPlayers;
	clearPlayerPanels();
}

function playerWins() {
	var cardOne = $(".philmemmain .turnedToFace").eq(0);
	var cardTwo = $(".philmemmain .turnedToFace").eq(1);
	var player = playersArray[playerInCharge];
	player.wonCards.push(cardOne);
	player.wonCards.push(cardTwo);
	player.movesNumber++;
	$(player.movesField).text(player.movesNumber);
	player.wonNumber++;
	$(player.wonField).text(player.wonNumber);
}

