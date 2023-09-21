<?php
namespace Classes\PageParts;

require_once "Classes/Profile.php";
require_once  "Classes/PageParts/PagePartBase.php";

use Classes\Profile as Profile;


class Menu extends PagePartBase
{

    public function __construct(Profile $profile)
    {
       parent:: __construct($profile);
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