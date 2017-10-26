$('#serviceModal').on('show.bs.modal', function(event){
  let button = $(event.relatedTarget),
      id = button.data('id'),
      name = button.data('name'),
      icon = button.data('icon'),
      ordernumber = button.data('ordernumber'),
      description = button.data('description'),
      action = button.data('action'),
      modal = $(this);
  modal.find('input[name="serviceId"]').val(id);
  modal.find('input[name="serviceName"]').val(name);
  modal.find('input[name="serviceIcon"]').val(icon);
  modal.find('input[name="serviceOrderNumber"]').val(ordernumber);
  modal.find('.ck-editor__editable p').html(description);
  if (action === 'new'){
    $('#addNewService').show();
    $('#updateService').hide();
  } else {
    $('#addNewService').hide();
    $('#updateService').show();
  }
  $('.errorMessage').hide();
});


$('#deleteService').on('show.bs.modal', function(event){
  let button = $(event.relatedTarget),
      id = button.data('id'),
      modal = $(this);
  modal.find('input[name="deleteServiceIndex"]').val(id);
});


$('#addNewService').on('click', function(){
  let name = $('#serviceName').val(),
      token = $('input[name=_token]').val(),
      icon = $('#serviceIcon').val(),
      orderNumber = $('#serviceOrderNumber').val(),
      description = $('.ck-editor__editable p').html();

  if ((name !== '') && (icon !== '') && (orderNumber !== '') && (description !== '')){
    $.ajax({
      url : 'service',
      type : 'post',
      data : {
        name : name,
        _token : token,
        icon : icon,
        order_number : orderNumber,
        description : description,
      },
      success : function(){
        $('#serviceModal').modal('hide');
      }
    });
  } else {
    console.log('para'+name+' '+icon+' '+orderNumber+' '+description);
    $('#serviceForm').find('.errorMessage').text('Please check all the input fields!').show();
  }
});


$('#updateService').on('click', function(){
  let name = $('#serviceName').val(),
      token = $('input[name=_token]').val(),
      icon = $('#serviceIcon').val(),
      id = $('input[name=serviceId]').val(),
      orderNumber = $('#serviceOrderNumber').val(),
      description = $('.ck-editor__editable p').html();

  if ((name !== '') && (icon !== '') && (orderNumber !== '') && (description !== '')){
    $.ajax({
      url : 'service/'+id,
      type : 'post',
      data : {
        name : name,
        _token : token,
        _method : 'PUT',
        icon : icon,
        order_number : orderNumber,
        description : description,
      },
      success : function(){
        $('#serviceModal').modal('hide');
      }
    });
  } else {
    console.log('para'+name+' '+icon+' '+orderNumber+' '+description);
    $('#serviceForm').find('.errorMessage').text('Please check all the input fields!').show();
  }
});


function deleteService(e){
  let token = e.target.getAttribute('data-token'),
      id = $('#deleteServiceIndex').val();

  $.ajax({
    url: 'service/'+id,
    type: 'post',
    data: {
      '_method' : 'DELETE',
      '_token' : token
    },
  });
}
