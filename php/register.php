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
           echo "Data Saved!\n";
           echo "</br>Save this UID for reseting your password in case you forget <b>$this->UID<b>";
        
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

    /*Prevention form MySQL injection*/
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $email = stripslashes($email);
    $UID = stripslashes($UID);

    $username = mysqli_real_escape_string($connection,$username);
    $password = mysqli_real_escape_string($connection,$password);
    $email = mysqli_real_escape_string($connection,$email);
    $UID = mysqli_real_escape_string($connection,$UID);
    /****/

    $form = new Register($connection,$username,$password,$email,$UID);
    $form->insert();
}

?>
