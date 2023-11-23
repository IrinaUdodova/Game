<?php
require_once "pageParts/Session.All.Init.php";

require_once  "Classes/Profile.php";
require_once  "Classes/PageParts/Menu.php";
require_once  "Classes/PageParts/LoginPasswordForm.php";
require_once  "Classes/PageParts/LoginStatus.php";
require_once  "Classes/PageParts/MyCredentials.php";
require_once  "Classes/DataProviders/FormDataProvider.php";
require_once "Classes/Authenticator.php";

use Classes\Profile;
use Classes\PageParts\Menu;
use Classes\PageParts\LoginPasswordForm;
use Classes\PageParts\LoginStatus;
use Classes\PageParts\MyCredentials;
use Classes\DataProviders\FormDataProvider;
use Classes\Authenticator;


//var_dump(session_status());

$formDataProvider = new FormDataProvider();
$authenticator = new Authenticator($formDataProvider);
$authenticator -> AuthorizeUser();
$profile = new Profile($formDataProvider);
$menu = new Menu($profile);
$loginPasswordForm = new LoginPasswordForm($profile);
$loginStatus = new LoginStatus($profile);
$credentials = new MyCredentials($profile);
 ?>
<html lang ="en">
<head>
    <title>WEB22 Pocker Login System</title>
<?php $menu -> EchoHeader();
$loginPasswordForm -> EchoHeader();
$loginStatus -> EchoHeader();
$credentials -> EchoHeader();
?>

</head>
<body>
   <?php
      $menu ->EchoMenu();
      $credentials-> EchoCredentials();
      $loginPasswordForm -> EchoLoginPasswordForm();
      $loginStatus -> EchoLoginStatus();
      $loginStatus -> EchoLoginButton();
   ?>
     </body>
</html>
