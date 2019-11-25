<?php
#username,password,email and UID
$username= '';
$password = '';
$email ='';
$UID ='';



class Register{
    
    public $connection;
    public $username;
    public $password;
    public $email;
    public $UID;
    
    function __construct($connection,$username,$password,$email,$UID){
        $this->connection = $connection;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->UID = $UID;
    }
    
    function insert(){
        /*Insert Query for inserting values in MySQL DB*/ 
        $INSERT_QUERY = "INSERT INTO `user` (`id`, `username`, `password`, `email`, `UID`) VALUES (NULL, '$this->username', '$this->password', '$this->email', '$this->UID')";
        $result = mysqli_query($this->connection,$INSERT_QUERY);
        
        if($result){
           echo "INSERTED!";
        }
        else if(!$result){
            echo "Username Already exist!";
        }
        
        
    }
}

$connection = mysqli_connect("localhost",'root','','users');
if(!$connection){
    echo "Not Connected!";
}
if(!empty($_POST['username'] && !empty($_POST['password'])) && !empty($_POST['email'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $UID = uniqid();

    $form = new Register($connection,$username,$password,$email,$UID);
    $form->insert();
}

?>
