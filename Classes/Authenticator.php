<?php

namespace Classes;


require_once "DataProviders/FormDataProvider.php";
require_once "Session.php";


use Classes\DataProviders\FormDataProvider;
use Classes\Session;

class Authenticator
{

    private FormDataProvider $_formDataProvider;


      public function __construct(FormDataProvider $formDataProvider)
      {
           $this -> _formDataProvider =$formDataProvider;
      }

      public function AuthorizeUser():bool
      {
          $isProviderDataExists = $this -> _formDataProvider -> GetIsProviderDataExists();
          $isLoggedIn = strtolower($this-> _formDataProvider -> GetNickName()) == "root";
          $isAuthorized = $isProviderDataExists && $isLoggedIn;

          $this -> _formDataProvider -> SetIsAuthorized($isAuthorized);

          Session::SetDataProviderData($this -> _formDataProvider);

          return  $isAuthorized;
      }


}