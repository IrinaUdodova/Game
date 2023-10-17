<?php
require_once "pageParts/Session.All.Init.php";
require_once "Classes/DataBase.php";

use Classes\DataBase;

$file = fopen("db.sqlite", "w");
fclose($file);

$database = new SQLite3("db.sqlite",SQLITE3_OPEN_READWRITE);
$database -> exec("CREATE TABLE GG (ID INT PRIMARY KEY    NOT NULL);");
$database ->close();

