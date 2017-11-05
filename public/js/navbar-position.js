function setNavbarPosition(){
  let winHeight = window.innerHeight,
      winWidth = window.innerWidth,
      navbarWidth = document.querySelector('.dcmf-navbar').offsetWidth,
      pos;
  pos = 35 + (winHeight / 2) + (navbarWidth / 2);
  // console.log(winHeight+' '+navbarWidth+' '+pos);
  // alert(winWidth);
  if (winWidth > 766){
    document.querySelector('.dcmf-navbar-container').style.top = pos+'px';
  } else {
    document.querySelector('.dcmf-navbar-container').style.top = '0px';
  }
};

$(window).on('resize load', function(){
  setNavbarPosition();
});
