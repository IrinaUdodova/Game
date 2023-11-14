<?php

namespace Classes\PageParts;

use Classes\PageParts\PagePartBase;
use Classes\Profile;
use Classes\DataBase;

class InstallPageParts 
{
    private bool $_isFormDataExists;
    private DataBase $dataBase;

    public function __construct()
   {
       $this -> _isFormDataExists = isset($_GET["action"]);
       $this -> dataBase = new DataBase();
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
      
        echo "File $fileName found => ✅";

    } else {

        echo "File $fileName not found => ☢";
        $file = fopen($servername, "w");
        fclose($file);
        echo "File was created => 👍";
           }
   }

   public function CreateAuthTableOnDb(): void {
    if (!$this->_isFormDataExists){
        return;
     }
 
     $fileName = DataBase::DATABASE_FILE;
    echo "Recreate auth table on database: ";
    $query = <<<SQL_QUERY
        DROP TABLE IF EXISTS Auth;
        CREATE TABLE Auth (
            ID INT PRIMARY KEY NOT NULL,
            UserName varchar(50),
            UserPassword varchar,
            UserCache varchar
            )
    SQL_QUERY;

    $this -> dataBase -> ExecuteInstallQuery($query);

        echo "Auth table re-created => ✅";

   }

   public function CreateProfileTableOnDb(): void {
    if (!$this->_isFormDataExists){
        return;
     }
 
     $fileName = DataBase::DATABASE_FILE;
    echo "Recreate profile table on database: ";
    $query = <<<SQL_QUERY
        DROP TABLE IF EXISTS Profile;
        CREATE TABLE Profile (
            ID INT PRIMARY KEY NOT NULL,
            AuthId int REFERENCES Auth(ID),
            Balance int
         )
    SQL_QUERY;

    $this -> dataBase -> ExecuteInstallQuery($query);

        echo "Profile table re-created => ✅";

   }
}