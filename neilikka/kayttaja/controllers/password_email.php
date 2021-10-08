<?php
   
    // Database connection
    include('config/db.php');
    include('../login.php');
    //PHPMaileria
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // Error & success messages
    global $success_msg, $email__notfound, $mobile__notfound, $f_NameErr, $l_NameErr, $_emailErr, $_mobileErr, $_passwordErr;
    global $fNameEmptyErr, $lNameEmptyErr, $emailEmptyErr, $mobileEmptyErr, $passwordEmptyErr, $email_verify_err, $email_verify_success;
    
    // Set empty form vars for validation mapping
    $_email = $_mobile_number = "";

    if(isset($_POST["salasana"])) {
        $email         = $_POST["email"];
        $mobilenumber  = $_POST["mobilenumber"];

        // check if email exist
        $email_check_query = mysqli_query($connection, "SELECT * FROM users WHERE email = '{$email}' ");
        $emailRowCount = mysqli_num_rows($email_check_query);
        $phone_check_query = mysqli_query($connection, "SELECT * FROM users WHERE mobilenumber = '{$mobilenumber}' ");
        $phoneRowCount = mysqli_num_rows($phone_check_query);
        // PHP validation
        // Verify if form values are not empty
        if(!empty($email) && !empty($mobilenumber)){
            
            // check if user email does not exist
            if($emailRowCount < 0) {
                $email_notfound = '
                    <div class="alert alert-danger" role="alert">
                        Sähköpostia ei löydetty!
                    </div>
                ';
            } elseif ($phoneRowCount < 0) {
                $mobile_notfound = '
                    <div class="alert alert-danger" role="alert">
                        Puhelinnumeroa ei tunnistettu!
                    </div>
                ';
            } else {
                // clean the form data before sending to database
                $email = mysqli_real_escape_string($connection, $email);
                $mobile_number = mysqli_real_escape_string($connection, $mobilenumber);

                    // Fetch old token
                    $tokenSearch = mysqli_query($connection, "SELECT token FROM users WHERE email = '{$email}' ");
                    $tokenRow = $tokenSearch->fetch_assoc();
                    $rowCount = mysqli_num_rows($tokenSearch);
                    if(!$tokenSearch){
                        die("MySQL query failed!" . mysqli_error($connection));
                    } 
                    $token = $tokenRow['token'];
                    
                    //PHPMailerin käyttö
                    // Send verification email
                    if($rowCount>0) {
                        $subject = "Jatka vaihtamaan salasanaasi!";
                        $msg = 'Click on the activation link to verify your email. <br><a href="https://tommii.azurewebsites.net/neilikka/kayttaja//password_change_form.php?token='.$token.'"> Klikkaa salasananvaihtoon</a>';
                        $emailFrom = "verifiointisivu@email.com";
                        $emailFromName = "Ohjelmointikurssi";
                        $emailToName = "Salasanan palautuspyyntö";
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
                        $mail->addAddress($email, $emailToName);
                        $mail->Subject = $subject;
                        $mail->msgHTML($msg); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
                        $mail->AltBody = 'HTML messaging not supported';    
                        if(!$mail->send()){
                            $email_verify_err = '<div class="alert alert-danger">
                                    Sähköpostia ei voitu lähettää!
                            </div>';
                        } else {
                            header("Location: ./change_request.php?a=kiitos");
                        }
                    }                              
            }
        } else {
            if(empty($email)){
                $emailEmptyErr = '<div class="alert alert-danger">
                    Email can not be blank.
                </div>';
            }
            if(empty($mobilenumber)){
                $mobileEmptyErr = '<div class="alert alert-danger">
                    Mobile number can not be blank.
                </div>';
            }       
        }
    }
?>