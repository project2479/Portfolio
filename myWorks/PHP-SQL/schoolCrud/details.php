<?php

     include_once("connections/connection.php");

     $con = connection();

     
    if(!isset($_SESSION)){
        session_start();
    }

    if(isset($_SESSION['Access']) && $_SESSION['Access'] == "administrator"){
        echo "welcome ".$_SESSION['UserLogin']."<br><br>";
    } else{
        echo header("Location: index.php");
    }
 

   

    $id = $_GET['ID'];

    $sql = "SELECT * FROM student_list WHERE id = '$id'";
    $students = $con->query($sql) or die($con->error);
    $row = $students->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School CRUD</title>
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
   
    <form action="delete.php" method="post">
        <a href="index.php">Back</a><br><br>
        <a href="edit.php?ID=<?php echo $row['id'];?>">Edit</a>
        <button type="submit" name="delete">Delete</button><br>
        <input type="hidden " name="ID" value="<?php echo $row['id'];?>">
    </form>

   <h2><?php echo $row['first_name'];?> <?php echo $row['last_name'];?></h2>
   <p>is a <?php echo $row['gender']; ?></p>
</body>
</html>