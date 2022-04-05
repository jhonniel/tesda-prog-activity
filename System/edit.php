<?php
    include_once("database/db.php");
    $con = connection();

    $id = $_GET['id'];

    $sql = "SELECT * FROM job_tbl WHERE id = '$id'";
    $employee = $con->query($sql) or die ($con->error);
    $row = $employee->fetch_assoc();

    if(isset($_POST['Submit'])){
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $job = $_POST['job'];

        $sql = "UPDATE job_tbl SET first_name = '$fname', last_name = '$lname', gender = '$gender', job_title = '$job' WHERE id = '$id'";
        $con->query($sql) or die ($con->error);

        echo header("Location: profile.php?id=".$id);

    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Update Customer</h1>
    <div class="topnav">
        <a href="index.php">HOME</a>    
    </div>
    
    <div class="form-control">

    <form action="" method="post">
        
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" id="firstname" id="firstname" value="<?php echo $row['first_name']?>" placeholder="Enter Your Fullname.." required autofocus>

            <br>

            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" id="lastname" id="lastname" value="<?php echo $row['last_name']?>" placeholder="Enter Your Lastname.." required>
            
            <br>
            
            <label for="gender">Gender</label>
            <select name="gender" id="gender">
                <option value="male<?php echo ($row['gender'] == "Male")? 'selected' : '' ?>">Male</option>
                <option value="female<?php echo ($row['gender'] == "Female")? 'selected' : '' ?>">Female</option>
                
                <!-- <option value="female">Female</option> -->
            </select>

            <br>


            <label for="job">Job Title</label>
            <input type="text" name="job" id="job" id="job" value="<?php echo $row['job_title']?>" placeholder="Your Job Title..">
            
            <br>

            <input type="submit" value="Submit" name="Submit" value="Update">

        </form>

    </div>
</body>
</html>