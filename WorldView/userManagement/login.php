
<?php include('./controllers/login.php'); ?>

<!doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Log In - WorldView360</title>
    <!-- jQuery + Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="App">
        <div class="vertical-center">
            <div class="inner-block">
                <form action="" method="post">
                    <h3>Log In - WorldView360</h3>

                    <?php
                    echo $accountNotExistErr;
                    echo $emailPwdErr;
                    echo $verificationRequiredErr;
                    ?>

                    <?php
                    if(isset($_GET['a']) && $_GET['a']==="thanks"){
                        echo'<div class="alert alert-success">Password has been changed,<br> please sign in.<br></div>';
                    }
                    ?>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?php echo (isset($_POST['email']) ? $_POST['email'] : "" );?>"/>

                        <?php echo $email_empty_err; ?>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" id="password"/>

                        <?php echo $wrongPwdErr; ?>
                        <?php echo $pass_empty_err; ?>
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="stay" value="stay" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                            Remember me!
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="login" id="submit" class="btn btn-outline-primary btn-lg btn-block">Log In
                        </button>
                    </div>
                </form>

                <div id="userlinks">
                    <a id="signup" href="./signup.php">Sign Up?</a><a id="forgot" href="./change_request.php">Forgot password?</a>
                </div>
                
            </div>
        </div>
    </div>

</body>

</html>