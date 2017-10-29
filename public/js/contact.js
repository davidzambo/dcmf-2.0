$(document).ready(function(){
  $('#errormessage').hide();
  $('#sendmessage').hide();

  $('#sendmail').on('click', function(e){
    e.preventDefault();
    if ($('#name').val() === ''){
      $('#errormessage').show().html('It\'s much more personal if I know your name. <br>You can enter it now! ');
      $('#name').focus();
    } else if ($('#email').val() === ''){
        $('#errormessage').show().html('I would like to write to you, so I need your e-mail address.');
        $('#email').focus();
    } else if ($('#message').val() === ''){
        $('#errormessage').show().html('A message without a message is not a real message.<br>So let\'s make it a message!');
        $('#message').focus();
    } else {
      $(this).hide();

      grecaptcha.render('recaptcha-here', {
        'sitekey' : '6LdddC4UAAAAAJ-6iF_KkZURgXAMakcmTs9BkenA',
        'callback' : 'validateVisitor'
      });
    }
  });

});

function validateVisitor(){

  if ($('#url').val() === ''){
    $.ajax({
      url: 'email',
      type: 'post',
      data: {
        '_token': $('input[name="_token"]').val(),
        'name': $('#name').val(),
        'email': $('#email').val(),
        'subject' : $('#subject').val(),
        'message': $('#message').val()
      }
    });
  }

  $('#name').attr('disabled', true);
  $('#email').attr('disabled', true);
  $('#message').attr('disabled', true);
  $('#recaptcha-here').hide();
  $('#contact-submit').hide();
  $('#errormessage').hide();
  $('#contactForm').fadeTo('slow', 0.6);
  $('#sendmessage').addClass('show');
}
