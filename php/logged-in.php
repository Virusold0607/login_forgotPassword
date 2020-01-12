
 <?php
    session_start();
    if($_SESSION['logged-in']!="true")
    {
        header("Location: ../index.html");
    }
    ?>
<!DOCTYPE html><html>
<title>Welcome</title>
<head>
   
</head>
<body>
    <form action="../php/logout.php">
        <button name="submit" type="Submit">Log out</button>
    </form>
</body>

</html>