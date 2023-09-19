<?php
if (key_exists("name", $_GET)){
$name = $_GET["name"];
$password =$_GET["password"];
echo "Hello $name, your password is $password";
}