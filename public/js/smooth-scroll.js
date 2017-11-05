$('.smooth-scroll').on('click', function(event){
  event.preventDefault();
  let target = event.target.getAttribute('href');
  document.querySelector(target).scrollIntoView({
    behavior: 'smooth'
  });
});

$('.smooth-scroll-up').on('click', function(event){
  event.preventDefault();
  let target = event.target.getAttribute('href');
  document.querySelector('#header').scrollIntoView({
    behavior: 'smooth'
  });
});
