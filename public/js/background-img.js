function setBackgroundImage(){
  let winHeight = window.innerHeight,
      winWidth = window.innerWidth;
  if (winWidth < winHeight){
    document.querySelector('#bg-image').src = 'storage/images/notebook-handheld.jpg';
  } else {
    document.querySelector('#bg-image').src = 'storage/images/notebook-desktop.jpg';
  }
};

$(window).on('resize load', function(){
  setBackgroundImage();
});
