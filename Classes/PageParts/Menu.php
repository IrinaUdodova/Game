<?php
namespace Classes\PageParts;

require_once 'Classes/Profile.php';
use Classes\Profile as Profile;
class Menu
{
    private int $_balance = 0;

    private string $_nickname;
    private bool $_isAuthorized;

    public function __construct(Profile $profile)
    {
        $this -> _nickname=$profile ->GetNickName();
        $this -> _balance = $profile -> GetBalance();
        $this -> _isAuthorized = $profile -> GetIsAuthorized();
    }

    public function EchoHeader(): void
    {
        if (!$this->_isAuthorized) {
            return;
        }

        echo '<link rel = "stylesheet" href = "css/style.css" >';

    }
    public function  EchoMenu(): void{
        if (!$this -> _isAuthorized){
            return;
        }

        $menuHTML =<<<MENU
            <nav>
                <ul>
                    <li><a href="newGame.php">new game</a></li>
                    <li><a href="#">lobby</a></li>
                    <li><a href="#">currency</a></li>
                </ul>
            </nav>
        MENU;
        echo $menuHTML;
    }
}