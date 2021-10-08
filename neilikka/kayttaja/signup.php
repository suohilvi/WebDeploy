<?php include('./controllers/register.php'); ?>

<!doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Rekisteröinti - Puutarhaliike Neilikka</title>
    <!-- jQuery + Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="../script.js"></script>
    <link rel="stylesheet" type="text/css" href="../tyyli.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
   
   <?php include("navbarLog.html"); ?>

    <div class="App">
        <div class="vertical-center">
            <div class="inner-block">
                <form action="" method="post">
                    <h3>Rekisteröidy</h3>

                    <?php echo $success_msg; ?>
                    <?php echo $email_exist; ?>

                    <?php echo $email_verify_err; ?>
                    <?php if(isset($_GET['a']) && $_GET['a'] === "kiitos"){
                        echo '<div class="alert alert-success">
                        Verifiointisähköposti lähetetty, voit sulkea välilehden!
                        </div>';}
                    ?>

                    <div class="form-group">
                        <label>Etunimi</label>
                        <input type="text" class="form-control" name="firstname" id="firstName" value="<?php echo (isset($_POST['firstname']) ? $_POST['firstname'] : "" );?>" />

                        <?php echo $fNameEmptyErr; ?>
                        <?php echo $f_NameErr; ?>
                    </div>

                    <div class="form-group">
                        <label>Sukunimi</label>
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
                        <label>Puh.numero</label>
                        <input type="text" class="form-control" name="mobilenumber" id="mobilenumber" value="<?php echo (isset($_POST['mobilenumber']) ? $_POST['mobilenumber'] : "" );?>"/>

                        <?php echo $_mobileErr; ?>
                        <?php echo $mobileEmptyErr; ?>
                    </div>

                    <div class="form-group">
                        <label>Salasana</label>
                        <input type="password" class="form-control" name="password" id="password"/>

                        <?php echo $_passwordErr; ?>
                        <?php echo $passwordEmptyErr; ?>
                    </div>
                    <div class="form-group">
                        <label>Salasana uudestaan</label>
                        <input type="password" class="form-control" name="password2" id="password"/>

                        <?php echo $_passwordErr; ?>
                        <?php echo $passwordEmptyErr; ?>
                    </div>

                    <button type="submit" name="submit" id="submit" class="btn btn-outline-primary btn-lg btn-block">Lähetä
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>