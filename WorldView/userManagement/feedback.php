<?php include('./controllers/feedback_email.php'); ?>

<!doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Feedback - WorldView360</title>
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
                    <h3>Send feedback on WorldView360</h3>
                    
                    <?php
                    $email_verify_err;
                    if(isset($_GET['a']) && $_GET['a'] === "thanks"){
                        echo '<div class="alert alert-success">
                        Thank you for the feedback! You can close this window.
                        </div>';}
                    ?>
                    
                    <div class="form-group">
                        <label>Email of sender</label>
                        <input type="email" class="form-control" name="email" id="email"/>
                        

                        <?php echo $emailEmptyErr; ?>
                    </div>

                    <div class="form-group">
                        <label for="topic">Topic</label>
                        <select class="form-control" id="topic" name="topic">
                        <option>General feedback</option>
                        <option>Improvement suggestion</option>
                        <option>User problem</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="feedbackText">Feedback</label>
                        <textarea class="form-control" id="feedbackText" name="feedbackText" rows="7"></textarea>

                        <?php echo $textEmptyErr; ?>
                    </div>


                    <button type="submit" name="feedback" id="submit" class="btn btn-outline-primary btn-lg btn-block">Send
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>