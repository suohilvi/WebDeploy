<!doctype html>
<?php include('./controllers/register.php');?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Sign Up - WorldView360</title>
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
                    <h3>Sign Up - WorldView360</h3>

                    <?php echo $success_msg; ?>
                    <?php echo $email_exist; ?>

                    <?php echo $email_verify_err; ?>
                    <?php if(isset($_GET['a']) && $_GET['a'] === "thanks"){
                        echo '<div class="alert alert-success">
                        Verification Email sent, please follow the link provided in email!
                        </div>';}
                    ?>

                    <div class="form-group">
                        <label>Forename</label>
                        <input type="text" class="form-control" name="firstname" id="firstName" value="<?php echo (isset($_POST['firstname']) ? $_POST['firstname'] : "" );?>" />

                        <?php echo $fNameEmptyErr; ?>
                        <?php echo $f_NameErr; ?>
                    </div>

                    <div class="form-group">
                        <label>Surname</label>
                        <input type="text" class="form-control" name="lastname" id="lastName" value="<?php echo (isset($_POST['lastname']) ? $_POST['lastname'] : "" );?>"/>

                        <?php echo $l_NameErr; ?>
                        <?php echo $lNameEmptyErr; ?>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?php echo (isset($_POST['email']) ? $_POST['email'] : "" );?>"/>

                        <?php echo $_emailErr; ?>
                        <?php echo $emailEmptyErr; ?>
                    </div>

                    <div class="form-group">
                        <label>Mobile number</label>
                        <input type="text" class="form-control" name="mobilenumber" id="mobilenumber" value="<?php echo (isset($_POST['mobilenumber']) ? $_POST['mobilenumber'] : "" );?>"/>

                        <?php echo $_mobileErr; ?>
                        <?php echo $mobileEmptyErr; ?>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" id="password"/>

                        <?php echo $_passwordErr; ?>
                        <?php echo $passwordEmptyErr; ?>
                    </div>
                    <div class="form-group">
                        <label>Password retype</label>
                        <input type="password" class="form-control" name="password2" id="password"/>

                        <?php echo $_passwordErr; ?>
                        <?php echo $passwordEmptyErr; ?>
                    </div>

                    <button type="submit" name="submit" id="submit" class="btn btn-outline-primary btn-lg btn-block">Sign Up
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>