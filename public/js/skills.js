$('#skillModal').on('show.bs.modal', function(event){
  let button = $(event.relatedTarget),
      name = button.data('name'),
      experience = button.data('experience'),
      ordernumber = button.data('ordernumber'),
      id = button.data('id'),
      title = button.data('title'),
      modal = $(this);
  modal.find('input[name="skillId"]').val(id);
  modal.find('input[name="skillName"]').val(name);
  modal.find('select[name="skillExperience"]').val(experience);
  modal.find('input[name="skillOrderNumber"]').val(ordernumber);
  modal.find('.modal-title').text(title);
  if (title === 'Edit skill'){
    $('#updateSkill').show();
    $('#newSkill').hide();
  } else {
    $('#updateSkill').hide();
    $('#newSkill').show();
  }
});


$('#updateSkill').on('click', function(){
  let name = $('#skillName').val(),
      experience = $('#skillExperience').val(),
      ordernumber = $('#skillOrderNumber').val(),
      id = $('#skillId').val();
      token = $('input[name=_token]').val();
  $.ajax({
    url: 'skill/'+id,
    type: 'post',
    data:{
      _token : token,
      _method : 'PUT',
      name : name,
      experience : experience,
      ordernumber : ordernumber
    },
    success : function(response){
      $('#skillModal').modal('hide');
    },
    error : function(response){
      alert(response.responseText);
    }
  });
  // $('#skillModal').modal('hide');
  return false;
});


$('#newSkill').on('click', function(){
  let name = $('#skillName').val(),
      experience = $('#skillExperience').val(),
      ordernumber = $('#skillOrderNumber').val(),
      token = $('input[name=_token]').val();
  $.ajax({
    url: 'skill',
    type: 'post',
    data:{
      _token : token,
      name : name,
      experience : experience,
      ordernumber : ordernumber
    },
    success : function(response){
      $('#skillModal').modal('hide');
    },
    error : function(response){
      alert(response.responseText);
    }
  });
  return false;
});


$('#deleteSkill').on('show.bs.modal', function(event){
  let button = $(event.relatedTarget),
      id = button.data('id'),
      modal = $(this);
  $('#deleteIndex').val(id);
});


function deleteSkill(){
  let index = $('#deleteIndex').val(),
      token = $('input[name=_token]').val();
  $.ajax({
    url : 'skill/'+index,
    type : 'post',
    data : {
      _token : token,
      _method : 'DELETE'
    },
    success : function(response){
      $('#skillModal').modal('hide');
    },
    error : function(response){
      alert(response.responseText);
    }
  });
  $('#deleteSkill').modal('hide');
}
