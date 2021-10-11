window.addEventListener('load', onVrViewLoad);
function onVrViewLoad() {
  // Selector '#vrview' finds element with id 'vrview'.
  var vrView = new VRView.Player('#vrview', {
    image: 'https://i.imgur.com/JY6nzAG.jpeg',
    is_stereo: false,
    width: 1200,
    height: 700
  });
}
