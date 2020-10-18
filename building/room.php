<?php
// Initialize the session 
// Include config file
require_once "config.php";
include_once "../member/include/session.php";
// include_once('../member/include/navbar.php');

$sql = "SELECT * FROM `rooms`";
$result = $link->query($sql);

// if(!empty($_SESSION)){
// $user = $_SESSION["username"];
// }

// $sql2 = "SELECT username FROM `members` WHERE `username` = '".$user."'" ;
// $result2 = $link->query($sql2);
// $staff = $result2->num_rows > 0;
// if( $staff > 0) { 
// }else{
//   include_once('../visitor/include/navbar.php');
// }

        
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

    <title>Building MAP</title>
    <!-- Bootstrap -->
    <style type="text/css">  
      .button {
        display: inline-block;
        padding: 5px 20px;
        text-align: center;
        text-decoration: none;
        color: #000000;
        background-color: #F4DFF2;
        border-radius: 6px;
        outline: none;
      }
      body {
	background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
	background-size: 400% 400%;
	animation: gradient 15s ease infinite;
}

@keyframes gradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}

    </style>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script> function goBack() { window.history.back(); } </script> 
<link href="images/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Additional CSS Files -->
<link rel="stylesheet" href="../images/assets/css/fontawesome.css">
<link rel="stylesheet" href="../images/assets/css/templatemo-host-cloud.css">
<link rel="stylesheet" href="../images/assets/css/owl.css">
<link rel="stylesheet" href="../images/assets/css/infinty.css">

</head>
<body>
  
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    <div class="container">
      <div >        
      <div class="container demo">
   <div class="content">
      <div id="large-header" class="large-header">
         <canvas id="demo-canvas"></canvas>
         <h1 class="main-title"><span class="thin">Rooms </h1>
      </div>
   </div>
            <hr>
            <p align="right"> <button class="button" onclick="goBack()">Go Back</button> </p>
            <div class="col-md-8">
            <table style="width:80%">
            <tr>
                <th style="text-align:center">Room N° </th>
                <th style="text-align:center">Name</th>
                <th style="text-align:center">Entrance</th>
            </tr>
            <?php
            $number=1; 
        if ($result->num_rows > 0) {
            $preced_row = "Basement";
            $in = "false";
            $i = 0;
          while($row = $result->fetch_assoc()) {
            echo '
                <tr>
                <td style="text-align:center">'.$row["number"].'</td>
                <td style="text-align:center"><a href="building.php" style="background-color: #988AB6; color: #000000" class="button">'.$row["name"].' </a></td>
                <td style="text-align:center">'.$row["department"].'</td>
            </tr>
            ';
          }
        } else {
          echo "0 results";
        }
        $link->close();
        ?>
        </table>
        </div>
        <div class="col-md-4">
        <b>Click on the image to view the full building Map</b>
        <b> </b>
         <a href="building.php"> <img src="../images/building.png " width="400" height="300" alt="building"></a>
        </div>
    </div>

   <!-- Bootstrap core JavaScript -->
   <script src="../images/vendor/jquery/jquery.min.js"></script>
    <script src="../images/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="../images/assets/js/custom.js"></script>
    <script src="../images/assets/js/owl.js"></script>
    <script src="../images/assets/js/accordions.js"></script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" integrity="sha256-qM7QTJSlvtPSxVRjVWNM2OfTAz/3k5ovHOKmKXuYMO4=" crossorigin="anonymous"></script>
  
</div>
</body>

</html>