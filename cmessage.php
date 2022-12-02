<?php
session_start();
require 'dbcon.php';
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

    <title>Search Engine Data Edit</title>
</head>
<body>
  
    <div class="container mt-5">

        

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Message Page
                            <a href="home.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                       
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            // if($team === "team a"){
                                $query = "SELECT * FROM students WHERE id='$student_id' ";
                            // }elseif($team === "team b"){
                            //     $query = "SELECT * FROM ctb WHERE id='$student_id' ";
                            // }elseif($team === "team c"){
                            //     $query = "SELECT * FROM ctc WHERE id='$student_id' ";
                            // }elseif($team === "team d"){
                            //     $query = "SELECT * FROM ctd WHERE id='$student_id' ";
                            // }elseif($team === "team e"){
                            //     $query = "SELECT * FROM cte WHERE id='$student_id' ";
                            // }elseif($team === "team f"){
                            //     $query = "SELECT * FROM ctf WHERE id='$student_id' ";
                            // }elseif($team === "team g"){
                            //     $query = "SELECT * FROM ctg WHERE id='$student_id' ";
                            // }elseif($team === "team h"){
                            //     $query = "SELECT * FROM cth WHERE id='$student_id' ";
                            // }elseif($team === "team i"){
                            //     $query = "SELECT * FROM cti WHERE id='$student_id' ";
                            // }
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                <form action="mcode.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $student['id']; ?>">

                                    <div class="mb-3">
                                        <label>Message</label>
                                        <input type="text" name="message" value="<?=$student['message'];?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_message" class="btn btn-primary">
                                            Send Message
                                        </button>
                                    </div>

                                </form>
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