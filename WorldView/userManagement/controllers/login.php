<?php
    // Database connection
    include('./config/db.php');

    global $wrongPwdErr, $accountNotExistErr, $emailPwdErr, $verificationRequiredErr, $email_empty_err, $pass_empty_err;

    if(isset($_COOKIE["vwgid"]) && isset($_COOKIE["vwgrt"]) && !isset($_SESSION['loggedin'])){
        
        $id             = mysqli_real_escape_string($connection, $_COOKIE["vwgid"]);
        $rememberToken  = mysqli_real_escape_string($connection, $_COOKIE["vwgrt"]);
       
        // Query if id exists in remember db
        $sql = "SELECT * FROM remember WHERE id = '{$id}' ";
        $query = mysqli_query($connection, $sql);
        $rowCount = mysqli_num_rows($query);
        // If query fails, show the reason, where?
        if(!$query){
           die("SQL query failed, bad connection with cookie: " . mysqli_error($connection));
        }

        if(!empty($id) && !empty($rememberToken)){

            $hashToken = "";
            // Check if id exist
            if($rowCount <= 0) {
                header("Location: ./controllers/logout.php");
            }else{
                $row = mysqli_fetch_array($query);
                $hashToken = $row['staytoken'];
            }
            if($rememberToken === $hashToken) {    //Check if tokens match
               
                $sql = "SELECT * FROM users WHERE id = '{$id}' ";
                $query = mysqli_query($connection, $sql);
                $rowCount = mysqli_num_rows($query);
                
                // Fetch user data and store in php session
                
                while($row = mysqli_fetch_array($query)) {
                    $id            = $row['id'];
                    $firstname     = $row['firstname'];
                    $lastname      = $row['lastname'];
                    $email         = $row['email'];
                    $mobilenumber  = $row['mobilenumber'];
                    $pass_word     = $row['password'];
                    $token         = $row['token'];
                    $is_active     = $row['is_active'];
                }

                // Allow only verified user
                if($is_active == '1') {

                        $_SESSION['loggedin'] = 1;
                        $_SESSION['id'] = $id;
                        $_SESSION['firstname'] = $firstname;
                        $_SESSION['lastname'] = $lastname;
                        $_SESSION['email'] = $email;
                        $_SESSION['mobilenumber'] = $mobilenumber;
                        $_SESSION['token'] = $token;
                        $_SESSION['dbtable'] = "cust".$id;

                        if(isset($_SESSION['next_page'])){
                            $next = $_SESSION['next_page'];
                            unset($_SESSION['next_page']);
                            header("Location: $next");
                        }else{header("Location: ../profile.php");}
                } else {
                    header("Location: ./controllers/logout.php");
                }
            } else {
                header("Location: ./controllers/logout.php");
            }
        }
    }

    if(isset($_POST['login'])) {
        $email_signin        = $_POST['email'];
        $password_signin     = $_POST['password'];

        // clean data 
        $user_email = filter_var($email_signin, FILTER_SANITIZE_EMAIL);
        $pswd = mysqli_real_escape_string($connection, $password_signin);

        // Query if email exists in db
        $sql = "SELECT * From users WHERE email = '{$email_signin}' ";
        $query = mysqli_query($connection, $sql);
        $rowCount = mysqli_num_rows($query);

        // If query fails, show the reason 
        if(!$query){
           die("SQL query failed: " . mysqli_error($connection));
        }

        if(!empty($email_signin) && !empty($password_signin)){
            if(!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/", $pswd)) {
                $wrongPwdErr = '<div class="alert alert-danger">
                        Password should be between 8 to 20 charcters long, contains atleast one special chacter, lowercase, uppercase and a digit.
                    </div>';
            }
            // Check if email exist
            if($rowCount <= 0) {
                $accountNotExistErr = '<div class="alert alert-danger">
                        User not found, please check if your Email is correct.
                    </div>';
            } else {
                // Fetch user data and store in php session
                
                while($row = mysqli_fetch_array($query)) {
                    $id            = $row['id'];
                    $firstname     = $row['firstname'];
                    $lastname      = $row['lastname'];
                    $email         = $row['email'];
                    $mobilenumber  = $row['mobilenumber'];
                    $pass_word     = $row['password'];
                    $token         = $row['token'];
                    $is_active     = $row['is_active'];
                }

                // Verify password
                $password = password_verify($password_signin, $pass_word);

                // Allow only verified user
                if($is_active == '1') {
                    if($email_signin == $email && $password_signin == $password) {

                        $_SESSION['loggedin'] = 1;
                        $_SESSION['id'] = $id;
                        $_SESSION['firstname'] = $firstname;
                        $_SESSION['lastname'] = $lastname;
                        $_SESSION['email'] = $email;
                        $_SESSION['mobilenumber'] = $mobilenumber;
                        $_SESSION['token'] = $token;
                        $_SESSION['dbtable'] = "cust".$id;
                        
                        //Cookie setup
                        if(isset($_POST['stay'])){
                            $stayToken=md5(rand().time());
                            //$dbstayToken = password_hash($token, PASSWORD_BCRYPT);
                            $sql = "INSERT INTO remember VALUES ({$id}, '{$stayToken}')";
                            $sqlQuery = mysqli_query($connection, $sql);
                            
                            setcookie("vwgid", $id, time()+(60*60*24*7), '/');
                            setcookie("vwgrt", $stayToken, time()+(60*60*24*7), '/');
                        } else {setcookie("vwgid", "", 1, '/');setcookie("vwgrt", "", 1, '/');}
                        
                        if(isset($_SESSION['next_page'])){
                            $next = $_SESSION['next_page'];
                            unset($_SESSION['next_page']);
                            header("Location: $next");
                        }else{header("Location: ../profile.php");}
                        
                    } else {
                        $emailPwdErr = '<div class="alert alert-danger">
                                Email or Password wrong.
                            </div>';
                    }
                } else {
                    $verificationRequiredErr = '<div class="alert alert-danger">
                            Email verification needed for login. Change password if original link is not usable.
                        </div>';
                }

            }

        } else {
            if(empty($email_signin)){
                $email_empty_err = "<div class='alert alert-danger email_alert'>
                            Inser Email.
                    </div>";
            }
            
            if(empty($password_signin)){
                $pass_empty_err = "<div class='alert alert-danger email_alert'>
                            Insert Password.
                        </div>";
            }            
        }

    }

?>    