<?php
//
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST['btn_submit'])=='Submit')
{

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
        //Load Composer's autoloader
    //require 'vendor/autoload.php';

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP(); 
  // $mail->SMTPDebug = true;   
    //$mail->SMTPSecure = 'ssl';
              $mail->SMTPSecure = 'tls';                                        //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'piyushagarwalplay@gmail.com';                     //SMTP username
    $mail->Password   = 'sezjnculoolkjdjk';                               //SMTP password
    //$mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('piyushagarwalplay@gmail.com');
    $mail->addAddress('piyushagarwalplay@gmail.com');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $content='';
    $content.='<table><tr><td>Name &nbsp;</td><td>'.$_POST['username'].'</td></tr>';
    $content.='<tr><td>Email &nbsp;</td><td>'.$_POST['email'].'</td></tr>';
    $content.='<tr><td>DOB &nbsp;</td><td>'.$_POST['dob'].'</td></tr>';
    $content.='<tr><td>Resume &nbsp;</td><td>'.$_POST['file'].'</td></tr>';
    $content.='</table>';
    $mail->Body    = $content;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $m=$mail->send();
    if($m){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Sent Successfully</strong> Your message has been sent successfully
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }
    else
    echo "failed";
} catch (Exception $e) {
    echo '<div class="alert alert-danger" role="alert">
    Message could not be sent. Mailer Error: {$mail->ErrorInfo}; Please Contact us through mail: <a href="mailto:piyushagarwalplay@gmail.com">piyushagarwalplay@gmail.com</a>
  </div>';
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        h1{
            text-align: center;
        }
        form{
            text-align: center;
            margin-top: 3rem;
            border: solid 2px;
            margin-left:24rem;
            margin-right:24rem;
            padding:2rem;
            border-radius:12px;
            background-color:white;
            
        }
        .alert-success{
            background-color:green;
            padding:1rem;
            color:white;
        }
        .para{
            text-align:center;
            margin-top:10rem;
            font-size:25px;
            }
    </style>
</head>
<body style="background-color:whitesmoke;">
    <h1>Form</h1>
    
    <div class="form">
        <form method="post">
            <label>Name:</label>
            <input type="text" name="username" id="user" value="" placeholder="Enter your name:">
            <br><br>
            <label>Email</label>
            <input type="text" name="email" id="emails" value="" placeholder="Enter your mail Id:">
        
            <br> <br>
            <label>Dob</label>
            <input type="date" name="dob" id="mobiles" value="">

            <br> <br>
            <label>Upload Resume</label>
            <input type="file" name="file" id="message" value="">

            <br> <br>
            <input type="submit" class="btn btn-primary" name="btn_submit" onclick="return checknull();" value="Submit">

            <input type="reset">
        </form>
    </div>

        <div>
        <p class="para"> Form data sent on mail Id using PHP Mail SMTP </p>
        </div>

</body>
</html>

<script>

    function checknull() {
        //alert("sdfgsdf");
        var mess = "";
        if (document.getElementById('user').value == '') {
            //alert("sdfsdf");
            mess += "Enter name \n";
            //alert()
        }
        if (document.getElementById('emails').value == '') {
            mess += "Email \n";
        }
        if (document.getElementById('mobiles').value == '') {
            mess += "Mobile \n";
        }
        if (mess) {
            alert("Required \n" + mess);
            return false;
        }
        else {
            return true;
        }
    }
</script>