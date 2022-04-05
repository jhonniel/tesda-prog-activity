<?php
    include_once("database/db.php");
    $con = connection();
    
    if(isset($_POST['Submit'])){
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $job = $_POST['job'];

        $sql = "INSERT INTO `job_tbl` (`first_name`,`last_name`,`gender`,`job_title`, `status`) VALUES ('$fname','$lname','$gender','$job', 1)";
        $con->query($sql) or die($con->error);


        echo header("Location: index.php");
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>ADD CUSTOMER</h1>
    <div class="topnav">
        <a href="index.php">HOME</a>    
    </div>
    
    <div class="form-control">

    <form action="" method="post">
        
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" id="firstname" id="firstname" placeholder="Enter Your Fullname.." required autofocus>

            <br>

            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" id="lastname" id="lastname" placeholder="Enter Your Lastname.." required>
            
            <br>
            
            <label for="gender">Gender</label>
            <select name="gender" id="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <br>


            <label for="job">Job Title</label>
            <input type="text" name="job" id="job" id="job" placeholder="Your Job Title..">
            
            <br>

            <input type="submit" value="Submit" name="Submit">

        </form>

    </div>
</body>
</html>