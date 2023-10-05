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
        if (!$this -> _isFormDataExists){
            return;
        }

        $loginStatusText =
            $this -> _isAuthorized ?
                "Logged in successfully" :
                "Login fail";

            echo <<<LOGIN_STATUS
           <br>
           <h1>$loginStatusText</h1>
           LOGIN_STATUS;
        }

public function  EchoLoginButton():void{
    if (!$this -> _isFormDataExists || $this -> _isAuthorized){
        return;
    }

    echo <<<RE_LOGIN_BUTTON
           <br>
           <a href ="/index.php"><Button>Relogin</Button></a>
           RE_LOGIN_BUTTON;
}
}