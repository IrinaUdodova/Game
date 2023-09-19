<!doctype html>
<?php global $data;
require_once 'Classes/Profile.php';
require_once 'Classes/PageParts/Menu.php';
require_once 'Classes/PageParts/LoginPasswordForm.php';
use Classes\Profile as Profile;
use Classes\PageParts\Menu as Menu;
use Classes\PageParts\LoginPasswordForm as LoginPasswordForm;
$profile = new Profile();
$menu = new Menu($profile);
$loginPasswordForm = new LoginPasswordForm($profile);
 ?>
<html lang ="en">
<?php //require 'indexParts/index.globals.php' ?>
<?php //require 'indexParts/Header.html' ?>
<header>
<?php $menu -> EchoHeader();
$loginPasswordForm -> EchoHeader();
?>

</header>
<body>
<?php
$menu ->EchoMenu();
$loginPasswordForm -> EchoLoginPasswordForm();
?>
<br>
<?php
if ($data -> IsFormDataExist){
    if ($data -> IsAuthorized){
        require  'indexParts/LoggedIn.php';
    } else {
        require  'indexParts/LoginFail.php';
    }
}
?>
</body>
</html>