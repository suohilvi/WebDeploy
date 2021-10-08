<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Työkalut - Puutarhaliike Neilikka</title>
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
      <img src="kuvat/tyo/1.jpg" class="img" alt="Pikkuharava">
      <div class="kuvausHead">Fiskars pikkuharava, 44,5cm<br>Hinta: 13€</div>
      <div class="kuvaus">Jokaisella itseäänkunnioittavalla löytyy jo iso harava, mutta entäs pieni?</div>
    </div>
    <div class="sailio">
      <img src="kuvat/tyo/2.jpg" class="img" alt="Istutuslapio">
      <div class="kuvausHead">Istutuslapio, 37.5cm<br>Hinta: 13€</div>
      <div class="kuvaus">Lapio pienien taimien näpertämiseen.</div>
    </div>
    <div class="sailio">
      <img src="kuvat/tyo/3.jpg" class="img" alt="Puutarhasäkki">
      <div class="kuvausHead">Puutarhasäkki, 50cm<br>Hinta: 25€</div>
      <div class="kuvaus">Tätä puutarhasäkkiä et helpolla täytä pikkuharavalla, mutta saahan sitä testata.</div>
    </div>
  </div>
</div>


</body>
</html>