<?php
session_start();

class ForgetPass{
    public $connection;
    public $UID;

    /**class */
    function __construct($connection,$UID){
        $this->connection = $connection;
        $this->UID = $UID;
    }
    
    function uid_exists(){
        
       $query = "SELECT * FROM user WHERE UID = '".$this->UID."' ";
        $result = mysqli_query($this->connection,$query) or die(mysqli_error());
        
        if(mysqli_num_rows($result) > 0){
            /**if some user with UID exists */
           //echo "user exist!";
            //header('Location: reset.php');
            include('reset.php');
            //define('myheader',true);
            
        }
        else{
            /**if user does not exist */
            echo "User does not exist!";
        }
        
    }


}
$connection = mysqli_connect("localhost",'root','','users') or die(mysqli_error());

if(!empty($_POST['UID'])){      /**fetching UID */
    $UID = $_POST['UID'];
    /**fetching variable from session that previously started */
    $_SESSION['var'] = $UID;
    /*MySQL injection security*/
    $UID = stripslashes($UID);
    $UID = mysqli_escape_string($connection,$UID);
    /**instantiation */
    $forget_pass = new ForgetPass($connection,$UID);
    $forget_pass->uid_exists();  
     
}

//define('root_',TRUE); 

?>