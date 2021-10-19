<?php include('./controllers/password_email.php'); ?>

<!doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Password change request - WorldView360</title>
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
                    <h3>Password change request</h3>

                    <?php echo $success_msg; ?>
                    <?php echo $email__notfound; ?>
                    <?php echo $mobile__notfound; ?>
                    <?php echo $email_verify_success; ?>

                    <?php if(isset($_GET['a']) && $_GET['a'] === "thanks"){
                        echo '<div class="alert alert-success">
                        Request email sent, please follow the link in the mail!
                        </div>';}
                    ?>
                    
                    <div class="form-group">
                        <label>Email used in signup</label>
                        <input type="email" class="form-control" name="email" id="email"/>
                        
                        <?php echo $_emailErr; ?>
                        <?php echo $emailEmptyErr; ?>
                    </div>

                    <div class="form-group">
                        <label>Phone number</label>
                        <input type="text" class="form-control" name="mobilenumber" id="mobilenumber"/>

                        <?php echo $_mobileErr; ?>
                        <?php echo $mobileEmptyErr; ?>
                    </div>


                    <button type="submit" name="changeRequest" id="submit" class="btn btn-outline-primary btn-lg btn-block">Send
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>