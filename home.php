<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
$team = $_SESSION['team'];


if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/css/bootstrap-slider.min.css" rel="stylesheet"/>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/bootstrap-slider.min.js"></script>
   <script src="js/search.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" />
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>

    <!-- custom css file link  -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->

</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">
                <?php
         $select = mysqli_query($conn, "SELECT * FROM `counsellor` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img style="border-radius: 50%;" height="65px" src="images/default-avatar.png">';
         }else{
            echo '<img style="border-radius: 50%;" height="65px" src="uploaded_img/'.$fetch['image'].'">';
         }

          echo ' Welcome ', $fetch['name'];
      ?>
                </a>
            </li>
        </ul>
    </div>
    <?php 
      if($team === "team a"){?>
         <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="#"><h1>Counsellor Team A's Hub</h1></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
     <?php }elseif($team === "team b"){?>
         <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="#"><h1>Counsellor Team B's Hub</h1></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
     <?php }elseif($team === "team c"){?>
         <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="#"><h1>Counsellor Team C's Hub</h1></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
     <?php }elseif($team === "team d"){?>
         <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="#"><h1>Counsellor Team D's Hub</h1></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
     <?php }elseif($team === "team e"){?>
         <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="#"><h1>Counsellor Team E's Hub</h1></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
     <?php }elseif($team === "team f"){?>
         <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="#"><h1>Counsellor Team F's Hub</h1></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
     <?php }elseif($team === "team g"){?>
         <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="#"><h1>Counsellor Team G's Hub</h1></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
     <?php }elseif($team === "team h"){?>
         <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="#"><h1>Counsellor Team H's Hub</h1></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
     <?php }elseif($team === "team i"){?>
         <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="#"><h1>Counsellor Team I's Hub</h1></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
     <?php }
     
     ?>
    
    


    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link btn-sm btn-success" href="update_profile.php">Update Profile</a>
            </li>
            <li style="margin-left: 20px; margin-right: 15px;" class="nav-item">
                <a class="nav-link btn-sm btn-danger" href="home.php?logout=<?php echo $user_id; ?>">Logout</a>
            </li>
        </ul>
    </div>
</nav>


<div>
<div class="container" id="search" >
    <div class="row mt-5 mb-5">
          <div class="col col-sm-2"> </div>
          <div class="col col-sm-8">
            <input type="text" id="gfg" name="search_box" class="form-control form-control-lg" placeholder="Type Here..." onkeyup="javascript:load_data(this.value)" />
            <span id="search_result"></span>
          </div>
        </div>    	

  
    <div class="row justify-content-center">
        <div class="col-6">
            <div id="card"> </div>
        </div>
    </div> 

    
    
    <div class="container" id="geeks">
        <div class="row">
    

    
                <?php 
                    include "connects.php";
                    // if($team === "team a"){
                     $stmt = $db->prepare("SELECT * FROM students");
                    // }elseif($team === "team b"){
                    //  $stmt = $db->prepare("SELECT * FROM ctb");
                    // }elseif($team === "team c"){
                    //  $stmt = $db->prepare("SELECT * FROM ctc");
                    // }elseif($team === "team d"){
                    //  $stmt = $db->prepare("SELECT * FROM ctd");
                    // }elseif($team === "team e"){
                    //  $stmt = $db->prepare("SELECT * FROM cte");
                    // }elseif($team === "team f"){
                    //  $stmt = $db->prepare("SELECT * FROM ctf");
                    // }elseif($team === "team g"){
                    //  $stmt = $db->prepare("SELECT * FROM ctg");
                    // }elseif($team === "team h"){
                    //  $stmt = $db->prepare("SELECT * FROM cth");
                    // }elseif($team === "team i"){
                    //  $stmt = $db->prepare("SELECT * FROM cti");
                    // }
                    $stmt->execute();
                    while ($row = $stmt->fetch()) {
                        if($team === $row['team']){
                    ?>
                    <div style="margin-bottom: 30px;" class="col-sm-3">
                        <div class="card" >
                            <img class="card-img-top img-fluid" src="https://media.istockphoto.com/id/1328488607/photo/portrait-of-african-american-female-teacher-smiling-in-the-class-at-school.jpg?b=1&s=170667a&w=0&k=20&c=e1eCZEsldaHDfCeHPl5VjADjeYEnmuxDgaj7va-L4sg=" alt="">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['id'] ?></h5>
                                <p class="card-text"><?php echo $row['fname'] ?> <?php echo $row['mname'] ?> <?php echo $row['lname'] ?></p>
                                <p class="card-text"><?php echo $row['email'] ?></p>
                                <p class="card-text"><?php echo $row['number'] ?></p>
                                <p class="card-text"><?php echo $row['course'] ?></p>
                                <p class="card-text"><?php echo $row['year'] ?>, <?php echo $row['month'] ?></p>
                                <div style="display: flex;">
                                <a style="margin-right: 12px;" class="btn btn-dark btn-sm" href="full-view.php?id=<?= $row['id']; ?>" >View</a>
                                <a style="margin-right: 12px;" href="cmessage.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm">Message</a>
                                <a  href="status.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Status</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                        
                        
                    
                    <?php
                    }
                }
                ?>
    </div>

    </div>

    
    <script>
 $(function(){
  $("#school").select2();
 }); 
</script>
<script>
            $(document).ready(function() {
                $("#gfg").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#geeks div").filter(function() {
                        $(this).toggle($(this).text()
                        .toLowerCase().indexOf(value) > -1)
                    });
                });
            });
            </script>


<script>

function get_text(event)
{
	var string = event.textContent;

	document.getElementsByName('search_box')[0].value = string;

	document.getElementById('search_result').innerHTML = '';
}

function load_data(query)
{
	if(query.length > 2)
	{
		var form_data = new FormData();

		form_data.append('query', query);

		var ajax_request = new XMLHttpRequest();

		ajax_request.open('POST', 'fetchData.php');

		ajax_request.send(form_data);

		ajax_request.onreadystatechange = function()
		{
			if(ajax_request.readyState == 4 && ajax_request.status == 200)
			{
				var response = JSON.parse(ajax_request.responseText);

				var html = '<div class="list-group">';

				if(response.length > 0)
				{
					for(var count = 0; count < response.length; count++)
					{
						html += '<a href="#" class="list-group-item list-group-item-action" onclick="get_text(this)">'+response[count].course+'  '+response[count].school+'</a>';
					}
				}
				else
				{
					html += '<a href="#" class="list-group-item list-group-item-action disabled">No Data Found</a>';
				}

				html += '</div>';

				document.getElementById('search_result').innerHTML = html;
			}
		}
	}
	else
	{
		document.getElementById('search_result').innerHTML = '';
	}
}

</script>


<div class="container" style="display: none;">

   <div class="profile">
      <?php
         $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
      ?>
      <h3><?php echo $fetch['name']; ?></h3>
      <a href="update_profile.php" class="btn">update profile</a>
      <a href="home.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>
      <p>new <a href="login.php">login</a> or <a href="register.php">register</a></p>
   </div>

</div>

</body>
</html>