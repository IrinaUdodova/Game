<?php
require_once "pageParts/Session.Authorized.Init.php";
//require_once "Classes/Session.php";
//use Classes\Session;
//var_dump(Session::GetDataProviderData());
?>
<html lang ="en">
<head>
    <style>
       .picture {
        width: 80px;
        height: 125px;
        margin: 5px;
       }
    </style>
</head>
<?php //require 'indexParts/Header.html'?>
<body>
<?php

//require_once "Classes/Card.php";
//use \Classes\Card as Card;
//$card = new Card();
//$card -> AddHeaderCardPart();

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