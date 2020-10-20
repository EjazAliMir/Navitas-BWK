<?php
require_once "config.php";
include_once "include/session.php";
include_once './include/navbar.php'; 
include_once '../include/class.meeting.php'; 

$mail = new Meeting();


//Getting Meeting ID :
$mid = $_SESSION["mid"];
$sql = "SELECT *  FROM meetings WHERE id='$mid'";
$result_id =  $db->query($sql);
$meeting_id = $result_id->fetch_assoc();

//vars 
$room_id = $meeting_id["room_id"];
$user_id = $meeting_id["user_id"];

$sql2= "SELECT *  FROM rooms WHERE id='$room_id'";
$result2 =  $db->query($sql2);
$room = $result2->fetch_assoc();

$sql3= "SELECT *  FROM members WHERE id='$user_id'";
$result3 =  $db->query($sql3);
$user = $result3->fetch_assoc();

$org_name= $user["username"];
$org_mail= $user["email"];
$vistor_name = $_SESSION["username"];
$mail -> notifyMember($vistor_name,$org_name,$org_mail,$mid);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://www.latrobe.edu.au/__data/assets/git_bridge/0009/1037862/css/legacy-ltu.css?h=d97b0f8" rel="stylesheet" media="screen" />

    <title>Meeting</title>

    <!-- Bootstrap -->
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
  <script> function goBack() { window.history.back(); } </script> 
  
</head>

<body>
    <div class="container">
       <img class="img-responsive" src="../images/meeting.jpg" style="width:50%; height:250px; margin: auto 20px; display: block;">      
        
      <div >
      <h2>Meeting Information : </h2>    
            <hr>
            <p align="right"> <button class="button" onclick="goBack()">Go Back</button> </p>
                <div ><br>   
                <p>  Organizer :   <?php echo $user["username"]; ?> </p>
                <p>  Room Number : <?php echo $room["name"]; ?> </p>
                <p>  Date : <?php echo $meeting_id["date"]; ?> </p>
                        From : <?php echo date('h:i A' , strtotime($meeting_id["time_from"])) ; ?> To : <?php echo date('h:i A' , strtotime($meeting_id["time_to"])) ; ?>    </p>
                <p><a href="../building/building.php"> Room Direction </p> 
                </div>
               <br>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
</body>

</html>