<?php
session_start();
require 'dbcon.php';
$team = $_SESSION['team'];

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM search WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: search_edit.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: search_edit.php");
        exit(0);
    }
}

if(isset($_POST['update_message']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['id']);

    $message = mysqli_real_escape_string($con, $_POST['message']);

    // if($team === "team a"){
        $query = "UPDATE students SET message='$message' WHERE id='$student_id' ";
    // }elseif($team === "team b"){
    //     $query = "UPDATE ctb SET message='$message' WHERE id='$student_id' ";
    // }elseif($team === "team c"){
    //     $query = "UPDATE ctc SET message='$message' WHERE id='$student_id' ";
    // }elseif($team === "team d"){
    //     $query = "UPDATE ctd SET message='$message' WHERE id='$student_id' ";
    // }elseif($team === "team e"){
    //     $query = "UPDATE cte SET message='$message' WHERE id='$student_id' ";
    // }elseif($team === "team f"){
    //     $query = "UPDATE ctf SET message='$message' WHERE id='$student_id' ";
    // }elseif($team === "team g"){
    //     $query = "UPDATE ctg SET message='$message' WHERE id='$student_id' ";
    // }elseif($team === "team h"){
    //     $query = "UPDATE cth SET message='$message' WHERE id='$student_id' ";
    // }elseif($team === "team i"){
    //     $query = "UPDATE cti SET message='$message' WHERE id='$student_id' ";
    // }
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Message Sent Successfully";
        header("Location: home.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Message Not Sent";
        header("Location: cmessage.php");
        exit(0);
    }

}

if(isset($_POST['update_status']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['id']);

    $status = mysqli_real_escape_string($con, $_POST['status']);

    // if($team === "team a"){
        $query = "UPDATE students SET status='$status' WHERE id='$student_id' ";
    // }elseif($team === "team b"){
    //     $query = "UPDATE ctb SET status='$status' WHERE id='$student_id' ";
    // }elseif($team === "team c"){
    //     $query = "UPDATE ctc SET status='$status' WHERE id='$student_id' ";
    // }elseif($team === "team d"){
    //     $query = "UPDATE ctd SET status='$status' WHERE id='$student_id' ";
    // }elseif($team === "team e"){
    //     $query = "UPDATE cte SET status='$status' WHERE id='$student_id' ";
    // }elseif($team === "team f"){
    //     $query = "UPDATE ctf SET status='$status' WHERE id='$student_id' ";
    // }elseif($team === "team g"){
    //     $query = "UPDATE ctg SET status='$status' WHERE id='$student_id' ";
    // }elseif($team === "team h"){
    //     $query = "UPDATE cth SET status='$status' WHERE id='$student_id' ";
    // }elseif($team === "team i"){
    //     $query = "UPDATE cti SET status='$status' WHERE id='$student_id' ";
    // }
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Status Updated Successfully";
        header("Location: home.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Status Not Updated";
        header("Location: cmessage.php");
        exit(0);
    }

}

// if(isset($_POST['save_student']))
// {
//     $name = mysqli_real_escape_string($con, $_POST['name']);
//     $email = mysqli_real_escape_string($con, $_POST['email']);
//     $phone = mysqli_real_escape_string($con, $_POST['phone']);
//     $course = mysqli_real_escape_string($con, $_POST['course']);

//     $query = "INSERT INTO students (name,email,phone,course) VALUES ('$name','$email','$phone','$course')";

//     $query_run = mysqli_query($con, $query);
//     if($query_run)
//     {
//         $_SESSION['message'] = "Student Created Successfully";
//         header("Location: student-create.php");
//         exit(0);
//     }
//     else
//     {
//         $_SESSION['message'] = "Student Not Created";
//         header("Location: student-create.php");
//         exit(0);
//     }
// }

?>