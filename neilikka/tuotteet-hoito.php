<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Kasvinhoito - Puutarhaliike Neilikka</title>
  <script src="script.js"></script>
  <link rel="stylesheet" type="text/css" href="tyyli.css">

</head>
<body>

<!--Navigation bar-->
<?php
include("navbar.html")
?>
<!--end of Navigation bar-->

<div class="mainbody">
  <h1>Tuotteet</h1>
  <h2>Tuotevalikoimaamme kuuluu sisäkasveja, ulkokasveja sekä työkaluja ja muita tarvikkeita kasvien hoitoon.
  </h2>

  <div class="tuotteetText">
    <div class="tuotevali">
      <a href="tuotteet-sisa.php">Sisäkasvit</a>
    </div> 
    <div class="tuotevali">
      <a href="tuotteet-ulko.php">Ulkokasvit</a>
    </div>
    <div class="tuotevali">
      <a href="tuotteet-tyo.php">Työkalut</a>
    </div>
    <div class="tuotevali">
      <a href="tuotteet-hoito.php">Kasvien hoito</a>
    </div>
  </div>
  
  <div class="tuotteet">
    <div class="sailio">
      <img src="kuvat/hoito/1.jpg" class="img" alt="Rahkasammal">
      <div class="kuvausHead">Rahkasammal, 150g<br>Hinta: 10€</div>
      <div class="kuvaus">Käytä rahkasammalta kosteuttamaan alueitasi.</div>
    </div>
    <div class="sailio">
      <img src="kuvat/hoito/2.jpg" class="img" alt="Ravinnepuikko">
      <div class="kuvausHead">Ravinnepuikko, 30kpl<br>Hinta: 5€</div>
      <div class="kuvaus">Sisäkasvien ravinnepuikko, kuukausittaiseen ravinnointiin.</div>
    </div>
    <div class="sailio">
      <img src="kuvat/hoito/3.jpg" class="img" alt="Ulkomulta">
      <div class="kuvausHead">Ulkomulta, 40L<br>Hinta: 8€</div>
      <div class="kuvaus">Jos pihasi on savea tahi hiakkaa, tästä istutuspenkkiin apu.</div>
    </div>
  </div>

</div>

</body>
</html>