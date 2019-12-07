<?php

class Delete_account{
    public $connection;
    public $username;
    public $password;
    
    function __construct($connection,$username,$password){
        $this->connection = $connection;
        $this->username = $username;
        $this->password = $password;
    }

    function delete_account(){
        $query = "DELETE FROM user WHERE username = '".$this->username."' AND password = '".$this->password."' ";
        $query_1 = "SELECT username, password FROM user WHERE username = '".$this->username."' AND  password = '".$this->password."'";
        if(mysqli_query($this->connection,$query)){
            echo "Deleted!";
        }
        else{
            echo "Failed or account does not exist!";
        }
        
    }
}
$connection = mysqli_connect("localhost","root","","users") or die(mysqli_error());


if(!empty($_POST['username']) && !empty($_POST['password'])){
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    


    $dc = new Delete_account($connection,$username,$password);
    
    $dc->delete_account();


}

?>

