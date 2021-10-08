<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Yhteydenotto - Puutarhaliike Neilikka</title>
  <script src="script.js"></script>
  <link rel="stylesheet" type="text/css" href="tyyli.css">

</head>
<body>

<!--Navigation bar-->
<?php
include("navbar.html")
?>
<!--end of Navigation bar-->
<?php
// Set sessions
if(!isset($_SESSION)) {
  session_start();
}
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== 1){
    $_SESSION['next_page'] = $_SERVER['PHP_SELF'];
    header("location: kirjaudu.php");
    exit;
}


?>
<div class="mainbody">
  <h3>Voit ottaa meihin yhteyttä
</h3>
  <p>* puhelimitse yksittäisiin myymälöihin
  </p>
  <p>* sähköpostitse: asiakaspalvelu@puutarhaliikeneilikka.fi
  </p>
  <p>* alla olevalla lomakkeella
  </p>
  <div id="palaute">
    <div class="lomake" id="yhteytta">
      <form>
        <h3>Yhteydenotto</h3>
        Nimi:<br>
        <input type="text" name="nimi" class="yhteysnimi" required><br>
        Sähköposti:<br>
        <input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" type="text" name="sahkoposti" class="yhteysnimi" required><br>
        
        Aihe:<br>
        <select name="syy">
          <option>Kysymys tuotteista</option>
          <option>Tilaus</option>
          <option>Yhteydenottopyyntö</option>
          <option>Muu</option>
        </select>
        <br>
        Viesti:<br>
        <textarea name="viesti" value="" id="viesti" required>Kerro asiasi</textarea>
        <br>
        Haluan tilata Puutarhaliike Neilikan uutiskirjeen:<br>
        <input type="radio" name="uutiskirje" value="kylla">Kyllä
        <input type="radio" name="uutiskirje" value="ei">Ei
        <br>
        <input type="submit" value="Lähetä">
      </form>
    </div>
  </div>
  </div>

</body>
</html>