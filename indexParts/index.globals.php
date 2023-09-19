<?php

global $data;
$data = new stdClass();
$data -> IsNameValueFormDataExist = key_exists("name", $_GET);
$data -> IsPasswordValueFormDataExist = key_exists("password", $_GET);
$data -> IsFormDataExist = $data -> IsPasswordValueFormDataExist && $data -> IsNameValueFormDataExist;
$data -> Name = $data -> IsNameValueFormDataExist ? $_GET["name"]: null;
$data -> Password = $data -> IsPasswordValueFormDataExist ? $_GET["password"]: null;
$data -> IsAuthorized = $data -> IsFormDataExist && strtolower($data -> Name) == "root";