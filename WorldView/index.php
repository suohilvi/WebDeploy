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

	<div class="page-grid">

		<div class="grid-item header">
			<?php include "./nav.html";?>
		</div>

		<div class="grid-item grid-main">
			<div id="preview">
				<div id="viewport">
						<a-scene id="sky-box" embedded>
							<a-sky id="skyImage" src="images/1.jpg"
							animation__fade="property: components.material.material.color; type: color; from: #FFF; to: #000; dur: 300; startEvents: fade-out"
							animation__fadeback="property: components.material.material.color; type: color; from: #000; to: #FFF; dur: 300; startEvents: fade-in"></a-sky>
							<a-entity id="cam" camera="zoom: 0.8" look-controls >
								<a-cursor
								id="cursor"
								geometry="primitive: circle; radius: 0.000"
								material="color: black; shader: flat"
								></a-cursor>
							</a-entity>
						</a-scene>
					<br>
				</div>
				<p id="input">Input a link to image for view: <br><input type="text" name="link" id="linkInput"><input type="button" name="ok" id="ok" onclick="changeSrc()" value="send"></p>
			</div>
		</div>

		<div class="grid-item grid-info1">
			<div id="infotext">
				<p class="info">Welcome to WorldView service, where you can view the wonderful equinorectangular 360 images from around the world.</p>
				<p class="info">Before committing to the service, you can test out the viewer featured on the left by providing a direct link to the image of your choosing.
								Links with direct access to the image, bypassing any site inherent viewers are supported.</p>
				<p class="info">Drag on image to turn around<br>Go to fullscreen or VR headset mode with the [VR] button<br>Press escape ESC or back to quit fullscreen mode</p>
				<p class="info">More to come in near future.</p>
				
			</div>	
		</div>

		<div class="grid-item grid-info2">
			<div id="infotext">	
			<p class="info">Viewer powered by A-frame framework. ImgBB service recommended for image link hosting</p>			
			</div>		
		</div>

		<div class="grid-item footer">
			<p>Tommi Ijäs - 2021</p>
		</div>
	</div>


	<!--Boostrap 5 script-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<!--own js functions-->
	<script src="script/imageFunctions.js"></script>
</body>
</html>
