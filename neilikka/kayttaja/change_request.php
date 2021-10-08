<?php include('./controllers/password_email.php'); ?>

<!doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Vaihda salasana - Puutarhaliike Neilikka</title>
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
                    <h3>Vaihda salasana</h3>

                    <?php echo $success_msg; ?>
                    <?php echo $email__notfound; ?>
                    <?php echo $mobile__notfound; ?>
                    <?php echo $email_verify_success; ?>

                    <?php if(isset($_GET['a']) && $_GET['a'] === "kiitos"){
                        echo '<div class="alert alert-success">
                        Sähköposti lähetetty, voit sulkea välilehden!
                        </div>';}
                    ?>
                    
                    <div class="form-group">
                        <label>Palautuksen sähköposti</label>
                        <input type="email" class="form-control" name="email" id="email"/>
                        
                        <?php echo $_emailErr; ?>
                        <?php echo $emailEmptyErr; ?>
                    </div>

                    <div class="form-group">
                        <label>Puh.numero</label>
                        <input type="text" class="form-control" name="mobilenumber" id="mobilenumber"/>

                        <?php echo $_mobileErr; ?>
                        <?php echo $mobileEmptyErr; ?>
                    </div>


                    <button type="submit" name="salasana" id="submit" class="btn btn-outline-primary btn-lg btn-block">Lähetä
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>