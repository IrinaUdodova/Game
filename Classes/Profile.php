<?php

namespace Classes;

use Classes\DataProviders\BaseDataProvider;


class Profile
{
    private int $_balance = 0;

    private string $_nickname;
    private string $_password;
    private bool $_isAuthorized;

    private bool $_isProviderDataExists;

    /**
     * @param BaseDataProvider $dataProvider
     *
     * $dataProvider is FormDataProvider or SessionDataProvider
     */
    public function __construct(BaseDataProvider $dataProvider){

        $this -> _isProviderDataExists = $dataProvider -> GetIsProviderDataExists();
        $this -> _nickname = $dataProvider ->  GetNickName();
        $this -> _password = $dataProvider -> GetPassword();
        $this -> _isAuthorized = $dataProvider -> GetIsAuthorized();
        $this -> _balance = $dataProvider -> GetBalance();

    }
    public function  GetPassword():bool{
        return $this -> _password;
    }
      public function GetIsFormDataExists(): bool{
        return $this -> _isProviderDataExists;
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