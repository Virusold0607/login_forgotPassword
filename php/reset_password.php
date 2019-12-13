<?php
session_start();
/*
function password_reset($connection,$UID,$password){
    mysqli_query($connection,"UPDATE user SET password = '".$password."' WHERE UID = '".$UID."' ") or die();  

}
*/

class Password_Reset{
    function __construct($connection,$password,$uid){
        $this->connection = $connection;
        $this->password = $password;
        $this->uid = $uid;
    }

    function reset(){
        $stmt = $this->connection->prepare("UPDATE user SET password = ? WHERE UID = ? ");
        $stmt->bind_param("ss",$this->password,$this->uid);
        $stmt->execute();
    
    }
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
    $password = stripcslashes($password);
    $password = mysqli_escape_string($connection,$password);
    $password_res = new Password_Reset($connection,$password,$UID);
    $password_res->reset();
    echo "Password Updated!";
    }
 else{
     
    header('Refresh: 0, url = ../html/forgetPassword.html');
    
 }



?>