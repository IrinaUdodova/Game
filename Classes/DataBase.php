<?php

namespace Classes;

use \mysqli;

class DataBase
{
  public static function TestDbCreation():void{
    var_dump(function_exists('mysqli_init'));
    var_dump(extension_loaded('mysqli'));
    $servername = "db.sql";
    $username = "username";
    $password = "password";
    
    // Create connection
     //$ff = mysqli_connect();
    $conn = new mysqli($servername);
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
