<?php

namespace Classes;

require_once "Classes/DataProviders/BaseDataProvider.php";

use \Classes\DataProviders\BaseDataProvider;

class Session
{
  static function  SetDataProviderData(BaseDataProvider $dataProvider): void
  {
      $dataProviderData = array(
          "NickName" => $dataProvider -> GetNickName(),
          "Balance" => $dataProvider -> GetBalance(),
          "IsAuthorized" => $dataProvider -> GetIsAuthorized()
      );


    $_SESSION["DataProviderData"] = $dataProviderData;
    //session_commit();
    //var_dump($_SESSION);
    //session_register("DataProviderData", $dataProviderData);
  }

    static function  GetDataProviderData(): array
    {
        if (!isset($_SESSION["DataProviderData"])){
            throw new \Error("Expected session data not exist");
        }
       return $_SESSION["DataProviderData"];
    }
}