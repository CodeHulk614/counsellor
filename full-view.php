<?php
require 'dbcon.php';
session_start();
$team = $_SESSION['team'];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Full Details 
                            <a href="home.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                        //    if($team === "team a"){
                            $query = "SELECT * FROM students WHERE id='$student_id' ";
                        //    }elseif($team === "team b"){
                        //     $query = "SELECT * FROM ctb WHERE id='$student_id' ";
                        //    }elseif($team === "team c"){
                        //     $query = "SELECT * FROM ctc WHERE id='$student_id' ";
                        //    }elseif($team === "team d"){
                        //     $query = "SELECT * FROM ctd WHERE id='$student_id' ";
                        //    }elseif($team === "team e"){
                        //     $query = "SELECT * FROM cte WHERE id='$student_id' ";
                        //    }elseif($team === "team f"){
                        //     $query = "SELECT * FROM ctf WHERE id='$student_id' ";
                        //    }elseif($team === "team g"){
                        //     $query = "SELECT * FROM ctg WHERE id='$student_id' ";
                        //    }elseif($team === "team h"){
                        //     $query = "SELECT * FROM cth WHERE id='$student_id' ";
                        //    }elseif($team === "team i"){
                        //     $query = "SELECT * FROM cti WHERE id='$student_id' ";
                        //    }
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Student ID</label>
                                        <p class="form-control">
                                            <?=$student['id'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Full Name</label>
                                        <p class="form-control">
                                            <?=$student['fname'];?> <?=$student['mname'];?> <?=$student['lname'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Gender</label>
                                        <p class="form-control">
                                            <?=$student['gender'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Email Address</label>
                                        <p class="form-control">
                                            <?=$student['email'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Phone Number</label>
                                        <p class="form-control">
                                            <?=$student['number'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label> Course</label>
                                        <p class="form-control">
                                            <?=$student['course'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label> Degree</label>
                                        <p class="form-control">
                                            <?=$student['degree'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label> Intake Period</label>
                                        <p class="form-control">
                                            <?=$student['month'];?>, <?=$student['year'];?>.
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label> First School Pick</label>
                                        <p class="form-control">
                                            <?=$student['school'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label> Second School Pick</label>
                                        <p class="form-control">
                                            <?=$student['school1'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label> Third School Pick</label>
                                        <p class="form-control">
                                            <?=$student['school2'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label> Status</label>
                                        <p class="form-control">
                                            <?=$student['status'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Priority</label>
                                            <p class="form-control">
                                            <?php 
                            if($student["year"] === "2023" && $student["month"] === "January"){
                                echo "High";
                            }elseIf($student["year"] === "2023" && $student["month"] === "Mid"){
                                echo "Medium";
                            }elseif($student["year"] === "2023" && $student["month"] === "September"){
                                echo "Low";
                            }else {
                                echo $student["year"];
                            }
                        ?>
                                            </p>
                                        
                                    </div>
                                    <div class="mb-3">
                                        <label> Documents</label>
                                        <p class="form-control">
                                       
                        <?php if(empty($student["cv"])){ ?>
                            <a style="margin-top: 10px;" href="" class="btn btn-danger">CV not Uploaded</a>      
                                    <?php }else{ ?>
                                        <a style="margin-top: 10px;" href="download1.php?id=<?php echo $student["id"]?>" class="btn btn-primary">CV.pdf</a> 
                          <?php  } ?> 

                          <?php if(empty($student["ps"])){ ?>
                            <a style="margin-top: 10px;" href="" class="btn btn-danger">PS not Uploaded</a>      
                                    <?php }else{ ?>
                                        <a style="margin-top: 10px;" href="download.php?id=<?php echo $student["id"]?>" class="btn btn-primary">PS.pdf</a> 
                          <?php  } ?> 

                          <?php if(empty($student["ssce"])){ ?>
                            <a style="margin-top: 10px;" href="" class="btn btn-danger">SSCE not Uploaded</a>      
                                    <?php }else{ ?>
                                        <a style="margin-top: 10px;" student="download2.php?id=<?php echo $student["id"]?>" class="btn btn-primary">SSCE.pdf</a> 
                          <?php  } ?> 

                          <?php if(empty($student["dp"])){ ?>
                            <a style="margin-top: 10px;" href="" class="btn btn-danger">DP not Uploaded</a>      
                                    <?php }else{ ?>
                                        <a style="margin-top: 10px;" href="download3.php?id=<?php echo $student["id"]?>" class="btn btn-primary">DP.pdf</a> 
                          <?php  } ?> 
                          
                          <?php if(empty($student["mc"])){ ?>
                                    <a style="margin-top: 10px;" href="" class="btn btn-danger">MC not Uploaded</a>      
                                    <?php }else{ ?>
                                    <a style="margin-top: 10px;" href="download4.php?id=<?php echo $student["id"]?>" class="btn btn-primary">MC.pdf</a> 
                          <?php  } ?> 
                          

                          <?php if(empty($student["orl"])){ ?>
                                    <a style="margin-top: 10px;" href="" class="btn btn-danger">ORL not Uploaded</a>      
                                    <?php }else{ ?>
                                        <a style="margin-top: 10px;" href="download5.php?id=<?php echo $student["id"]?>" class="btn btn-primary">ORL.pdf</a> 
                          <?php  } ?>

                          <?php if(empty($student["arl"])){ ?>
                                    <a style="margin-top: 10px;" href="" class="btn btn-danger">ARL not Uploaded</a>      
                                    <?php }else{ ?>
                                        <a style="margin-top: 10px;" href="download6.php?id=<?php echo $student["id"]?>" class="btn btn-primary">ARL.pdf</a> 
                          <?php  } ?>

                          <?php if(empty($student["bh"])){ ?>
                                    <a style="margin-top: 10px;" href="" class="btn btn-danger">BH not Uploaded</a>      
                                    <?php }else{ ?>
                                        <a style="margin-top: 10px;" href="download7.php?id=<?php echo $student["id"]?>" class="btn btn-primary">BH.pdf</a> 
                          <?php  } ?>

                          <?php if(empty($student["trans"])){ ?>
                                    <a href="" style="margin-top: 10px;" class="btn btn-danger">Trans not Uploaded</a>      
                                    <?php }else{ ?>
                                        <a style="margin-top: 10px;" href="download8.php?id=<?php echo $student["id"]?>" class="btn btn-primary">Trans.pdf</a> 
                          <?php  } ?>
                          
                          
                          
                        
                                        </p>
                                    </div>

                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>