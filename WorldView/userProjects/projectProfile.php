<?php
include('./userProjects/config/db.php');
$userTable = $_SESSION['dbtable'];

//Link Alerts
if(isset($_GET['project'])) {$linkAlert = '<div class="alert alert-success" role="alert">Choose an image to view from: '.strip_tags($_GET['project']).'</div>';}
if(!isset($_GET['project'])){$linkAlert = '<div class="alert alert-warning" role="alert">Please choose a project to see links!</div>';}



//Check projects and make them available
$projectSql = "SELECT DISTINCT project FROM $userTable";
$projects = $connection->query($projectSql);
if($projects->num_rows>0){
    $oldProjects = "";
    while($row = $projects->fetch_assoc()){
        $oldProjects .= '<button class="pButton btn btn-outline-secondary" type="submit" name="project" value="'.$row['project'].'" id="send">'.$row['project'].'</button>';
    }
}

//Create new project or get old project
if(isset($_GET['newProject'])){
    $newProject = $connection->real_escape_string(strip_tags($_GET['newProject']));
    $_SESSION['project'] = $newProject;
    $newProjectButton = '<button class="pButton btn btn-outline-secondary" type="submit" name="newProject" value="'.$newProject.'" id="send">'.$newProject.'</button>';
}
if(isset($_GET['project'])) {$_SESSION['project'] = $connection->real_escape_string(strip_tags($_GET['project']));}

//Project link management
//Get projects as buttons
if(isset($_GET['project'])) {
    $project = $connection->real_escape_string(strip_tags($_GET['project']));
    $projectSql = "SELECT * FROM $userTable WHERE project = ?";
    $statement = $connection->prepare($projectSql);
    $statement->bind_param("s", $project);
    $statement->execute();
    $links = $statement->get_result();
    if($links->num_rows>0){
        $oldLinks = "";
        while($row = $links->fetch_assoc()){
            $oldLinks .= '
                        <form action="" method="post">
                        <div id="inputForm" class="input-group mb-3">
                            <input type="text" name="linkTest" id="'.$row['id'].'" class="linkField form-control" value="'.$row['link'].'" aria-label="Image URL" aria-describedby="basic-addon2" readonly>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" name="modify" onclick="changeSrc('.$row['id'].')")">View</button>
                            </div>
                        </div>
                        </form>
                        ';
        }
    }
}
//Add links to project
if(isset($_POST['addLink'])) {
    $link = $connection->real_escape_string(strip_tags($_POST['linkInput']));
    $project = $_SESSION['project'];
    if(filter_var($link, FILTER_VALIDATE_URL)){
    $projectSql = "INSERT INTO $userTable (link, project, projectposition) VALUES(?, ?, '0')";
    $statement = $connection->prepare($projectSql);
    $statement->bind_param("ss", $link, $project);
    $statement->execute();
    header("Location: ?project=$project");
    }else{$linkAlert = '<div class="alert alert-warning" role="alert">Not usable URL!</div>';}
}
//Delete and save links in project
if(isset($_POST['delete'])) {
    $project = $_SESSION['project'];
    $id = $connection->real_escape_string(strip_tags($_POST['id']));
    $deleteSql = "DELETE FROM $userTable WHERE id = ?";
    $statement = $connection->prepare($deleteSql);
    $statement->bind_param("i", $id);
    $statement->execute();
    header("Location: ?project=$project");
}
if(isset($_POST['save'])) {
    $project = $_SESSION['project'];
    $link= $connection->real_escape_string(strip_tags($_POST['linkInput']));
    $id = $connection->real_escape_string(strip_tags($_POST['id']));
    $modifySql = "UPDATE $userTable SET link = ? WHERE id = ?";
    $statement = $connection->prepare($modifySql);
    $statement->bind_param("si", $link, $id);
    $statement->execute();
    header("Location: ?project=$project");
}
?>