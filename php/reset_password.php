<?php

class Reset_pass{
    public $password;
    public $password_recheck;
    function __construct($password,$password_1){
        $this->password = $password;
        $this->password_recheck = $password_1;
    }

    function password_reset(){
        if($this->password != $this->password_recheck){
            echo "Enter Same Password!";
            //header('Location: reset.php');
        }


        else{
            echo "yes! password is same!";
        }
    }




}




$password = '';
$password_recheck = '';
if(!empty($_POST['password']) && !empty($_POST['password1'])){
    $password = $_POST['password'];
    $password_recheck = $_POST['password1'];

    $pass_reset = new Reset_pass($password,$password_recheck);
    $pass_reset->password_reset();



}




?>