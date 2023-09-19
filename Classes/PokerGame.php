<?php
 namespace Classes;

 require_once  'Classes/Deck.php';
 use \Classes\Deck as Deck;
 require_once  'Classes/Player.php';
 use \Classes\Player as Player;

 class PokerGame
 {
     private Deck $deck;

     private array $players;

     public function  __construct(int $playerCount)
     {
         $this -> deck = new Deck();
        for ($counter =0; $counter< $playerCount; $counter++){
            $this -> players[] = new Player();
        };
     }
     public function InitGame():void
     {
         $this->deck->InitDeck();
         $this->deck->ShuffleDeck();

        $this -> GiveCardToAllPlayers();
         $this -> GiveCardToAllPlayers();
     }
     private function GiveCardToAllPlayers():void{
         foreach ($this->players as $player) {
             $card = $this->deck->RetrieveFirstCard();
             $player -> AddCardToDeck($card);
         }
 }

 public function ShowPlayerHands():void{
         foreach ($this->players as $player) {
             $player -> ShowCardOnHand();
         }
 }
 public function ShowDeck(): void {
         echo "<hr><br/>Deck:<br/>";
         $this -> deck -> ShowDeck();
 }

 }