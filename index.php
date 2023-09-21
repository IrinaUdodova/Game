<!doctype html>
<?php
require_once  "Classes/Profile.php";
require_once  "Classes/PageParts/Menu.php";
require_once  "Classes/PageParts/LoginPasswordForm.php";
require_once  "Classes/PageParts/LoginStatus.php";
require_once  "Classes/PageParts/MyCredentials.php";

use Classes\Profile;
use Classes\PageParts\Menu;
use Classes\PageParts\LoginPasswordForm;
use Classes\PageParts\LoginStatus;
use Classes\PageParts\MyCredentials;

$profile = new Profile();
$menu = new Menu($profile);
$loginPasswordForm = new LoginPasswordForm($profile);
$loginStatus = new LoginStatus($profile);
$credentials = new MyCredentials($profile);
 ?>
<html lang ="en">
<header>
<?php $menu -> EchoHeader();
$loginPasswordForm -> EchoHeader();
$loginStatus -> EchoHeader();
$credentials -> EchoHeader();
?>

</header>
<body>
<?php
$menu ->EchoMenu();
$credentials-> EchoCredentials();
$loginPasswordForm -> EchoLoginPasswordForm();
?>
<br>
<?php
$loginStatus ->EchoLoginStatus();

?>
</body>
</html>