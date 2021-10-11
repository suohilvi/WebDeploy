<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>WorldView</title>
	<meta name="Tommi Ijäs" content="360 sphere image viewing service">
    <!--Boostrap 5 associated styles-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Site specific styles-->
	<link rel="stylesheet" href="css/pageStyles.css">
	<!--A-frame components-->
	<script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
	<script src="https://storage.googleapis.com/vrview/2.0/build/vrview.min.js"></script>
</head>

<body>
	<?php include "./nav.html";?>

	<div id="viewport">
		<a-assets>
		<img id="show" src="https://i.imgur.com/JY6nzAG.jpeg" width=500>
		</a-assets>
		<a-scene embedded>
			<a-sky id="skyImage" radius="10" src="https://i.imgur.com/JY6nzAG.jpeg"></a-sky>
		</a-scene>

		<div id='vrview'></div>
	</div>



    <!--Boostrap 5 script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<!--own js functions-->
	<script src="script/imageFunctions.js"></script>
</body>

</html>

<?php ?>