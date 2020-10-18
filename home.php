<?php
include_once 'member/include/session.php'; 
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- <link href="https://www.latrobe.edu.au/__data/assets/git_bridge/0009/1037862/css/legacy-ltu.css?h=d97b0f8" rel="stylesheet" media="screen" /> -->

    <title>Home</title>
    <!-- Bootstrap -->
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>    <style type="text/css">
        body{ font: 18px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
        .button {
        display: block;
        padding: 20px 40px;
        text-align: center;
        text-decoration: none;
        color: #ffffff;
        background-color: #7173df;
        border-radius: 6px;
        outline: none;
        height: 50px;    
        width: 300px;
        display: table-cell;
        font-size: 15px;
        font-family:  Helvetica, sans-serif;
      }
      .container {
        position: relative;
        max-width: 1000px; /* Maximum width */
        margin: 0 auto; /* Center it */
        }

        .container .content {
        position: absolute; /* Position the background text */
        bottom: 0; /* At the bottom. Use top:0 to append it to the top */
        background: rgb(0, 0, 0); /* Fallback color */
        background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
        color: #f1f1f1; /* Grey text */
        background-color: #d6d6d6;
        opacity: 0.9;
/* This is mostly intended for prototyping; please download the pattern and re-host for production environments. Thank you! */
        width: 100%; /* Full width */
        height: 150px; /* Full width */
        padding: 20px; /* Some padding */
        }
    </style>
        <!-- Bootstrap core CSS -->
        <link href="images/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Additional CSS Files -->
<link rel="stylesheet" href="images/assets/css/fontawesome.css">
<link rel="stylesheet" href="images/assets/css/templatemo-host-cloud.css">
<link rel="stylesheet" href="images/assets/css/owl.css">
</head>
<body>
  
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
            <div></div>

        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

<div class="banner">
      <div class="container">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="header-text caption">
            <div class="container">
            <h2 style="font-family: Arial, Helvetica, sans-serif; font-size: 40px">WELCOME TO NAVITAS</h2>
            <h2>BWK</h2>
              <div id="search-section">
                  <ul>
                    <li><label> <a href="building/searchRoom.php"> <button class="button" > Search Room Number </button> </a> </em></span></label></li>
                    <li><label> <a href="building/building.php"> <button class="button" > Building Map </button> </a> </em></span></label></li>
                    <li><label> <a href="building/room.php"> <button class="button" > Room Information Query </button> </a> </em></span></label></li>
                  </ul>
               <div class="advSearch_chkbox">
               </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
      <br><br>
      <p style="color: #ffffff;  font-size: 20px ; text-align:center; margin-right:-15%; "> Click here to <a href="login.php" >  <button style="background-color: #0FBD85; padding: 5px 30px; color: #ffffff; border-radius: 6px;" >    Login    </button></a></p>
      <p style="text-align:center; margin-right:-55%; "> <a href=""> <button style="background-color: #7173df;  color: #ffffff; border-radius: 6px;" > Change language </button></a></p>
    </div>
   <!-- Footer Ends Here -->

    <!-- Bootstrap core JavaScript -->
    <script src="images/vendor/jquery/jquery.min.js"></script>
    <script src="images/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="images/assets/js/custom.js"></script>
    <script src="images/assets/js/owl.js"></script>
    <script src="images/assets/js/accordions.js"></script>
    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

</body><br>
</html>