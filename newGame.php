<html lang ="en">
<?php //require 'indexParts/Header.html' ?>
<body>
<?php
require_once 'Classes/Deck.php';
use \Classes\Deck as Deck;

$deck = new Deck();
$deck ->InitDeck();
$deck -> ShowDeck();
?>
<br/>
<?php
$deck ->ShuffleDeck();
$deck -> ShowDeck();
?>
<hr><br/>Game:<br/>
<?php
require_once 'Classes/PokerGame.php';
use \Classes\PokerGame as PokerGame;

$pokerGame = new PokerGame(playerCount: 2);
$pokerGame -> InitGame();
$pokerGame -> ShowDeck();
$pokerGame -> ShowPlayerHands();
?>

</body>
</html>