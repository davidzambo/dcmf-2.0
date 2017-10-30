var position = {};
position.window = window.innerHeight;
position.header = document.querySelector('#header').getBoundingClientRect();
position.about = document.querySelector('#about').getBoundingClientRect();
position.services = document.querySelector('#services').getBoundingClientRect();
position.skills = document.querySelector('#skills').getBoundingClientRect();
position.portfolio = document.querySelector('#portfolio').getBoundingClientRect();
position.contact = document.querySelector('#contact').getBoundingClientRect();


if (window.innerWidth > 768){
  $('#about-content,\
  #services-content,\
  #skills-content,\
  #portfolio-content,\
  #contact-content').css('opacity', 0);
}


function fadeInSections(){
  let pos = document.documentElement.scrollTop;

  // SET UP ABOUT SECTION FADE IN
  if ( pos + (position.window * 0.9) > position.about.top ){
    $('#about-content').animate({'opacity' : '1'}, 800, 'linear');
  }
  if ( pos + (position.window * 0.9) > position.services.top ){
    $('#services-content').animate({'opacity' : '1'}, 800, 'linear');
  }
  if ( pos + (position.window * 0.9) > position.skills.top ){
    $('#skills-content').animate({'opacity' : '1'}, 800, 'linear');
  }
  if ( pos + (position.window * 0.9) > position.portfolio.top ){
    $('#portfolio-content').animate({'opacity' : '1'}, 800, 'linear');
  }
  if ( pos + (position.window * 0.9) > position.contact.top ){
    $('#contact-content').animate({'opacity' : '1'}, 800, 'linear');
    document.removeEventListener('scroll', fadeInSections);
  }
}

document.addEventListener('scroll', fadeInSections, false);

$(document.body).on('touchmove', function(){
  fadeInSections();
});
