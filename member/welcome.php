<?php 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Members</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://www.latrobe.edu.au/__data/assets/git_bridge/0009/1037862/css/legacy-ltu.css?h=d97b0f8" rel="stylesheet" media="screen" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>    
  <style type="text/css">  
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
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
      .container {
        position: relative;
        max-width: 1000px; /* Maximum width */
        margin: 10px auto; /* Center it */
        }
        .container .content {
        position: absolute; /* Position the background text */
        bottom: 0;
        top: 80%; /* At the bottom. Use top:0 to append it to the top */
        background: rgb(0, 0, 0); /* Fallback color */
        background: rgba(0, 0, 0, 0.2); /* Black background with 0.5 opacity */
        color: #120337; /* Grey text */
        width: 90%; /* Full width */
        height: 200px; /* Full width */
        padding: 40px; /* Some padding */
        }
        body {
    font: 18px sans-serif; 
    background-color: #C1C0C2;
    filter: progid: DXImageTransform.Microsoft.gradient(gradientType=1, startColorstr='#C1C0C2', endColorstr='#7D0614');
    background-image: url(//img.alicdn.com/tps/TB1d.u8MXXXXXXuXFXXXXXXXXXX-1900-790.jpg);
    background-size: 100%;
    background-image: -webkit-gradient(linear, 0 0, 100% 100%, color-stop(0, #003073), color-stop(100%, #7D0614));
    background-image: -webkit-linear-gradient(135deg, #C1C0C2, #7D0614);
    background-image: -moz-linear-gradient(45deg, #C1C0C2, #7D0614);
    background-image: -ms-linear-gradient(45deg, #C1C0C2 0, #7D0614 100%);
    background-image: -o-linear-gradient(45deg, #C1C0C2, #7D0614);
    background-image: linear-gradient(135deg, #C1C0C2, #7D0614);
    text-align: center;
    margin: 0px;
    overflow: hidden;
}
    </style>
      <link rel="stylesheet" href="../images/assets/css/infinty.css">

</head>
<body>
<div class="content">
      <div id="large-header" class="large-header">
         <canvas id="demo-canvas"></canvas>
         <h1 class="main-title"><span class="thin">Members Panel  </h1>
      </div>
   </div>
   <br><br><br>
    <div class="container">
    <div class="col-md-3"> 
            <a href="../building/room.php"> <button class="button" >Room query </button> </a>
        </div>
        <div class="col-md-3">
                <a href="confirm-timetable.php"> <button  class="button" > Timetables </button></a>
        </div>
        <div class="col-md-3">
                <a href="confirm-meeting.php"> <button  class="button" > Meetings Info </button></a>
        </div>
        <div class="col-md-3"> 
            <a href="../building/searchRoom.php"> <button class="button" > Search Room Number </button> </a>
        </div>
        </div>
</div> 
<script src="../images/assets/js/infinity2.js"></script>

</body>
</html>