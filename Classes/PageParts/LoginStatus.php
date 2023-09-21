<?php

namespace Classes\PageParts;
require_once "Classes/Profile.php";
require_once  "Classes/PageParts/PagePartBase.php";
use Classes\Profile as Profile;

class LoginStatus extends  PagePartBase
{


    public function  __construct(Profile $profile){
        parent::__construct($profile);
    }

    public function  EchoLoginStatus():void{
        if (!$this -> IsFormDataExist){
            return;
        }

        $loginStatusText =
            $this -> _isAuthorized ?
                "Logged in successfully" :
                "Login fail";
            echo <<<LOGIN_STATUS
           <h1>$loginStatusText</h1>
           LOGIN_STATUS;
        }
}