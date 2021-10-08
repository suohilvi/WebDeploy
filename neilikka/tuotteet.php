<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Tuotteet - Puutarhaliike Neilikka</title>
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

<div class="tuotteet">

  <div class="tuotevali" onclick="window.location.href='tuotteet-sisa.php';">
      <div class="kuvaus">Sisäkasvit</div>
      <img src="kuvat/sisa/1.jpg" class="img" alt="Sisäkasvit">
  </div>

  <div class="tuotevali" onclick="window.location.href='tuotteet-ulko.php';">
      <div class="kuvaus">Ulkokasvit</div>
      <img src="kuvat/ulko/1.jpg" class="img" alt="Ulkokasvit">
  </div>

  <div class="tuotevali" onclick="window.location.href='tuotteet-tyo.php';"> 
      <div class="kuvaus">Työkalut</div>
      <img src="kuvat/tyo/1.jpg" class="img" alt="Työkalut">
  </div>

  <div class="tuotevali" onclick="window.location.href='tuotteet-hoito.php';">
      <div class="kuvaus">Kasvien hoito</div>
      <img src="kuvat/hoito/3.jpg" class="img" alt="Kasvinhoito">
  </div>

</div>

</div>

</body>
</html>