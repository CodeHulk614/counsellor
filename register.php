<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $team = mysqli_real_escape_string($conn, $_POST['team']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select = mysqli_query($conn, "SELECT * FROM `counsellor` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'Counsellor With Similar Email Already Exist'; 
   }else{
      if($pass != $cpass){
         $message[] = 'Passwords Do Not Match!';
      }elseif($image_size > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `counsellor`(name, email, team, password, image) VALUES('$name', '$email', '$team', '$pass', '$image')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'Counsellor Has Been Registered Succesfully!';
            header('location:login.php');
         }else{
            $message[] = 'Counsellor Registeration Failed!';
         }
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Counsellor Registration</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <label for="">Full Name: </label>
      <input type="text" name="name" placeholder="enter username" class="box" required>
      <br>
      <br>
      <label for="">Email: </label>
      <input type="email" name="email" placeholder="enter email" class="box" required>
      <br>
      <br>
      <label  for="team">Team <span style="font-size: x-small; color: red;"> (Pick Councelling Team)</span> <span style="font-size: small; color: red;"> *</span></label>
        <select class="box" id="team" name="team" required>
            <option value="team a">Team A</option>
            <option value="team b" selected>Team B</option>
            <option value="team c">Team C</option>
            <option value="team d">Team D</option>
            <option value="team e" >Team E</option>
            <option value="team f">Team F</option>
            <option value="team g">Team G</option>
            <option value="team h" >Team H</option>
            <option value="team i">Team I</option>
        </select>
      <label for="">Password: </label>
      <input type="password" name="password" placeholder="enter password" class="box" required>
      <br>
      <br>
      <label for="">Confirm Password: </label>
      <input type="password" name="cpassword" placeholder="confirm password" class="box" required>
      <br>
      <br>
      <label for="">Upload Pfofile Picture:</label>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
      <br>
      <br>
      <input type="submit" name="submit" value="register now" class="btn">
      <p>already have an account? <a href="login.php">login now</a></p>
   </form>

</div>

</body>
</html>