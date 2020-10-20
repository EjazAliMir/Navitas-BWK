<?php
// Initialize the session
include_once '../include/class.meeting.php'; 
session_destroy();
include_once 'include/session.php';
// Include config file
require_once "config.php";
$mail = new Meeting();

// Define variables and initialize with empty values
$username = $email = $meeting = "";
$username_err = $email_err = $meeting_err ="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter your E-mail.";
    } else{
        $email_res = trim($_POST["email"]);
    }

    // Check if email is empty
    if(empty(trim($_POST["meeting"]))){
        $meeting_err = "Please enter a valid Meeting ID.";
    } else{
        $meeting_res = trim($_POST["meeting"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($email_err) && empty($meeting_err) ){
        // Prepare a select statement
        $sql = "SELECT id,username,email FROM visitors WHERE username = ?";
        //Getting Meeting ID :
        $sql2 = "SELECT id FROM meetings WHERE id='$meeting_res'";
        $result_id =  $db->query($sql2);
        $meeting_id = $result_id->fetch_row();

        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                // Check if username exists, if yes then verify email
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $email);
                    if(mysqli_stmt_fetch($stmt)){
                        if(($email_res == $email) && ($meeting_res == $meeting_id[0]) ){
                            // email is correct, so start a new session
                            session_start();
                            // Store data in session variables
                            $_SESSION["id"] = $id;
                            // $_SESSION["loggedin"] = true;
                            $_SESSION["username"] = $username;  
                            $_SESSION["email"] = $email;  
                            $_SESSION["mid"]  =   $meeting_res;                        
                            $genpasscode = mt_rand(100000, 999999);
                            $_SESSION["passcode"] = $genpasscode;
                            $mail->sendEmail($genpasscode,$username,$email);
                            // Redirect user to welcome page
                            header("location: confirm.php");
                        } elseif($meeting_res != $meeting_id[0]){
                            $meeting_err = "Invalid meeting ID.";
                        } else {
                            // Display an error message if email is not valid
                            $email_err = "The email you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No visitor found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($db);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{ width: 350px; padding: 20px; }
        .container {
        position: relative;
        max-width: 500px; /* Maximum width */
        margin: 0 auto; /* Center it */
        color: #ffffff
        }
        body {
    font: 18px sans-serif; 
    background-color: #6D1950;
    filter: progid: DXImageTransform.Microsoft.gradient(gradientType=1, startColorstr='#6D1950', endColorstr='#7D0614');
    background-image: url(//img.alicdn.com/tps/TB1d.u8MXXXXXXuXFXXXXXXXXXX-1900-790.jpg);
    background-size: 100%;
    background-image: -webkit-gradient(linear, 0 0, 100% 100%, color-stop(0, #003073), color-stop(100%, #7D0614));
    background-image: -webkit-linear-gradient(135deg, #6D1950, #7D0614);
    background-image: -moz-linear-gradient(45deg, #6D1950, #7D0614);
    background-image: -ms-linear-gradient(45deg, #6D1950 0, #7D0614 100%);
    background-image: -o-linear-gradient(45deg, #6D1950, #7D0614);
    background-image: linear-gradient(135deg, #6D1950, #7D0614);
    text-align: center;
    margin: 0px;
    overflow: hidden;
}
    </style>
</head>
<body>
<div class="container">
        <div class="row">
          <div class="col-md-6 offset-md-6">
            <div class="header-text caption">
            <div class="container">
        <h1>Visitors</h1>
        <br><br>
        <p>Please fill in your Meeting credentials info.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">  
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>E-mail </label>
                <input type="text" name="email" class="form-control">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?> ">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>  
            <div class="form-group <?php echo (!empty($meeting_err)) ? 'has-error' : ''; ?>">
                <label>Meeting ID</label>
                <input type="text" name="meeting" class="form-control" value="<?php echo $meeting; ?>">
                <span class="help-block"><?php echo $meeting_err; ?></span>
            </div>  
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
        </form>
    </div>   
               </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    <script src="../images/assets/js/infinity2.js"></script>
 
</body>
</html>