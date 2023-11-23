<?php

namespace Classes;

use SQLite3;

class DataBase
{
  public const DATABASE_FILE = "db.sqlite";

  private SQLite3 $_sqlite3;

  public function __construct()
  {
    $this -> _sqlite3 =
           new SQLite3(self::DATABASE_FILE, SQLITE3_OPEN_READWRITE);
  }

  public function __destruct()
  {
    $this -> _sqlite3 ->close();
  }
  public function ExecuteInstallQuery(string $query):bool{
    return $this -> _sqlite3 -> exec($query);
  }

  public function AuthorizeUser($userName, $userHash):bool{
    $query =<<< AUTH_QUERY
    SELECT a.UserName, p.Balance
    FROM Auth AS a, Profile AS p
    WHERE p.AuthId = a.ID AND a.UserName="$userName" AND a.UserHash="$userHash";
    AUTH_QUERY;

    $result = $this -> _sqlite3 -> query($query);
    $resultArray = $result -> fetchArray(SQLITE_ASSOC);
    /*$result2 = $result -> columnName(0);
    $result3 = $result -> columnName(1);
    var_dump($result);
    var_dump($result1);
    var_dump($result2);
    var_dump($result3); */
    return $resultArray !== false;
  }
}
