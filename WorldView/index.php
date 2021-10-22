<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>WorldView360</title>
	<meta name="Tommi Ijäs" content="360 sphere image viewing service">
    <!--Boostrap 5 associated styles-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Site specific styles-->
	<link rel="stylesheet" href="css/pageStyles.css">
	<!--A-frame components-->
	<script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
	<script src="https://storage.googleapis.com/vrview/2.0/build/vrview.min.js"></script>
</head>

<body onload="changeSrc('hidden')">
<input type="hidden" id="hidden" value="images/1.jpg">
<?php
	ob_start();
	if (!session_id()) session_start();
?>
	<div class="page-grid">
		<div class="grid-item header">
			<?php include "./nav.php";?>
		</div>

		<div class="grid-item grid-main">
			<div id="preview">
				<?php include "./viewport.php";?>
				<p id="inputText">Input a link to view image:</p>
				<div class="inputForm input-group mb-3">
					<input type="text" name="linkTest" id="linkTest" class="form-control" placeholder="Image URL" aria-label="Image URL" aria-describedby="basic-addon2">
					<div class="input-group-append">
						<button class="btn btn-outline-secondary" type="button" id="send" onclick="changeSrc('linkTest')">Send</button>
					</div>
				</div>
			</div>
		</div>

		<div class="grid-item grid-info1">
			<div class="infotext">
				<p class="info">Welcome to WorldView360 service, where you can view the wonderful equirectangular 360 images of your choosing.</p>
				<p class="info">Before committing to the service, you can test out the viewer featured on the left by providing a direct link to the image of your choosing.
								Links with direct access to the image, bypassing any site inherent viewers are supported.</p>
				<p class="info">Drag on image to turn around<br>Go to fullscreen or VR headset mode with the [VR] button<br>Use scroll wheel to zoom<br>Press escape ESC or back to quit fullscreen mode</p>
				<p class="info"><br>On phone look around by either with gyroscope or by touch and drag<br>Go to fullscreen with AR button or use headset mode with the [VR] button<br>Press system back button to exit fullscreen<br>Sorry no zoom on mobile</p>

			</div>	
		</div>

		<div class="grid-item grid-info2">
			<div class="infotext">	
			<p class="info">Viewer powered by A-frame framework. ImgBB service recommended for image link hosting</p>	
			<p class="info">ImgBB service recommended for image link hosting</p>
			<p class="info">Google streeview app can be used to produce high quality equitriangular images</p>	
			</div>		
		</div>

		<div class="grid-item footer">
			<?php include "./footer.html";?>
		</div>
	</div>


	<!--Boostrap 5 script-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<!--own js functions-->
	<script src="script/imageFunctions.js"></script>
</body>
</html>
