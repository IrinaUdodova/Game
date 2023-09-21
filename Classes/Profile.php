<?php

namespace Classes;
require_once "Classes/Profile.php";
require_once  "Classes/PageParts/PagePartBase.php";
class Profile
{
    private int $_balance = 0;

    private string $_nickname;
    private string $_password;
    private bool $_isAuthorized;

    private bool $_isFormDataExists;

    public function __construct(){
        $IsNameValueFormDataExist = key_exists("name", $_GET);
        $IsPasswordValueFormDataExist = key_exists("password", $_GET);
        $this -> _isFormDataExists = $IsPasswordValueFormDataExist && $IsNameValueFormDataExist;
        $this -> _nickname = $IsNameValueFormDataExist ? $_GET["name"]: "unknown";
        $this -> _password = $IsPasswordValueFormDataExist ? $_GET["password"]: "unknown";
        $this -> _isAuthorized = $this ->_isFormDataExists && strtolower($this -> _nickname) == "root";

    }

    public function  GetPassword():bool{
        return $this -> _password;
    }
      public function GetIsFormDataExists(): bool{
        return $this -> _isFormDataExists;
      }

    public function GetIsAuthorized():bool{
        return $this -> _isAuthorized;
    }

  public function GetBalance():int{
      return $this -> _balance;
  }
  public function GetNickName():string{
      return $this -> _nickname;
  }
}