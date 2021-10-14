<?php
   
    // Database connection
    include('kayttaja/config/db.php');

    global $wrongPwdErr, $accountNotExistErr, $emailPwdErr, $verificationRequiredErr, $email_empty_err, $pass_empty_err;
    if(isset($_COOKIE["neilikkamail"]) && isset($_COOKIE["neilikkapass"]) && !isset($_SESSION['loggedin'])){
        
        $email_signin        = $_COOKIE["neilikkamail"];
        $password_signin     = $_COOKIE["neilikkapass"];

        // clean data 
        $user_email = filter_var($email_signin, FILTER_SANITIZE_EMAIL);
        $pswd = mysqli_real_escape_string($connection, $password_signin);

        // Query if email exists in db
        $sql = "SELECT * From users WHERE email = '{$email_signin}' ";
        $query = mysqli_query($connection, $sql);
        $rowCount = mysqli_num_rows($query);

        // If query fails, show the reason 
        if(!$query){
           die("SQL query failed, cookie huono: " . mysqli_error($connection));
        }

        if(!empty($email_signin) && !empty($password_signin)){
            // Check if email exist
            if($rowCount <= 0) {
                $accountNotExistErr = '<div class="alert alert-danger">
                        Cookiessa olevaa kyttäjää ei löydetty.
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

                // Allow only verified user
                if($is_active == '1') {
                    if($email_signin == $email && $password_signin == $pass_word) {

                        $_SESSION['loggedin'] = 1;
                        $_SESSION['id'] = $id;
                        $_SESSION['firstname'] = $firstname;
                        $_SESSION['lastname'] = $lastname;
                        $_SESSION['email'] = $email;
                        $_SESSION['mobilenumber'] = $mobilenumber;
                        $_SESSION['token'] = $token;



                       header("Location: ./kirjaudu.php");
                    } else {
                        $emailPwdErr = '<div class="alert alert-danger">
                                Cookiessa oleva sähköposti tai salasana väärin.
                            </div>';
                    }
                } else {
                    $verificationRequiredErr = '<div class="alert alert-danger">
                            Cookiessa oleva käyttäjä ei ole sähköpostivahvistettu.
                        </div>';
                }

            }

        } else {
            setcookie("neilikkamail", "", time()-3600, '/'); setcookie("neilikkapass", "", time()-3600, '/', NULL, NULL, TRUE);
            header("Location: ./kirjaudu.php");
        }

    }


    if(isset($_POST['kirjaudu'])) {
        $email_signin        = $_POST['tunnus'];
        $password_signin     = $_POST['salasana'];

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
            if(!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/", $pswd)) {
                $wrongPwdErr = '<div class="alert alert-danger">
                        Password should be between 6 to 20 charcters long, contains atleast one special chacter, lowercase, uppercase and a digit.
                    </div>';
            }
            // Check if email exist
            if($rowCount <= 0) {
                $accountNotExistErr = '<div class="alert alert-danger">
                        Käyttäjää ei löydetty.
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

                        //Cookien setuppaaminen
                        if(isset($_POST['pysy']) && $_POST['pysy'] === "pysy"){
                            setcookie("neilikkamail", $email, time()+3600, '/');
                            setcookie("neilikkapass", $pass_word, time()+3600, '/');
                        } else {setcookie("neilikkamail", "", time()-3600, '/'); setcookie("neilikkapass", "", time()-3600, '/');}
                        
                        if(isset($_SESSION['next_page'])){
                            $minne = $_SESSION['next_page'];
                            unset($_SESSION['next_page']);
                            header("Location: $minne");
                        }else{header("Location: ./kirjaudu.php");}
                        
                    } else {
                        $emailPwdErr = '<div class="alert alert-danger">
                                Sähköposti tai salasana väärin.
                            </div>';
                    }
                } else {
                    $verificationRequiredErr = '<div class="alert alert-danger">
                            Sähköpostivahvistus vaaditaan kirjautumiseen.
                        </div>';
                }

            }

        } else {
            if(empty($email_signin)){
                $email_empty_err = "<div class='alert alert-danger email_alert'>
                            Syötä sähköposti.
                    </div>";
            }
            
            if(empty($password_signin)){
                $pass_empty_err = "<div class='alert alert-danger email_alert'>
                            Syötä salasana.
                        </div>";
            }            
        }

    }

?>    