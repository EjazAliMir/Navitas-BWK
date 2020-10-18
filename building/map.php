<?php
// Initialize the session 
// Include config file
require_once "config.php";

// include_once "../visitor/include/navbar.php"; 
include_once "../member/include/session.php";

//include_once '../member/session.php'; 
// Processing form data when form is submitted   
$sql = "SELECT id,name,address FROM `rooms`";
$result = $link->query($sql);
$user = '';
if(!empty($_SESSION)){
  $user = $_SESSION["username"];
}
$sql2 = "SELECT username FROM `members` WHERE `username` = '".$user."'" ;
$result2 = $link->query($sql2);
$staff = $result2->num_rows > 0;
if( $staff > 0) { 
  include_once('../member/include/navbar.php');
}else{
  include_once('../visitor/include/navbar.php');
}

        
// $sql_meeting="SELECT * FROM meetings WHERE room_id='Room1' AND ('2020-08-17' BETWEEN checkin AND checkout OR '2020-08-20' BETWEEN checkin AND checkout)";
// $check= $link->query($sql_meeting);
// echo mysqli_num_rows($check);
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
    <title>Buildings and maps </title>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style type="text/css">
        body{ 
          font: 14px sans-serif;
        }
        .back{ 
          background-image: url('/kiosk/images/navitas.png');
          background-color: rgba(255,255,255,0.8);
          background-blend-mode: lighten;
    /* You may add things like width, height, background-size... */          
          background-repeat: no-repeat;
          background-attachment: fixed;
          width: 95%;
        }
        .wrapper{ width: 550px; padding: 10px; }
        .clearfix {
          overflow: auto;
        } 
        .container {
        position: relative;
        margin: 10px auto; /* Center it */
        padding: 0px;
        }
    </style>
</head>
<body>
<div class="back">  
<div class="container">
    <div class="wrapper">
        <h2>  Buildings and maps</h2>
        <p>See below for detailed maps and location information for each of our Buildings.</p>
        <?php 
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo '
            <p>
            <div class="container  h-10">
            <div class="row  h-50" >
            <div class="col-md-1"> </div>
            <div class="col-md-7"  style="background-color: #DAEBF7">
              <p><h4 >'.$row["name"].'</h4></p>
              <p  style="display: inline-block; vertical-align: top;" ><h6 > Address : ' . $row["address"]. '</h6></p> <a  style="display: inline-block; vertical-align: top;" id='.$row["id"].'> Show/Hide Maps</a>
              <div class="content"  id="map'. $row["id"].'" hidden="true"> <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12623.821245362686!2d145.0483946!3d-37.7207268!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf0456760532dac0!2sLa+Trobe+University!5e0!3m2!1sen!2sau!4v1456455783003" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
            </div>'
            .($staff>0 ? '
            <div class="col-md-3">
              <a href="/kiosk/meeting/meeting.php?roomname='.$row['name'].'"><button class="btn btn-primary button">Schedule Meeting Now</button> </a>
            </div>' : '').'
            <script> $( "#'. $row["id"].'" ).click(function() { $( "#map'. $row["id"].'" ).toggle( "slow" ); }); </script>   
            </div>
            </div>
            </p>'; 
            
          }
        } else {
          echo "0 results";
        }
        $link->close();
        ?>
    </div> 
    </div>
  </div>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>

</html>