<?php
   
    // Database connection
    include('config/db.php');
    include('D:/home/site/login.php');
    // Error & success messages
    global $success_msg, $email__notfound, $mobile__notfound, $f_NameErr, $l_NameErr, $_emailErr, $_mobileErr, $_passwordErr;
    global $fNameEmptyErr, $lNameEmptyErr, $emailEmptyErr, $mobileEmptyErr, $passwordEmptyErr, $email_verify_err, $email_verify_success;
    
    // Set empty form vars for validation mapping
    $_email = $_password = "";

    if(isset($_POST["vaihto"])) {
        $email       = $_POST["email"];
        $password    = $_POST["password"];
        $password2    = $_POST["password2"];
        
        // check if email exist
        $email_check_query = mysqli_query($connection, "SELECT * FROM users WHERE email = '{$email}' AND token = '{$token}'");
        $emailRowCount = mysqli_num_rows($email_check_query);

        // PHP validation
        // Verify if form values are not empty
        if(!empty($email) && !empty($password) && $password===$password2){
            
            // check if user email does not exist
            if($emailRowCount < 0) {
                $email_notfound = '
                    <div class="alert alert-danger" role="alert">
                        Sähköpostia ei löydetty!
                    </div>
                ';
            } else {
                // clean the form data before sending to database
                $_email = mysqli_real_escape_string($connection, $email);
                $_password = mysqli_real_escape_string($connection, $password);

                // Store the data in db, if all the preg_match condition met
                if((preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/", $_password))){
                    // Password hash
                    $password_hash = password_hash($_password, PASSWORD_BCRYPT);

                    // Query
                    $sql = "UPDATE users SET password = '{$password_hash}' WHERE email = '{$email}'";
                    
                    // Create mysql query
                    $sqlQuery = mysqli_query($connection, $sql);
                    
                    if(!$sqlQuery){
                        die("MySQL query failed!" . mysqli_error($connection));
                    }
                    header("Location: ../kirjaudu.php?a=kiitos");
                }else{$email_verify_err = '<div class="alert alert-danger">Could not update db!</div>';}
            }
        } else {
            if(empty($email)){
                $emailEmptyErr = '<div class="alert alert-danger">
                    Email can not be blank.
                </div>';
            }
            if(empty($password)){
                $passwordEmptyErr = '<div class="alert alert-danger">
                    Password can not be blank.
                </div>';
            }     
            if($password!==$password2){
                $passwordEmptyErr = '<div class="alert alert-danger">
                    Password has to be same.
                </div>';
            }                  
        }
    }
?>