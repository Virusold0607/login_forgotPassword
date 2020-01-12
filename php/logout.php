<?php

session_start();
if($_SESSION["logged-in"] == true){
session_destroy();
unset($_SESSION["logged-in"]);
echo "Logged Out!";
}
?>