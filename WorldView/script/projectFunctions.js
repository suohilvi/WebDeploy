function addProject() {
    var field = document.getElementById('projectInput');
    var name = field.value.replace(/(<([^>]+)>)/gi, "");

    if(name.length > 50){
        var warning = document.getElementById('projectInfo')
        warning.innerHTML = "Name too long";
        warning.className += " alert alert-danger";
        return;
    }
    window.location.href = "?newProject=" + name;
};

function modifyLink(linkId){
    var link = document.getElementById(linkId).value
    document.getElementById('link-change').setAttribute('size', link.length);
    document.getElementById('link-change').value = link;
    document.getElementById('link-change-id').value = linkId;
    document.getElementById('floater').style.display = "block";
}

function hide(){
    document.getElementById('floater').style.display = "none";
}