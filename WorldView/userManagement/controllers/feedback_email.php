<?php
   
    // Database connection
    include('config/db.php');
    //PHPMaileria
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // Error & success messages
    global $emailEmptyErr, $textEmptyErr, $email_verify_err;
    
    // Set empty form vars for validation mapping
    $_email = $_text = "";

    if(isset($_POST["feedback"])) {
        $email = mysqli_real_escape_string($connection, $_POST["email"]);
        $text = mysqli_real_escape_string($connection, $_POST["feedbackText"]);
        $topic = mysqli_real_escape_string($connection, $_POST["topic"]);

        // check if feedback is from current user
        $email_check_query = mysqli_query($connection, "SELECT * FROM users WHERE email = '{$email}' ");
        $emailRowCount = mysqli_num_rows($email_check_query);
        $isUser  = $emailRowCount>0 ? "Sender is user" : "Sender is not registered";

        // Verify if form values are not empty
        if(!empty($email) && !empty($text)){
            
            $subject = $topic;
            $msg = $email."<br>".$text;
            $emailFrom = $email;
            $emailFromName = "Worldview360 user";
            $emailToName = "Admin";
            $mail = new PHPMailer;
            $mail->isSMTP(); 
            $mail->CharSet = 'UTF-8';
            $mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
            $mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
            $mail->Port = 587; // TLS only
            $mail->SMTPSecure = 'tls'; // ssl is depracated
            $mail->SMTPAuth = true;
            $mail->Username = $smtpUsername;
            $mail->Password = $smtpPassword;
            $mail->setFrom($emailFrom, $emailFromName);
            $mail->addAddress($smtpUsername, $emailToName);
            $mail->Subject = $subject;
            $mail->msgHTML($msg); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
            $mail->AltBody = 'HTML messaging not supported';    
            $mail->send();

            header("Location: ./feedback.php?a=thanks");
                                       
        } else {
            if(empty($email)){
                $emailEmptyErr = '<div class="alert alert-danger">
                    Please give email.
                </div>';
            }
            if(empty($text)){
                $mobileEmptyErr = '<div class="alert alert-danger">
                    Please fill your message.
                </div>';
            }       
        }
    }
?>