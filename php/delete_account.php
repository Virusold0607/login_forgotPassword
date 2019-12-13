<?php
$connection = mysqli_connect("localhost","root","","users") or die();

class Delete_account{
    public $connection;
    public $uid;
    
    function __construct($connection,$uid){
        $this->connection = $connection;
        $this->uid = $uid;
        
    }

    function delete_account(){

        $check_stmt = "SELECT * FROM user WHERE UID = '$this->uid' ";
        $res = mysqli_query($this->connection,$check_stmt) or die(mysqli_error($this->connection));
        $row = mysqli_fetch_assoc($res);
        if($row > 0){

            $stmt = $this->connection->prepare("DELETE FROM user WHERE UID = ?");
            $stmt->bind_param("s",$this->uid);
            $stmt->execute();
            echo "Deleted!";
            
        }
        else{
            echo "Account Does not exist!";
        }

        }
        
}


if(!empty($_POST['uid']))
{
    $uid = $_POST['uid'];
    $uid = stripslashes($uid);
<<<<<<< HEAD
    $uid = mysqli_escape_string($connection,$uid);
=======
    $uid = mysqli_escape_string($uid);
>>>>>>> cddb2fce149d567cccd634b2e3316726866f7202
    $dc = new Delete_account($connection,$uid);
    
    $dc->delete_account();


}

?>

