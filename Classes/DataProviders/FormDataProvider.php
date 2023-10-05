<?php

namespace Classes\DataProviders;

require_once "BaseDataProvider.php";
require_once "DataBaseDataProvider.php";

use stdClass;

class FormDataProvider extends BaseDataProvider
{

    public function __construct()
    {
           $data = new stdClass();
           $dataBaseDataProvider = new DataBaseDataProvider();


        $IsNameValueFormDataExist = key_exists("name", $_GET);
        $IsPasswordValueFormDataExist = key_exists("password", $_GET);

        $data -> IsProviderDataExists = $IsPasswordValueFormDataExist && $IsNameValueFormDataExist;
        $data -> Nickname = $IsNameValueFormDataExist ? $_GET["name"] : "unknown";
        $data -> Password = $IsPasswordValueFormDataExist ? $_GET["password"] : "unknown";
        $data -> IsAuthorized = $data-> IsProviderDataExists && strtolower($data-> Nickname) == "root";
        $data -> Balance = $dataBaseDataProvider -> GetProfileBalance();

        parent::__construct($data);
    }

    public function SetIsAuthorized(bool $isAuthorized): void{

        $this -> _isAuthorized = $isAuthorized;
    }
}
