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
    global $success_msg, $email_exist, $f_NameErr, $l_NameErr, $_emailErr, $_mobileErr, $_passwordErr;
    global $fNameEmptyErr, $lNameEmptyErr, $emailEmptyErr, $mobileEmptyErr, $passwordEmptyErr, $email_verify_err;
    
    // Set empty form vars for validation mapping
    $_first_name = $_last_name = $_email = $_mobile_number = $_password = "";

    if(isset($_POST["submit"])) {
        $firstname     = $_POST["firstname"];
        $lastname      = $_POST["lastname"];
        $email         = $_POST["email"];
        $mobilenumber  = $_POST["mobilenumber"];
        $password      = $_POST["password"];
        $password2      = $_POST["password2"];

        $_email = mysqli_real_escape_string($connection, $email);
        // check if email already exist. Vedetään escape stringi ennen syöttöä
        $email_check_query = mysqli_query($connection, "SELECT * FROM users WHERE email = '{$_email}' ");
        $rowCount = mysqli_num_rows($email_check_query);


        // PHP validation
        // Verify if form values are not empty
        if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($mobilenumber) && !empty($password) && $password === $password2){
            
            // check if user email already exist
            if($rowCount > 0) {
                $email_exist = '
                    <div class="alert alert-danger" role="alert">
                        User with email already exist!
                    </div>
                ';
            } else {
                // clean the form data before sending to database
                $_first_name = mysqli_real_escape_string($connection, $firstname);
                $_last_name = mysqli_real_escape_string($connection, $lastname);
                $_mobile_number = mysqli_real_escape_string($connection, $mobilenumber);
                $_password = mysqli_real_escape_string($connection, $password);
                $_password2 = mysqli_real_escape_string($connection, $password2);
                // perform validation
                if(!preg_match("/^[a-zA-Z öäåÖÄÅ]*$/", $_first_name)) {
                    $f_NameErr = '<div class="alert alert-danger">
                            Only letters and white space allowed.
                        </div>';
                }
                if(!preg_match("/^[a-zA-Z öäåÖÄÅ]*$/", $_last_name)) {
                    $l_NameErr = '<div class="alert alert-danger">
                            Only letters and white space allowed.
                        </div>';
                }
                if(!filter_var($_email, FILTER_VALIDATE_EMAIL)) {
                    $_emailErr = '<div class="alert alert-danger">
                            Email format is invalid.
                        </div>';
                }
                if(!preg_match("/^[0-9]{10}+$/", $_mobile_number)) {
                    $_mobileErr = '<div class="alert alert-danger">
                            Only 10-digit mobile numbers allowed.
                        </div>';
                }
                if(!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/", $_password)) {
                    $_passwordErr = '<div class="alert alert-danger">
                             Password should be between 8 to 20 charcters long, contains atleast one special chacter, lowercase, uppercase and a digit.
                        </div>';
                }
                
                // Store the data in db, if all the preg_match condition met
                if((preg_match("/^[a-zA-Z öäåÖÄÅ]*$/", $_first_name)) && (preg_match("/^[a-zA-Z öäåÖÄÅ]*$/", $_last_name)) &&
                 (filter_var($_email, FILTER_VALIDATE_EMAIL)) && (preg_match("/^[0-9]{10}+$/", $_mobile_number)) && 
                 (preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/", $_password)) && ($_password === $_password2)){

                    // Generate random activation token
                    $token = md5(rand().time());
                    // Password hash
                    $password_hash = password_hash($password, PASSWORD_BCRYPT);

                    // Query
                    $sql = "INSERT INTO users (firstname, lastname, email, mobilenumber, password, token, is_active,
                    date_time) VALUES ('{$firstname}', '{$lastname}', '{$email}', '{$mobilenumber}', '{$password_hash}', 
                    '{$token}', '0', now())";
                    
                    // Create mysql query
                    $sqlQuery = mysqli_query($connection, $sql);
                    
                    if(!$sqlQuery){
                        die("MySQL query failed!" . mysqli_error($connection));
                    } 

                    //Create project table for the user
                    $idQuery= "SELECT id FROM users WHERE email = '$email'";
                    $idFind = $connection->query($idQuery);
                    if(!$idFind){
                        die("MySQL query failed!" . mysqli_error($connection));
                    };
                    $idRow=$idFind->fetch_assoc();
                    $name="cust".$idRow['id'];
                    $tableQuery= "CREATE TABLE $name (
                                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                link VARCHAR(300) NOT NULL,
                                project VARCHAR(50) DEFAULT 'Project 1',
                                projectposition VARCHAR(100)
                                )";
                    $table = mysqli_query($connection, $tableQuery);
                    
                    if(!$table){
                        die("MySQL query failed!" . mysqli_error($connection));
                    };

                    //PHPMailerin käyttö
                    // Send verification email VAIHDA TÄMÄ https://tommii.azurewebsites.net/WorldView/userManagement/user_verification.php
                    if($sqlQuery) {
                        $subject = "Please Verify Email Address!";
                        $msg = 'Click on the activation link to verify your email. <br><a href="https://tommii.azurewebsites.net/WorldView/userManagement/user_verification.php?token='.$token.'"> Click here to verify email</a>';
                        $emailFrom = "WorldView@email.com";
                        $emailFromName = "Polaris";
                        $emailToName = $firstname . ' ' . $lastname;
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
                                    Verification email coud not be sent!
                            </div>';
                        } else {
                            header("Location: ./signup.php?a=thanks");
                        }
                    }               

                }else{$email_verify_err = '<div class="alert alert-danger">Could not update db!</div>';}
            }
        } else {
            if(empty($firstname)){
                $fNameEmptyErr = '<div class="alert alert-danger">
                    First name can not be blank.
                </div>';
            }
            if(empty($lastname)){
                $lNameEmptyErr = '<div class="alert alert-danger">
                    Last name can not be blank.
                </div>';
            }
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
            if(empty($password)){
                $passwordEmptyErr = '<div class="alert alert-danger">
                    Password can not be blank.
                </div>';
            }
            if($password !== $password2) {
                $_passwordErr = '<div class="alert alert-danger">
                         Passwords needs to be same.
                    </div>';
            }       
        }
    }
?>
