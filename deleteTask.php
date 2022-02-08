<?php
    extract($_POST);
    include("db.php");
    session_start();
    $query = "DELETE FROM acc_task WHERE task_id = $taskId and username = '".$_SESSION["username"];
    $query.= "';DELETE FROM tasks WHERE  id = $taskId";
    echo $query;
    $sql=mysqli_multi_query($conn,$query) or die("Could Not Perform the Query");
    
    header ("Location: home.php?status=delSuccess");


?>