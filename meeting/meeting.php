<?php
    include_once '../member/include/navbar.php'; 
    // require_once "../include/config.php";
    require_once "../member/include/session.php";
    include_once '../include/class.meeting.php'; 
    $meeting = new Meeting();

    $roomname=$_GET['roomname'];
    if(!empty($_SESSION)){
        $user = $_SESSION["username"];
      }
    if(isset($_REQUEST[ 'submit'])) 
    { 
        extract($_REQUEST); 
        $result= $meeting->meetingNow($user,$checkin,$checkout,$roomname);
        if(!empty($result))
        {
           
        if (strpos($result, "Passcode") !== false) {
            echo "<script type='text/javascript'>
            window.location.href='info.php';
            alert('".$result."');
            </script>";          
        }   
        echo "<script type='text/javascript'>
        alert('".$result."');
        </script>";    
        }
    }
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
  <script>
  $( function() {
    $( ".datepicker" ).datepicker({
                  dateFormat : 'yy-mm-dd'
                });
  } );
  </script>

    
</head>

<body>
    <div class="container">
      
      
       <img class="img-responsive" src="../images/meeting.jpg" style="width:50%; height:250px; margin: auto 20px; display: block;">      
        

      <div >
            <h2>Schedule Now : <?php echo $roomname; ?></h2>
            <hr>
            <form action="" method="post" name="room_meeting">
              
              
               <div class="form-group">
                    <label for="checkin">Check In :</label>&nbsp;&nbsp;&nbsp;
                    <input type="text" class="datepicker" name="checkin">

                </div>
               
               <div class="form-group">
                    <label for="checkout">Check Out:</label>&nbsp;
                    <input type="text" class="datepicker" name="checkout">
                </div>               
               
                <button type="submit" class="btn btn-lg btn-primary button" name="submit">Schedule Now</button>
               <br>
                <div id="click_here">
                    <a href="../member/welcome.php">Back to Home</a>
                </div>
            </form>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
</body>

</html>