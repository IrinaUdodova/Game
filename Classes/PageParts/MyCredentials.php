<?php

namespace Classes\PageParts;
require_once "Classes/Profile.php";
require_once  "Classes/PageParts/PagePartBase.php";
use Classes\Profile;

class MyCredentials extends PagePartBase
{

    public function __construct(Profile $profile)
    {
        parent::__construct($profile);
    }

    public function EchoCredentials(): void
    {
        if ($this->_isAuthorized || !$this->_isFormDataExists) {
            return;
        }
        $credentialsHTML = <<<CREDENTIALS
        Hi Mr. $this->_nickname, your password is $this->_password
CREDENTIALS;

        echo $credentialsHTML;
    }
}