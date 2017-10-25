function showPreview(e, whereToRender){
  let file = e.target.files[0];
  var reader = new FileReader();
  reader.readAsDataURL(file);
  reader.onload = function(){
    $('#'+whereToRender).attr('src', this.result).show();
  }
}


function addNewSkill(e){
  let name = $('#skillName').val(),
      experience = $('#skillExperience').val(),
      order = $('#skillOrderNumber').val(),
      thumbnail = $('#skillThumbnail').val();

  let skillForm = document.querySelector('#skillForm');
  let request = new XMLHttpRequest();

  if ((name !== '') && (experience !== 0) && (thumbnail !== '')){
    request.open("POST", "skills");
    request.send(new FormData(skillForm));
    $('#addNewSkill').modal('toggle');
  } else {
    $('#skillErrorMessage').html('Please check the input fields!').addClass('alert alert-danger');
  }
}

function emptySkillForm(){
  $('#skillName').val('');
  $('#skillExperience').val('');
  $('#skillOrderNumber').val('');
  $('#skillThumbnail').val('');
  $('#skillThumbnailPreview').attr('src','').hide();
}


$('#editSkill').on('show.bs.modal', function(event){
  let button = $(event.relatedTarget),
      name = button.data('name'),
      experience = button.data('experience'),
      thumbnail = button.data('thumbnail'),
      order = button.data('order'),
      id = button.data('id'),
      modal = $(this);
  $('#editSkillName').val(name);
  $('#editSkillExperience').val(experience);
  $('#editSkillOrderNumber').val(order);
  $('#editSkillId').val(id);
  $('#editSkillThumbnailPreview').attr('src', thumbnail);
});


function updateSkill(){
  let name = $('#editSkillName').val(),
      experience = $('#editSkillExperience').val(),
      order = $('#editSkillOrderNumber').val(),
      thumbnail = $('#editSkillThumbnail').val(),
      id = $('#editSkillId').val();
      alert(id);


  let editSkillForm = document.querySelector('#editSkillForm');
  let request = new XMLHttpRequest();

  if ((name !== '') && (experience !== 0)){
    request.open("POST", "skills/"+id);
    request.send(new FormData(editSkillForm));
    // $('#editSkill').modal('toggle');
  } else {
    $('#editSkillErrorMessage').html('Please check the input fields!').addClass('alert alert-danger');
  }
}


$('#deleteSkill').on('show.bs.modal', function(event){
  let button = $(event.relatedTarget),
      id = button.data('id'),
      modal = $(this);
  $('#deleteIndex').val(id);
});


function deleteSkill(){
  let index = $('#deleteIndex').val();
  $.ajax({
    url : 'skills/'+index,
    type : 'post',
    data : {
      '_method' : 'DELETE'
    }
  });
  $('#deleteSkill').modal('toggle');
}
