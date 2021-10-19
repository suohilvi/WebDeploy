function changeSrc(id) {
  var scene = document.querySelector('a-scene');
  if (scene.hasLoaded) {
    run();
  } else {
    scene.addEventListener('loaded', run);
  }
  function run(){
    var sky = scene.querySelector('#skyImage');
    sky.emit('fade-out');
    img = new Image();
    img.onload = function (){
    sky.setAttribute('src', img.src);
    sky.emit('fade-in');
    }
    img.onerror = function(){
      document.getElementById(id).value = "Error: Could not load image, please check URL!"
      sky.setAttribute('src', "images/LoadError.jpg");
      sky.emit('fade-in');
    }
    img.src = document.getElementById(id).value;
  }
}

/*
window.addEventListener("wheel", event => {
  const delta = Math.sign(event.wheelDelta);
  //getting the mouse wheel change (120 or -120 and normalizing it to 1 or -1)
  var mycam=document.getElementById('cam').getAttribute('camera');
  var finalZoom=document.getElementById('cam').getAttribute('camera').zoom+delta;
  //limiting the zoom so it doesnt zoom too much in or out
  if(finalZoom<1)
    finalZoom=1;
  if(finalZoom>5)
    finalZoom=5;  

  mycam.zoom=finalZoom;
  //setting the camera element
  document.getElementById('cam').setAttribute('camera',mycam);
});
*/
