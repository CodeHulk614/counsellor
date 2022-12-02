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
                        <h4>Student Application Status Page
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
                                        <label>Status</label>
                                        <select class="box" id="team" name="status" required>
                                            <option value="document check">Document Check</option>
                                            <option value="document check completed">Document Check Completed</option>
                                            <option value="application processing" selected>Application Processing</option>
                                            <option value="application processed">Application Processed</option>
                                            <option value="conditional offer">Conditional Offer</option>
                                            <option value="conditional offer accepted">Conditional Offer Accepted</option>
                                            <option value="unconditional offer">Unconditional Offer</option>
                                            <option value="unconditional offer accepted">Unconditional Offer Accepted</option>
                                            <option value="school fees payment">School Fees Payment</option>
                                            <option value="school fees payed">School Fees Payed</option>
                                            <option value="cas/ceo/loa/i20" >CAS/CEO/LOA/I20</option>
                                            <option value="visa application">Visa Application</option>
                                            <option value="visa granted">Visa Granted</option>
                                        </select>
                                        
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_status" class="btn btn-primary">
                                            Update Status
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