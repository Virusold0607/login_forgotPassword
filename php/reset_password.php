<?php
session_start();

function password_reset($connection,$UID,$password){
    mysqli_query($connection,"UPDATE user SET password = '".$password."' WHERE UID = '".$UID."' ") or die();  
}

$password = '';
$password_recheck = '';

if(!empty($_POST['password']) && !empty($_POST['password1'])){
    $password = $_POST['password'];
    $password_recheck = $_POST['password1'];
}
if($password == $password_recheck){

    $connection = mysqli_connect('localhost','root','','users');
    $UID = $_SESSION['var'];
    password_reset($connection,$UID,$password);
    echo "Password Updated!";
    }
 else{
     
    header('Refresh: 0, url = ../html/forgetPassword.html');
    
 }



?>