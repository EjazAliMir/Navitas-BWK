<?php
// Initialize the session 
// Include config file
require_once "config.php";

$roomNumber="" ;
$roomNumber_err= "";
$valid= "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["roomNumber"]))){
        $roomNumber_err = "Please enter a valid Room Number.";
    } else{
        $roomNumber = trim($_POST["roomNumber"]);
    }
    // Validate credentials
    if(empty($roomNumber_err) ){
        $sql = "SELECT * FROM `rooms` WHERE number='$roomNumber'";
        $result = $link->query($sql);
        $valid = $result->num_rows > 0;
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
    <script> function goBack() { window.history.back(); } </script> 
    <!-- <script src="../include/easystar-0.4.3.min.js"></script>
    <script src="../include/easystar-0.4.3.js"></script>
    <script src="../include/phaser.min.js"></script>
    <script src="../include/phaser-plugin-isometric.min.js"></script>
    <script> function left() { 
         var easystar = new EasyStar.js();
                    var grid = [[0,0,1,0,0],
                    [0,0,1,0,0],
                    [0,0,1,0,0],
                    [0,0,1,0,0],
                    [0,0,0,0,0]];
                    easystar.setGrid(grid);
                    easystar.setAcceptableTiles([0]);
                    easystar.enableDiagonals();
                    easystar.findPath(0, 0, 4, 0, function( path ) {
                        if (path === null) {
                            alert("Path was not found.");
                        } else {
                            alert("Path was found. The first Point is " + path[0].x + " " + path[0].y);
                        }
                    });
                    easystar.setIterationsPerCalculation(1000);
                    easystar.calculate();
                    
     } </script>  -->

    <!-- <script src="../include/main.js"></script> -->

    <title>Search Room Number </title>
   <style type="text/css">
        body{ font: 14px sans-serif; background-image: url("../images/dark4.jpeg");  background-attachment: fixed; background-size: 100% 100%;  background-repeat: no-repeat; color: white }
        .wrapper{ width: 350px; padding: 20px; }
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
    </style>
    <link rel="stylesheet" href="../images/assets/css/infinty.css">

</head>

<body>
    <div class="container demo">
      <div >
    <div class="container demo">
   <div class="content">
      <div id="large-header" class="large-header">
         <canvas id="demo-canvas"></canvas>
         <h1 class="main-title"><span class="thin">Search</span> Room</h1>
      </div>
   </div>
</div>
            <hr>  
            <p align="right"> <button class="button" onclick="goBack()">Go Back</button> </p>
            <script type="text/javascript"> left();</script>
                <div ><br>
                <?php 
                if( $valid > 0 ){
                    $address = $result->fetch_assoc();
                    $depa = str_replace(' ', '', $address["department"]);
                    echo "<p font-size:180%; > Room N° ".$address["number"]."<br>";
                    echo "Address : ".$depa."</p>";
                    #var easystar = new EasyStar.js();
                    echo '<iframe width="600" height="620" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://use.mazemap.com/embed.html#v=1&config=unimelb&zlevel=2&center=144.963007,-37.799545&zoom=19.3&campuses=unimelb&campusid=200&desttype=poi&dest='.$address["address"].'&starttype=poi&start=661296&utm_medium=iframe" style="border: 1px solid grey" allow="geolocation"></iframe><br/><small><a href="https://www.mazemap.com/">Map by MazeMap</a></small>';
                } elseif ($roomNumber == ""){
                } else {
                    echo "<p style='color:red; font-size:160%;' > Room doesn't Exist  </p>";
                }
                ?>   
                <br><br>
                <h3> Please enter Room Number : </h3>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">  
                <div class="wrapper" class="form-group  <?php echo (!empty($roomNumber_err)) ? 'has-error' : ''; ?>">
                <label>Number </label>
                <input type="text" name="roomNumber" class="form-control"  value="<?php echo $roomNumber; ?>">
                <span class="help-block"><?php echo $roomNumber_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Confirm">
            </div>
            </form>

            </div>
               <br>
        </div>
    </div>
            </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
</body>

</html>