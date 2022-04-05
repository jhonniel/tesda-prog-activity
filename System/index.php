<?php
        include_once("database/db.php");
        $con = connection();

        $sql = "SELECT * FROM job_tbl WHERE status='1'";
        $employee = mysqli_query($con, $sql);

        // $employee = $con->query($sql) or die($con->error);
        // $row = $employee->fetch_assoc();

        if(isset($_GET['type']) && $_GET ['type']=='remove' && isset
        ($_GET['id']) && $_GET['id']>0){
            $id=mysqli_real_escape_string($con, $_GET['id']);

           mysqli_query ($con,"UPDATE job_tbl SET status='-1' WHERE id='$id'");
           alert("Product successfully restore!");
			 header("refresh:1; url=index.php?");

        }
        function alert($msg) {
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>System</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        
    </head>
    <body>
        
        <h1>HOME</h1>
            <div class="topnav">
                <a href="add.php">Add</a>
                <a href="recycle.php">Recycle bin</a>

                <div class="search-container">
                    <form class="search" action="result.php" method="GET">
                        <input type="text" placeholder="Search...." name="search" id="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>

            <table>
                        <!-- <php do { ?> -->
                            <?php
                   if(mysqli_num_rows($employee) > 0)
                   {
                   echo "<thead>";
                   echo "<th>First Name</th>";
                   echo "<th>Last Name</th>";
                   echo "<th>Gender</th>";
                   echo "<th>Job Title</th>";
                   echo "<th colspan=2>Action</th>";
                   echo "</thead>";
                   echo "<tbody>";

                       while($row = mysqli_fetch_array($employee))
                       {

                    ?>
                   

                        
                            
                        <tr>
                            <td><?php echo $row['first_name'];?></td>
                            <td><?php echo $row['last_name'];?></td>
                            <td><?php echo $row['gender'];?></td>
                            <td><?php echo $row['job_title'];?></td>
                            <td><a href="profile.php?id=<?php echo $row['id'];?>" class ="btn-secondary">View</a></td>
                            <td><a href="?id=<?php echo $row['id']?>&type=remove" class ="btn-remove">Remove</a></td>
                        </tr>

                        <?php
                            }
                        }else{
                            echo '<div class="alert alert-danger" style= "text-align: center; 
                            padding: 14px 16px;"><em>No records were found.</em></div>';
                        }
                ?>
                        <!-- <php }while ($row = $employee->fetch_assoc()); ?> -->
                    </tbody>
                </table>
    </body>
    </html>