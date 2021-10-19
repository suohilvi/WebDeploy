<nav class="navbar navbar-expand-md navbar-dark bg-dark bg-gradient">
<div class="container-fluid">
  <a class="navbar-brand" href="#"><img id="logo" src="./images/logo.jpg" width="150"></a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul id="nav" class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="design.php">Design</a>
      </li>
      <?php
      if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === 1){
        echo'
        <li class="nav-item">
          <a class="nav-link" href="./userManagement/controllers/logout.php">Log Out</a>
        </li>
        ';
      }
      ?>
  </div>
</div>
</nav>

<script>
// Get all buttons with class="btn" inside the container
var container = document.getElementById("nav");
var links = container.getElementsByClassName("nav-link");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < links.length; i++) {
  links[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>