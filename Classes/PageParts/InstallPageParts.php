<?php

namespace Classes\PageParts;

require_once "Classes/DataBase.php";
require_once "Classes/Authenticator.php";

use Classes\Authenticator;
use Classes\DataBase;

class InstallPageParts 
{
    private bool $_isFormDataExists;
    private DataBase $dataBase;

    public function __construct()
   {
       $this -> _isFormDataExists = isset($_GET["action"]);
   }  

   public function EchoForm():void{
      if ($this->_isFormDataExists){
         return;
      }

      echo <<<INSTALL_FORM
      <form action ="" method ="get">
         <input name="action" value="start" type="hidden">
         <input type ="submit" value="Install">
    </form>
    INSTALL_FORM;
   }

   public function CreateDbFile(): void {
    if (!$this->_isFormDataExists){
        return;
     }
 
    $fileName = DataBase::DATABASE_FILE;
    echo "Search DB file: ";

    if (is_file($fileName)){
      
        echo "File $fileName found => ✅<br>";

    } else {

        echo "File $fileName not found => ☢";
        $file = fopen($servername, "w");
        fclose($file);
        echo "File was created => 👍<br>";
           }
   }

   public function CreateAuthTableOnDb(): void {
    $query = <<<SQL_QUERY
        DROP TABLE IF EXISTS Auth;
        CREATE TABLE Auth (
            ID INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
            UserName VARCHAR(50),
            UserHash VARCHAR
            )
    SQL_QUERY;

    $this->ExecuteReCreateTableQuery($query, "Auth");
 }

   public function CreateProfileTableOnDb(): void {
    $query = <<<SQL_QUERY
        DROP TABLE IF EXISTS Profile;
        CREATE TABLE Profile (
            ID INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
            AuthId INTEGER REFERENCES Auth(ID),
            Balance INTEGER
         )
    SQL_QUERY;

    $this->ExecuteReCreateTableQuery($query, "Profile");

   }

   public function CreateGamesTableOnDb(): void {
    $query = <<<SQL_QUERY
        DROP TABLE IF EXISTS Games;
        CREATE TABLE Games (
            ID INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
            Deck INTEGER,
            Board INTEGER
         )
    SQL_QUERY;

    $this->ExecuteReCreateTableQuery($query, "Games");

   }

   public function CreatePlayersTableOnDb(): void {
    $query = <<<SQL_QUERY
        DROP TABLE IF EXISTS Players;
        CREATE TABLE Players (
            ID INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
            Deck INTEGER,
            GameID INTEGER REFERENCES Games(ID),
            ProfileID INTEGER REFERENCES Profile(ID)
         )
    SQL_QUERY;

    $this-> ExecuteReCreateTableQuery($query, "Players");
}

   public function CreateLobbyTableOnDb(): void {
    $query = <<<SQL_QUERY
        DROP TABLE IF EXISTS lobby;
        CREATE TABLE lobby(
            ID INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
            GameID INTEGER REFERENCES Games(ID)
         )
    SQL_QUERY;

    $this->ExecuteReCreateTableQuery($query, "Lobby");

   }

   public function CreateRootProfile(): void {
   $this-> CreateProfile("root", "root", -100);
   }

   public function CreateUserProfile(): void {
    $this-> CreateProfile("user", "user", -100);
    }

    public function CreatePlayerProfile(): void {
        $this-> CreateProfile("player", "player", -100);
        }

  private function CreateProfile($userName,  $userPassword, $userBalance): void {
    $userHash = Authenticator::GetUserHash($userName, $userPassword);
    $addAuthDataQuery = <<<ADD_AUTH_DATA_QUERY
        INSERT INTO Auth(UserName, UserHash)
             VALUES ('$userName', '$userHash');
    ADD_AUTH_DATA_QUERY;

    $addProfileQuery = <<<ADD_PROFILE_QUERY
        INSERT INTO Profile(AuthId, Balance)
        SELECT ID, $userBalance
        FROM Auth
        WHERE UserName = '$userName';    
        ADD_PROFILE_QUERY;

    $this-> ExecuteAddTableRowQuery($addAuthDataQuery, 
                             "Auth", "$userName user credentials");
    $this-> ExecuteAddTableRowQuery($addProfileQuery, 
                             "Profile", "$userName user profile");
   }

   private function ExecuteReCreateTableQuery(string $query, 
                                 string $tableName) : void{
    if (!$this->_isFormDataExists){
        return;
     }
     
     echo "Recreate [$tableName] table on database: ";

     if (!isset($this -> dataBase)){
        $this -> dataBase = new DataBase();
    }

    $this -> dataBase -> ExecuteInstallQuery($query);
    echo "[$tableName] table re-created => ✅<br>";
   }

   private function ExecuteAddTableRowQuery(string $query, 
                                            string $tableName, string $description) : void{
    if (!$this->_isFormDataExists){
        return;
     }
     
     echo "[$description] info adding on [$tableName] table on database: ";

     if (!isset($this -> dataBase)){
        $this -> dataBase = new DataBase();
    }

    $this -> dataBase -> ExecuteInstallQuery($query);
    echo "[$description] info added => ✅<br>";
   }
}