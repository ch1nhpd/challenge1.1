<?php
    extract($_POST);
    include("db.php");


    if(isset($_POST['save']))
    {
        session_start();
        $query="INSERT INTO tasks(name) VALUES ('$taskName');";
        $query.="SET @last_task_id = LAST_INSERT_ID();";
        if(isset($_SESSION["username"])){

            $username = $_SESSION["username"];
            $query .= "INSERT INTO acc_task(username,task_id) VALUES ('$username',@last_task_id);";
//echo $query;
            $sql=mysqli_multi_query($conn,$query) or die("Could Not Perform the Query");
            
            header ("Location: home.php?status=addSuccess");
        }else{
            echo 'alert("Cannot add task!")';
        }
         
        
        
    }


?>