<?php
    $hostname = 'localhost:3306';
    $username_ = 'userBC';
    $password_ = 'userBC';
    $dbname = "challenge1";
    $conn = mysqli_connect($hostname,$username_,$password_,$dbname);
    if(!$conn){
        die('Could not Connect My Sql:' .mysql_error());
    }
?>