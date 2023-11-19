<?php

namespace Classes\PageParts;

require_once "Classes/DataBase.php";

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
            ID INT PRIMARY KEY NOT NULL,
            UserName varchar(50),
            UserCache varchar
            )
    SQL_QUERY;

    $this->ExecuteQuery($query, "Auth");
 }

   public function CreateProfileTableOnDb(): void {
    $query = <<<SQL_QUERY
        DROP TABLE IF EXISTS Profile;
        CREATE TABLE Profile (
            ID INT PRIMARY KEY NOT NULL,
            AuthId int REFERENCES Auth(ID),
            Balance int
         )
    SQL_QUERY;

    $this->ExecuteQuery($query, "Profile");

   }

   public function CreateGamesTableOnDb(): void {
    $query = <<<SQL_QUERY
        DROP TABLE IF EXISTS Games;
        CREATE TABLE Games (
            ID INT PRIMARY KEY NOT NULL,
            Deck INT,
            Board INT
         )
    SQL_QUERY;

    $this->ExecuteQuery($query, "Games");

   }

   public function CreatePlayersTableOnDb(): void {
    $query = <<<SQL_QUERY
        DROP TABLE IF EXISTS Players;
        CREATE TABLE Players (
            ID INT PRIMARY KEY NOT NULL,
            Deck INT,
            GameID INT REFERENCES Games(ID),
            ProfileID INT REFERENCES Profile(ID)
         )
    SQL_QUERY;

    $this-> ExecuteQuery($query, "Players");
}

   public function CreateLobbyTableOnDb(): void {
    $query = <<<SQL_QUERY
        DROP TABLE IF EXISTS lobby;
        CREATE TABLE lobby(
            ID INT PRIMARY KEY NOT NULL,
            GameID INT REFERENCES Games(ID)
         )
    SQL_QUERY;

    $this-> ExecuteQuery($query, "Lobby");

   }


   public function CreateRootProfile(): void {
    $query = <<<SQL_QUERY
        INSERT INTO Auth(UserName, UserCache)
             VALUES ("root", "")
         )
    SQL_QUERY;

    $this-> ExecuteQuery($query, "Lobby");

   }

   private function ExecuteQuery(string $query, 
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
}