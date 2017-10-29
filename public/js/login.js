$(window).on('keydown', function(event){
  if ((event.which === 76) && (event.ctrlKey)){
    $('#login').modal('toggle');
  }
});
