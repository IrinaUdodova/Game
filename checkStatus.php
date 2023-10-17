<?php
require_once "pageParts/Session.All.Init.php";
?>
<http>
    <head>
        <title>Check site status</title>
    </head>
    <body>
    <h1>Database</h1>
    <h6>mysqli_init exist: <?php echo function_exists('mysqli_init') === true ? "T" : "F"; ?></h6>
    <h6>mysqli loaded: <?php echo extension_loaded('mysqli') === true ? "T" : "F"; ?></h6>
    <h6>Sqlite3 exist <?php echo class_exists("SQlite3")=== true ? "T" : "F"; ?></h6>
    <h6>pdo_sqlite loaded: <?php echo extension_loaded('pdo_sqlite') === true ? "T" : "F"; ?></h6>
    <h6>sqlite3 loaded: <?php echo extension_loaded('sqlite3') === true ? "T" : "F"; ?></h6>
    <h6>ftp loaded: <?php echo extension_loaded('ftp') === true ? "T" : "F"; ?></h6>
    <h6><?php var_dump(phpinfo());?></h6>
    <hr>
    <h1>Environment</h1>
    <h6>Environment parameters: <?php var_dump($_ENV); ?></h6>
    <hr>
    </body>
    </http>
