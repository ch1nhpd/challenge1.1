<?php
session_start();
if(isset($_POST['save']))
{
    extract($_POST);
    include 'db.php';
    $sql=mysqli_query($conn,"SELECT * FROM accounts where username='$username' and password='$pass'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        
        $_SESSION["username"]=$row['username']; 
        header("Location: home.php"); 
    }
    else
    {
        echo "Invalid Email ID/Password";
    }
}
?>