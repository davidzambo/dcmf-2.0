$('#portfolioModal').on('show.bs.modal', function(event){
  let button = $(event.relatedTarget),
      name = button.data('name'),
      link = button.data('link'),
      shortDesc = button.data('shortdesc'),
      longDesc = button.data('longdesc'),
      thumbnail = button.data('thumbnail'),
      id = button.data('id'),
      action = button.data('action'),
      modal = $(this);
  modal.find('input[name="portfolioName"]').val(name);
  modal.find('input[name="portfolioId"]').val(id);
  modal.find('input[name="portfolioLink"]').val(link);
  modal.find('input[name="portfolioShortDescription"]').val(shortDesc);
  modal.find('textarea[name="portfolioLongDescription"]').val(longDesc);
  modal.find('#portfolioThumbnailPreview').attr('src',thumbnail);
  modal.find('.errorMessage').empty().hide();
  if (action === 'new'){
    $('#portfolioThumbnailPreview').hide();
    $('#addNewPortfolio').show();
    $('#updatePortfolio').hide();
    modal.find('.modal-title').html('Add new portfolio');
  } else {
    $('#portfolioThumbnailPreview').show();
    $('#addNewPortfolio').hide();
    $('#updatePortfolio').show();
    modal.find('.modal-title').html('Edit portfolio');
  }
  $('.errorMessage').hide();
});

function showPreview(e, whereToRender){
  let file = e.target.files[0];
  var reader = new FileReader();
  reader.readAsDataURL(file);
  reader.onload = function(){
    $('#'+whereToRender).attr('src', this.result).show();
  }
}


$('#deletePortfolio').on('show.bs.modal', function(event){
  let button = $(event.relatedTarget),
      id = button.data('id'),
      modal = $(this);
      modal.find('input[name="deletePortfolioIndex"]').val(id);
});


$('#addNewPortfolio').on('click', function(){
  let name = $('#portfolioName').val(),
      link = $('#portfolioLink').val(),
      shortdesc = $('#portfolioShortDescription').val(),
      longdesc = $('#portfolioLongDescription').val(),
      thumbnail = $('#portfolioThumbnail').val();

  let portfolioForm = document.querySelector('#portfolioForm');
  let request = new XMLHttpRequest();

  if ((name !== '') &&
      (link !== '') &&
      (shortdesc !== '') &&
      (longdesc !== '') &&
      (thumbnail !== '')){
    request.open("POST", "portfolio");
    request.send(new FormData(portfolioForm));
    request.onreadystatechange = function(){
      if (request.readyState === 4) {
        let response = JSON.parse(request.response);
        // CHECK THE RESULT OF THE BACKEND VALIDATION
        if (response.hasOwnProperty('error')){
          $('.errorMessage').empty();
          response.error.map(function(error){
            return $('.errorMessage').append(error);
          });
          $('.errorMessage').show().addClass('alert alert-danger');
        } else {
          $('#portfolioModal').modal('toggle');
        }
      }
    }
  } else {
    $('.errorMessage').html('Please check the input fields!').addClass('alert alert-danger');
  }
});


$('#updatePortfolio').on('click', function(){
  let name = $('#portfolioName').val(),
      id = $('input[name=portfolioId]').val(),
      link = $('#portfolioLink').val(),
      shortdesc = $('#portfolioShortDescription').val(),
      longdesc = $('#portfolioLongDescription').val(),
      thumbnail = $('#portfolioThumbnail').val();

  let portfolioForm = document.querySelector('#portfolioForm');
  let request = new XMLHttpRequest();

  if ((name !== '') &&
      (link !== '') &&
      (shortdesc !== '') &&
      (longdesc !== '')){
    let formData = new FormData(portfolioForm);
    formData.append('_method', 'PUT');
    
    request.open("POST", "portfolio/"+id);
    request.send(formData);
    request.onreadystatechange = function(){
      if (request.readyState === 4) {
        let response = JSON.parse(request.response);
        // CHECK THE RESULT OF THE BACKEND VALIDATION
        if (response.hasOwnProperty('error')){
          $('.errorMessage').empty();
          response.error.map(function(error){
            return $('.errorMessage').append(error);
          });
          $('.errorMessage').show().addClass('alert alert-danger');
        } else {
          $('#portfolioModal').modal('toggle');
        }
      }
    }
  } else {
    $('.errorMessage').html('Please check the input fields!').addClass('alert alert-danger');
  }
});

function deletePortfolio(e){
  let token = e.target.getAttribute('data-token'),
      id = $('#deletePortfolioIndex').val();
  $('#portfolio-'+id).empty().remove();
  $.ajax({
    url: 'portfolio/'+id,
    type: 'post',
    data: {
      '_method' : 'DELETE',
      '_token' : token
    }
  });
}
