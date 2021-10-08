  <!--Login script-->
  <?php include("./kayttaja/controllers/login.php"); ?>

<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Yhteydenotto - Puutarhaliike Neilikka</title>
  <script src="script.js"></script>
  <link rel="stylesheet" type="text/css" href="tyyli.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<body>

<!--Navigation bar-->
<?php
include("navbar.html");
?>

<div class="mainbody">
  <?php

  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === 1){
  echo"
    <div id=\"kayttaja\">
      <div class=\"lomake\">
        <h3>Kirjautunut käyttäjä</h3>
        <p>".$_SESSION['firstname']." ".$_SESSION['lastname']."</p>
        <p>Sähköposti: ".$_SESSION['email']."</p>
        <p>Puhelinnumero: ".$_SESSION['mobilenumber']."</p>
        
        <a href=\"./kayttaja/controllers/logout.php\">Kirjaudu ulos</a><a id=\"vaihda\" href=\"./kayttaja/password_change_form.php?token=".$_SESSION['token']."\">Vaihda salasana</a>
      </div>
    </div>
  ";}
  else{
    echo'
    <div id="kirjaudu">
    <div class="lomake">
      <form action="" method="post">
        <h3>Kirjaudu</h3>
        ';
        if(isset($_GET['a']) && $_GET['a']==="kiitos"){
          echo"Salasanan vaihto onnistui,<br> voit nyt kirjautua sisään.<br>";
        }
        echo $accountNotExistErr;
        echo $emailPwdErr;
        echo $verificationRequiredErr;
        echo $email_empty_err;
        echo $pass_empty_err;
      echo'
        Sähköposti:<br>
        <input type="text" name="tunnus" class="yhteysnimi" required><br>
        Salasana:<br>
        <input type="password" name="salasana" class="yhteysnimi" required>
        <br>
        <input type="checkbox" name="pysy" value="pysy">Pysy kirjautuneena
        <br>

        <button type="submit" name="kirjaudu">Kirjaudu</button>
      </form>

      <a id="luo" href="./kayttaja/signup.php">Luo tili</a><a id="unohtuiko" href="./kayttaja/change_request.php">Unohtuiko salasana</a>
    </div>
    </div>
    ';
  }
  ?>
  
</div>


</body>
</html>