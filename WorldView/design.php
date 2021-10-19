<!DOCTYPE html>
<?php include("./userProjects/projectDesign.php") ?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Design - WorldView360</title>
	<meta name="Tommi Ijäs" content="360 sphere image viewing service">
    <!--Boostrap 5 associated styles-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Site specific styles-->
	<link rel="stylesheet" href="css/pageStyles.css">
	<!--<link rel="stylesheet" href="userManagement/css/pageStyles.css">-->
	<!--A-frame components-->
	<script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
	<script src="https://storage.googleapis.com/vrview/2.0/build/vrview.min.js"></script>
</head>

<body>

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
				<p id="inputText">Test your link before saving:</p>
				<div id="inputForm" class="input-group mb-3">
					<input type="text" name="linkTest" id="linkTest" class="linkField form-control" placeholder="Test image URL" aria-label="Image URL" aria-describedby="basic-addon2">
					<div class="input-group-append">
						<button class="btn btn-outline-secondary" type="button" id="send" onclick="changeSrc('linkTest')">Test</button>
					</div>
				</div>
			</div>

		</div>

		<div class="grid-item grid-info1">
			<div class="infotext">
			<?php
				echo $linkAlert;
			?>
			</div>
			<?php
			if(isset($_GET['project']) || isset($_GET['newProject'])){
			echo'
			<form action="" method="post">
					<div id="linkForm" class="input-group mb-3">
						<input type="text" name="linkInput" class="linkField form-control" placeholder="Add new image link" aria-label="Image URL" aria-describedby="basic-addon2">
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="submit" name="addLink" id="send">Add</button>
						</div>
					</div>
			</form>
			';}
			?>

			<div class="infotext">	
				<p class="info" id="linkInfo"></p>
			</div>

			<div id="imageLinks">
				<?php
					if(isset($oldLinks)) echo $oldLinks;
				?>
			</div>
		</div>

		<div class="grid-item grid-info2">

			<div class="infotext">	
			<div class="alert alert-success" role="alert">Choose or add project:</div>
			</div>

			<div id="projectForm" class="input-group mb-3">
				<input type="text" name="project" id="projectInput" class="linkField form-control" placeholder="Max 50 char" aria-label="Max 50 char" aria-describedby="basic-addon2">
				<div class="input-group-append">
				<button class="btn btn-outline-secondary" type="submit" name="addProject" id="addProject" onclick="addProject()">Add</button>
				</div>
			</div>
			<div class="infotext">	
				<p class="info" id="projectInfo"></p>
			</div>


			<div id="projects">
				<form id="projectsForm" action="" method="get">
				<?php
				if(isset($newProjectButton)) echo $newProjectButton;
				if(isset($oldProjects)) echo $oldProjects;
				?>
				</form>
			</div>

		</div>

		<div class="grid-item footer">
			<?php include "./footer.html";?>
		</div>
	</div>

    <div id="floater">
        <div class="vertical-center">
            <div class="inner-block">
                <form action="" method="post">
					<input type="submit" name="save" id="submit" class="btn btn-outline-secondary hidden-submit">
                    <h3>Modify link</h3>
                    <div class="form-group">
						<input type="text" name="linkInput" id="link-change" class="linkField form-control" value="Change the link for good this time" aria-label="Image URL" aria-describedby="basic-addon2">
						<input type="hidden" name="id" id="link-change-id" value="">
					</div>
					<div class="button-float">
						<button type="submit" name="delete" id="submit" class="btn btn-outline-danger" onclick="hide()">Delete
						</button>
						<button type="submit" name="save" id="submit" class="btn btn-outline-secondary" onclick="hide()">Save
						</button>
					</div>
                </form>
            </div>
        </div>
    </div>

	<!--Boostrap 5 script-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<!--own js functions-->
	<script src="script/imageFunctions.js"></script>
	<script src="script/projectFunctions.js"></script>
</body>
</html>
