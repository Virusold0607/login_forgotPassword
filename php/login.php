<?php
session_start();

class Login{
    public $connection;
    public $username;
    public $password;

    function __construct($connection,$username,$password){
        $this->connection = $connection;
        $this->username = $username;
        $this->password = $password;
    }

    function login(){
        $query = "SELECT username, password FROM user WHERE username = '".$this->username."' AND  password = '".$this->password."'";
        $content = mysqli_query($this->connection,$query) or die(mysqli_error());
        $row = mysqli_fetch_assoc($content);

        if($row['username'] == $this->username && $row['password'] == $this->password){
            //echo "Welcome $this->username!";
            $_SESSION["logged-in"] = true;
            header('Location: ../php/logged-in.php');
        }
        else{
            echo "username or password is incorrect!";
        }
        
    }
}
$connection = mysqli_connect("localhost",'root','','users');

$username = '';
$password = '';

if(!empty($_POST['username']) && !empty($_POST['password'])){
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    /*MySQL injection prevention*/
    $username = stripslashes($username);
    $password = stripslashes($password);

    $username = mysqli_escape_string($connection,$username);
    $password = mysqli_escape_string($connection,$password);
    /**instantiation**/
    $login_form = new Login($connection,$username,$password);
    $login_form->login();
}
define('included',true);
?>
