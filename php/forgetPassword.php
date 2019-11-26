<?php

class ForgetPass{
    public $connection;
    public $UID;

    function __construct($connection,$UID){
        $this->connection = $connection;
        $this->UID = $UID;
    }
    
    function uid_exists(){
        
       $query = "SELECT * FROM user WHERE UID = '".$this->UID."' ";
        $result = mysqli_query($this->connection,$query) or die(mysqli_error());
        
        if(mysqli_num_rows($result) > 0){
            echo "Exists!";
        }
        
    }


}
$connection = mysqli_connect("localhost",'root','','users') or die(mysqli_error());

if(!empty($_POST['UID'])){
    $UID = $_POST['UID'];
    $forget_pass = new ForgetPass($connection,$UID);
    $forget_pass->uid_exists();    
}

?>