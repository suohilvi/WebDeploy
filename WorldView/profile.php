<!DOCTYPE html>
<?php include "./userProjects/projectProfile.php";?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profile - WorldView360</title>
	<meta name="Tommi Ijäs" content="360 sphere image viewing service">
    <!--Boostrap 5 associated styles-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Site specific styles-->
	<link rel="stylesheet" href="css/pageStyles.css">
	<!--A-frame components-->
	<script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
	<script src="https://storage.googleapis.com/vrview/2.0/build/vrview.min.js"></script>
</head>

<body onload="changeSrc('hidden'), active()">
<input type="hidden" id="hidden" value="images/choose.png">

	<?php
	/* Suojattujen sivujen alkuun */
	ob_start();
	if (!session_id()) session_start();
	// Check if the user is logged in, if not then redirect him to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 1){
		$_SESSION['next_page'] = $_SERVER['PHP_SELF']; 
		header("location: ./userManagement/login.php");
		exit;
	}
	?>

	<div class="page-grid">

		<div class="grid-item header">
			<?php include "./nav.php";?>
		</div>

		<div class="grid-item grid-main">
			<div id="preview">
				<?php include "./viewport.php";?>
			</div>
		</div>

		<div class="grid-item grid-info1">
			<div class="infotext">	
				<?php
				echo $linkAlert;
				?>
			</div>
			<div id="imageLinks">
				<?php
					if(isset($oldLinks)) echo $oldLinks;
				?>
			</div>
		</div>

		<div class="grid-item grid-info2">

			<div class="infotext">	
			<div class="alert alert-success" role="alert">Choose project:</div>
			</div>

			<div id="projects">
				<form id="projectsForm" action="" method="get">
				<?php
				if(isset($oldProjects)) echo $oldProjects;
				?>
				</form>
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
