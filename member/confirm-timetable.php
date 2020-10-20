<?php
require_once "config.php";
include_once "include/session.php";
include_once 'include/navbar.php'; 
include_once '../include/class.meeting.php'; 

//Getting Meeting ID :
$mail = new Meeting();

    $us = $_SESSION["username"];
    $em = $_SESSION["email"];
    $sent = $_SESSION["sent"];
    $passcode =  (string) $_SESSION["passcode"];
    if($sent == "false"){
        $mail->sendEmail($passcode,$us,$em);
        $_SESSION["sent"] = "true";
    }
    $verify = "";
    $verify_err = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
 
        // Check if username is empty
        if(empty(trim($_POST["verify"]))){
            $verify_err = "Please enter a valid Passcode.";
        } else{
            $verify = trim($_POST["verify"]);
        }
        // Validate credentials
        if(empty($verify_err) ){
            if( $verify == $passcode){
                echo "Welcome";
                header("location: timetable.php");
            } else {
                echo "Invalid Passcode";
            }

        } else{
                    echo "Oops! Something went wrong. Please try again later.";
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

    <title>Confirm </title>
   <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
    
</head>

<body>
    <div class="container">
       <img class="img-responsive" src="../images/meeting.jpg" style="width:50%; height:250px; margin: auto 20px; display: block;">      
        
      <div >
            <hr>
            <h2>Confirm Identity : </h2>     
                <div ><br>   
                <h3> Please enter the Passcode you have recieved in your Email. </h3>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">  
                <div class="wrapper" class="form-group  <?php echo (!empty($verify_err)) ? 'has-error' : ''; ?>">
                <label>Passcode </label>
                <input type="text" name="verify" class="form-control"  value="<?php echo $verify; ?>">
                <span class="help-block"><?php echo $verify_err; ?></span>
            </div>  
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Confirm">
            </div>
            </form>

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