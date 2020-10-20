<?php
require_once "config.php";
include_once "include/session.php";
// include_once './include/navbar.php'; 
include_once '../include/class.meeting.php'; 
$meeting = new Meeting();
//Getting Meeting ID :

$us = $_SESSION["username"];
$sql3= "SELECT *  FROM members WHERE username='$us'";
$result3 =  $db->query($sql3);
$user = $result3->fetch_assoc();
$us_id = $user["id"];

$sql = "SELECT *  FROM meetings WHERE user_id='$us_id'";
$meetings =  $db->query($sql);
$_SESSION["sent"] = "false";

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

    <title>Meeting Infos</title>

    <!-- Bootstrap -->
    <style type="text/css">  
      body{ font: 14px sans-serif; background-image: url("../images/dark3.jpeg");  background-attachment: fixed; background-size: 100% 100%;  background-repeat: no-repeat; color: white }
      .button {
        display: inline-block;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        color: #ffffff;
        background-color: #7aa8b7;
        border-radius: 6px;
        outline: none;
      }
      .back{ 
          background-color: rgba(255,255,255,0.8);
          background-blend-mode: lighten;
    /* You may add things like width, height, background-size... */          
          background-repeat: no-repeat;
          background-attachment: fixed;
          width: 95%;
        }
    </style>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
  <script> function goBack() { window.history.back(); } </script> 
  <link rel="stylesheet" href="../images/assets/css/infinty.css">

</head>

<body>
<div class="container demo">
      <div >
    <div class="container demo">
   <div class="content">
      <div id="large-header" class="large-header">
         <canvas id="demo-canvas"></canvas>
         <h1 class="main-title"><span class="thin">Timetables</h1>
      </div>
   </div>
</div>
<div class="back">
    <div class="container">
      <div >
            <hr>
            <p align="right"> <button class="button" onclick="goBack()">Go Back</button> </p>
            <table style="width:100%">
            <tr>
                <th style="text-align:center">N° </th>
                <th style="text-align:center">Subject</th>
                <th style="text-align:center">Room</th>
                <th style="text-align:center">Date</th>
                <th style="text-align:center">From</th>
                <th style="text-align:center">To</th>
            </tr>
            <?php
            $number=1; 
        if ($meetings->num_rows > 0) {
          while($row = $meetings->fetch_assoc()) {
            $mid = $row["id"];
            $room_id = $row["room_id"];

            $sql2= "SELECT *  FROM timetable WHERE meeting_id='$mid'";
            $result_time =  $db->query($sql2);
            $timetables = $result_time->fetch_assoc();

            echo '
                <tr>
                <td style="text-align:center; color: black">'.$number++.'</td>
                <td style="text-align:center; color: black">'.$timetables["subject"].'</td>
                <td style="text-align:center; color: black"><a href="../building/building.php"  style="background-color: #988AB6; color: #000000" class="button">'.$room_id=$meeting -> getRoomName($row['room_id']).' </a></td>
                <td style="text-align:center; color: black">'.$row['date'].'</td>
                <td style="text-align:center; color: black">'. date('h:i A', strtotime($row['time_from'])).'</td>
                <td style="text-align:center; color: black">'.date('h:i A', strtotime($row['time_to'])).'</td>
            </tr>
            ';
          }
        } else {
          echo "0 results";
        }
        $db->close();
        ?>
        </table>
        </div>
        <br>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</div>
</body>

</html>