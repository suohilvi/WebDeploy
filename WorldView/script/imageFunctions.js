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
  const isTouchDevice = () => {
  return (('ontouchstart' in window) ||
    (navigator.maxTouchPoints > 0) ||
    (navigator.msMaxTouchPoints > 0));
}
  
function wheelZoom(){
  window.addEventListener("wheel", zoom, true);
};
function wheelScroll(){
  window.removeEventListener("wheel", zoom, true);
}
function zoom(event){
  
    // small increments for smoother zooming
    const delta = event.wheelDelta / 120 / 10;
    var mycam = document.getElementById("cam").getAttribute("camera");
    var finalZoom =
      document.getElementById("cam").getAttribute("camera").zoom + delta;

    // limiting the zoom
    if (finalZoom < 0.8) finalZoom = 0.8;
    if (finalZoom > 2) finalZoom = 2;
    mycam.zoom = finalZoom;

    document.getElementById("cam").setAttribute("camera", mycam);
    AFRAME.scenes[0].resize();
}
function add(){
  if(isTouchDevice){return;};
  document.getElementsByTagName("BODY")[0].classList.add('fixed');
};
function remove(){
  document.getElementsByTagName("BODY")[0].classList.remove('fixed');
};
