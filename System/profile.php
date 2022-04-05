<?php
    include_once("database/db.php");
    $con = connection();

    $id = $_GET['id'];

    $sql = "SELECT * FROM job_tbl WHERE id = '$id'";
    $employee = $con->query($sql) or die ($con->error);
    $row = $employee->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Profile</h1>
    <div class="topnav">
        <a href="index.php">Home</a>
        <a href="add.php">Add</a>
        <a href="edit.php?id=<?php echo $row['id'];?>">Update</a>
    </div>

    <div class="form-control">
        <h3><?php echo $row['first_name'];?> <?php echo $row ['last_name'];?></h3>
        <h4>is a <?php echo $row['gender'];?> and also a <?php echo $row ['job_title'];?>.</h4>
    </div>
    
</body>
</html>