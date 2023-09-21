<?php

namespace Classes\PageParts;
use Classes\Profile;

class PagePartBase
{
    protected int $_balance;
    protected  string $_password;
    protected string $_nickname;
    protected bool $_isAuthorized;
    protected bool $_isFormDataExists;

    public function __construct(Profile $profile)
    {
        $this -> _nickname=$profile ->GetNickName();
        $this -> _balance = $profile -> GetBalance();
        $this -> _isAuthorized = $profile -> GetIsAuthorized();
        $this -> _isFormDataExists = $profile -> GetIsFormDataExists();
        $this -> _password = $profile -> GetPassword();
    }

    public function EchoHeader(): void
    {
     return;
    }
}