function showPreview(e, whereToRender){
  let file = e.target.files[0];
  var reader = new FileReader();
  reader.readAsDataURL(file);
  reader.onload = function(){
    $('#'+whereToRender).attr('src', this.result).show();
  }
}


function addNewPortfolio(e){
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
      if (request.readyState === 4){
        $('#portfolio').html(response);
      }
    }
    $('#addNewPortfolio').modal('toggle');
  } else {
    $('.errorMessage').html('Please check the input fields!').addClass('alert alert-danger');
  }
}

$('#deletePortfolio').on('show.bs.modal', function(event){
  let button = $(event.relatedTarget),
      id = button.data('id'),
      modal = $(this);
  modal.find('input[name="deletePortfolioIndex"]').val(id);
});


function deletePortfolio(e){
  let token = e.target.getAttribute('data-token'),
      id = $('#deletePortfolioIndex').val();

  $.ajax({
    url: 'portfolio/'+id,
    type: 'post',
    data: {
      '_method' : 'DELETE',
      '_token' : token
    },
    success: function(response){
      $('#portfolio').empty().html(response);
    }
  });
}


$('#editPortfolio').on('show.bs.modal', function(event){
  let button = $(event.relatedTarget),
      name = button.data('name'),
      link = button.data('link'),
      shortDesc = button.data('shortdesc'),
      longDesc = button.data('longdesc'),
      thumbnail = button.data('thumbnail'),
      id = button.data('id'),
      modal = $(this);
  modal.find('input[name="editPortfolioName"]').val(name);
  modal.find('input[name="editPortfolioId"]').val(id);
  modal.find('input[name="editPortfolioLink"]').val(link);
  modal.find('input[name="editPortfolioShortDescription"]').val(shortDesc);
  modal.find('textarea[name="editPortfolioLongDescription"]').val(longDesc);
  modal.find('#editPortfolioThumbnailPreview').attr('src',thumbnail);
});


function updatePortfolio(e){
  let name = $('#editPortfolioName').val(),
      id = $('input[name=editPortfolioId]').val(),
      link = $('#editPortfolioLink').val(),
      shortdesc = $('#editPortfolioShortDescription').val(),
      longdesc = $('#editPortfolioLongDescription').val(),
      thumbnail = $('#editPortfolioThumbnail').val();

  let editPortfolioForm = document.querySelector('#editPortfolioForm');
  let request = new XMLHttpRequest();

  if ((name !== '') &&
      (link !== '') &&
      (shortdesc !== '') &&
      (longdesc !== '')){
    request.onreadystatechange = function() {
      if (request.readyState === 4) {
        $('#portfolio').empty().html(request.response);
        // console.log(request.response); //Outputs a DOMString by default
      }
    }
    request.open("POST", "portfolio/"+id);
    request.send(new FormData(editPortfolioForm));
    $('#editPortfolio').modal('toggle');
  } else {
    $('.errorMessage').html('Please check the input fields!').addClass('alert alert-danger');
  }
}
