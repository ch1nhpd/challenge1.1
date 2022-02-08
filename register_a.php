<?php
    extract($_POST);
    include("db.php");
    $sql=mysqli_query($conn,"SELECT * FROM accounts where username='$username'");
    if ($_POST["pass"] != $_POST["cpass"]) {
        echo "Password khong khop"; 
        echo '<div class="text-center"><br><a href="login.php">Click here to Login</a></div>';
        exit();
     }
    if(mysqli_num_rows($sql)>0)
    {
        echo "Username Already Exists"; 
        exit();
    }
    elseif(isset($_POST['save']))
    {
        
    // $file = rand(1000,100000)."-".$_FILES['file']['name'];
    // $file_loc = $_FILES['file']['tmp_name'];
    // $folder="upload/";
    // $new_file_name = strtolower($file);
    // $final_file=str_replace(' ','-',$new_file_name);
    // if(move_uploaded_file($file_loc,$folder.$final_file))
    // {
        $query="INSERT INTO accounts(username, password, fullname) VALUES ('$username', md5($pass), '_full name_')"; //md5($pass)
        $sql=mysqli_query($conn,$query) or die("Could Not Perform the Query");
        header ("Location: login.php?status=success");
    // }
    // else 
    // {
	// 	echo "Error.Please try again";
	// }
    }

?>