<?php

namespace Classes;

use \mysqli;
use SQLite3;

class DataBase
{
  public const DATABASE_FILE = "db.sqlite";

  private SQLite3 $sqlite3;

  public function __construct()
  {
    $this -> sqlite3 =
           new SQLite3(self::DATABASE_FILE, SQLITE3_OPEN_READWRITE);
  }

  public function __destruct()
  {
    $this -> sqlite3 ->close();
  }
  public function ExecuteInstallQuery(string $query):bool{
    return $this -> sqlite3 -> exec($query);
  }

  public function TestDbCreation():void{
    var_dump(function_exists('mysqli_init'));
    var_dump(extension_loaded('mysqli'));
    $servername = "db.sql";
    $username = "username";
    $password = "password";
    
    // Create connection
     //$ff = mysqli_connect();
       $file = fopen($servername, "w");
       fclose($file);
       $conn = new mysqli(database: $servername);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    // Create database
    $sql = "CREATE DATABASE myDB";
    if ($conn->query($sql) === TRUE) {
      echo "Database created successfully";
    } else {
      echo "Error creating database: " . $conn->error;
    }
    
    $conn->close();
  }
}
