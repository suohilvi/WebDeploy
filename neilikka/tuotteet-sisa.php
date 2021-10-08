<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Sisäkasvit - Puutarhaliike Neilikka</title>
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
      <img src="kuvat/sisa/1.jpg" class="img" alt="banaani">
      <div class="kuvausHead">Banaani mini, korkeus 10cm<br>Hinta: 4€</div>
      <div class="kuvaus">Pieni banaanikasvi kauniilla lehdillä, ei tuota suomen hyytävissä oloissa itse hedelmää. Kiva koristus.</div>
    </div>
    <div class="sailio">
      <img src="kuvat/sisa/2.jpg" class="img" alt="jättipeikonlehti">
      <div class="kuvausHead">Jättipeikonlehti , korkeus90cm<br>Hinta: 50€</div>
      <div class="kuvaus">Jättipeikonlehti tuo iloa suureenkin tilaan mahtavan kokoisten lehtiensä vuoksi; Reikämallia.</div>
    </div>
    <div class="sailio">
      <img src="kuvat/sisa/3.jpg" class="img" alt="varjoviikuna">
      <div class="kuvausHead">Varjoviikuna, korkeus 20cm<br>Hinta: 8€</div>
      <div class="kuvaus">Varjoviikuna, liekkö nimi tummien lehtien vuoksi vai viihtynee varjossa. Kaikilla yksilöillämme komea runko.</div>
    </div>
  </div>

</div>

</body>
</html>