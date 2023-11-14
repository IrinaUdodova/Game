<?php
require_once "pageParts/Session.All.Init.php";
require_once "Classes/DataBase.php";
require_once "Classes/PageParts/InstallPageParts.php";

use Classes\DataBase;
use Classes\PageParts\InstallPageParts;


$file = fopen("db.sqlite", "w");
fclose($file);

$database = new SQLite3("db.sqlite",SQLITE3_OPEN_READWRITE);
$database -> exec("CREATE TABLE GG (ID INT PRIMARY KEY    NOT NULL);");
$database ->close();

$installPageParts = new InstallPageParts()
?>
<html>
  <head>
      
  </head>
  <body>
     <h1> Poker инсталлятор </h1>
     <?php $installPageParts -> EchoForm(); ?>
     <hr>
     <?php $installPageParts -> CreateDbFile(); ?>
     <hr>
     <?php $installPageParts -> CreateAuthTableOnDb(); ?>
     <hr>
     <?php $installPageParts -> CreateProfileTableOnDb(); ?>

  </body>

</html>
