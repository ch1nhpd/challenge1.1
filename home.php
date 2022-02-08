<?php
        session_start();
        if(!isset($_SESSION["username"])){
            header("Location: login.php");
            exit();
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Home</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assests/css/style.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<body>
<div >
    
    <p class="hint-text"><br><b>Welcome </b><?php echo $_SESSION["username"] ?></p>
    <form action="addTask.php" method="post" enctype="multipart/form-data">
		<h2>Task</h2>
        
        <br>
        <div >
        	<input type="task" name="taskName" placeholder="Task" required="required">
        </div>
            
        
		<br>
        <button type='submit' name='save'>ADD</button>
    </form>
<br>
<br>
    <form action="deleteTask.php" method="post" enctype="multipart/form-data">
		<h2>Current task</h2>
        
        <br>

            <?php
				// session_start();
				include 'db.php';
				$username= $_SESSION["username"];
                $query = "select id, name from tasks 
                INNER JOIN acc_task on acc_task.task_id = tasks.id
                INNER join accounts on accounts.username = acc_task.username
                WHERE accounts.username = '$username'";

				$sql=mysqli_query($conn,$query);
                $html = '<table class="table">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>';

                while($row = mysqli_fetch_assoc($sql)) {
                    $html .= '<tr>
                    <td>'.$row["name"].'</td>
                    <td>'. '
                    <form action="deleteTask.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="taskId" value="'.$row["id"].'">
                        <button type="submit" name="save">DELETE</button><br>
                    </form>
                    
                    '.'</td>
                  </tr>';
                    //echo "<li name=".$row["id"]."> " . $row["name"]. "<button type='submit' name='save'>DELETE</button><br>";
                  }
				// $row  = mysqli_fetch_array($sql);
                $html.='</tbody>
                </table>';
                echo $html;
            ?>
            
        
        <div class="text-center">Want to Leave the Page? <br><a href="logout.php">Logout</a></div>
    </form>
	
</div>
</body>
</html>