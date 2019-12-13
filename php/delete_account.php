<?php
$connection = mysqli_connect("localhost","root","","users") or die();

class Delete_account{
    public $connection;
    public $uid;
    
    /*Constructor*/
    function __construct($connection,$uid){
        $this->connection = $connection;
        $this->uid = $uid;
        
    }

    function delete_account(){

        $check_stmt = "SELECT * FROM user WHERE UID = '$this->uid' ";           /**query to check whether username exists */
        $res = mysqli_query($this->connection,$check_stmt) or die(mysqli_error($this->connection));
        $row = mysqli_fetch_assoc($res);
        if($row > 0){           /**if any row is fetched */

            /**prepare delete statement */
            $stmt = $this->connection->prepare("DELETE FROM user WHERE UID = ?");
            $stmt->bind_param("s",$this->uid);  /**binding parameters */
            $stmt->execute();       /**executing */
            echo "Deleted!";
            
        }
        else{
            /**if query fails */
            echo "Account Does not exist!";
        }

        }
        
}


if(!empty($_POST['uid']))           /**fetching UID  */
{
    $uid = $_POST['uid'];
    $uid = stripslashes($uid);              
    $uid = mysqli_escape_string($connection,$uid);
    /**instantiation */
    $dc = new Delete_account($connection,$uid);
    
    $dc->delete_account();


}

?>

