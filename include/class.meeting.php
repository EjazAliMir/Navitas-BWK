<?php
    //include "../config.php";
    include_once "../member/include/session.php";
    require("PHPMailer.php");
    require("SMTP.php");

class meeting
        {

        public $link;
        public function __construct()
        {
            $this->link=new mysqli('localhost','root','','meeting');
            if(mysqli_connect_errno())
            {
                echo "Error: Could not connect to database.";
                exit;
            }
        }
    public function getRoomName($room_id){
        $sql_temp="SELECT name FROM rooms WHERE id='$room_id'";
        $result_temp = mysqli_query($this->link,$sql_temp);
        $name = $result_temp->fetch_row();
        return $name[0];
    }

    public function sendEmail($passcode ,$user , $email) {
           $mail = new PHPMailer\PHPMailer\PHPMailer();
           $mail->IsSMTP(); // enable SMTP
       
        //    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
           $mail->SMTPAuth = true; // authentication enabled
           $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
           $mail->Host = "smtp.gmail.com";
           $mail->Port = 465; // or 587
           $mail->IsHTML(true);
           $mail->Username = "navitas.system@gmail.com";
           $mail->Password = "navitas1234";
           $mail->SetFrom("navitas.system@gmail.com");
           $mail->Subject = "Navitas verification";
        //    $mail->Body = "Your Passcode is : ".$passcode ;
           $mail->AddAddress($email);
           $mail->isHTML(TRUE);
           $mail->Body = '<html> <br><img src="../images/navitas.png"> Hello '.$user. '<br> confirm your identity. <br> Your Passcode is : '.$passcode.' <br> Please Enter this passcode  into Navitas Visitor webpage.</html>';
           $mail->AltBody = 'Thanks for visiting us !. <br> Contact us for more information.';
           // add attachment
           if(!$mail->Send()) {
               echo "Mailer Error: " . $mail->ErrorInfo;
           } else {
               echo "Message has been sent";
           }
    }

    public function notifyMember($visitor_name , $organizer_name, $organizer_email, $meeting_id) {
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->IsSMTP(); // enable SMTP
    
        // $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; // or 587
        $mail->Username = "navitas.system@gmail.com";
        $mail->Password = "navitas1234";
        $mail->SetFrom("navitas.system@gmail.com");
        $mail->Subject = "Navitas verification";
     //    $mail->Body = "Your Passcode is : ".$passcode ;
        $mail->AddAddress($organizer_email);
        $mail->isHTML(TRUE);
        $mail->Body = '<html> <br><img src="../images/navitas.png"> Hello '.$organizer_name. '<br> We would like to inform you that Visitor '.$visitor_name.' Has requested information about your meeting N° '.$meeting_id.'</html>';
        $mail->AltBody = '<br> Contact us for more information.';
        // add attachment
        if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message has been sent";
        }
 }
    public function meetingNow($user, $checkin, $checkout ,$roomname)
        {                
        $sql_room="SELECT id FROM rooms WHERE name='$roomname'";
        // $result_room = $this->$link->query($sql_room);
        $result_room = mysqli_query($this->link,$sql_room);
        $room_id = $result_room->fetch_row();
        $sql_user = "SELECT id FROM members WHERE username='$user'";
        $result_user = mysqli_query($this->link,$sql_user);
        $user_id = $result_user->fetch_row();

        $passcode = mt_rand(100000, 999999);

        $sql_meeting="SELECT * FROM meetings WHERE room_id='$room_id[0]' AND ('$checkin' BETWEEN checkin AND checkout OR '$checkout' BETWEEN checkin AND checkout)";
        $check= mysqli_query($this->link,$sql_meeting)  or die(mysqli_connect_errno()."Data herecannot inserted");
                if(mysqli_num_rows($check) == 0) 
                    {
                        $sql2= "INSERT INTO `meetings` (`id`, `room_id`, `user_id`, `checkin`, `checkout`, `passcode`) VALUES (NULL, '$room_id[0]', '$user_id[0]', '$checkin', '$checkout', '$passcode')";
                        $send=mysqli_query($this->link,$sql2);
                        if($send)
                        {
                            $result="Your Meeting has been booked! Passcode : ".$passcode ;
                        }
                        else
                        {
                            $result="Sorry, Internal Error";
                        }
                    }
                    else                       
                    {
                        $result = "A Meeting already scheduled in that time.";
                    }
                    
                    
                
                    return $result;
                

            }
        
            
}
