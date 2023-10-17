<?php
session_start();


require_once "Classes/DataProviders/SessionDataProvider.php";

use Classes\DataProviders\SessionDataProvider;

$sessionDataProvider = new SessionDataProvider();

if (!$sessionDataProvider -> GetIsProviderDataExists() || 
    !$sessionDataProvider -> GetIsAuthorized()){
    header("Location: sessionBroken.php", 
    true, 303);
    //http_redirect("sessionBroken.php");
    die(303);
    }