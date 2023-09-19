<?php

namespace Classes\PageParts;
 require_once 'Classes/Profile.php';
 use Classes\Profile as Profile;

class loginPasswordForm
{

    private bool $_isAuthorized;
    private bool $_isFormDataExists;

    public function  __construct(Profile $profile){
        $this -> _isAuthorized = $profile -> DetIsAuthorized();
      }

      public function EchoHeader():void{
        return;
      }

      public function  EchoLoginPasswordForm():void{
        if ($this -> _isAuthorized|| $this -> _isFormDataExists){
            return;
        }

        $menuHTML = <<<LOGIN_PASSWORD_FORM
         <h3> Enter your credentials please</h3>
         <form action="index.php" method ="get">
             <input type ="text" name ="name">
             <input type ="text" name="password">
             <input type ="submit" value ="submit">
         </form>
        LOGIN_PASSWORD_FORM;

        echo $menuHTML;
      }
}