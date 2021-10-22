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

function modifyLink(id){
    document.querySelector('a-scene').setAttribute('vr-mode-ui', {enabled: false});
    document.getElementById('floater').style.display = "block";

    var title = document.getElementById(id+'title').value
    document.getElementById('title-change').setAttribute('size', title.length);
    document.getElementById('title-change').value = title;
    var link = document.getElementById(id+'link').value
    document.getElementById('link-change').setAttribute('size', link.length);
    document.getElementById('link-change').value = link;
    document.getElementById('link-change-id').value = id;
    
}

function hide(){
    document.getElementById('floater').style.display = "none";
}