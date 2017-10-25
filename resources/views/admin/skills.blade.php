<div class="modal fade" id="addNewSkill" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add new skill</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="skillForm">
        <div class="container-fluid">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="skillName" class="col-form-label">Name:</label>
                {{ csrf_field() }}
                <input type="hidden" name="skillIndex">
                <input type="text" class="form-control" id="skillName" name="skillName">
              </div>

              <div class="form-group">
                <label for="skillExperience">Experience:</label>
                <select class="form-control" id="skillExperience" name="skillExperience">
                  <?php
                    for ($i = 0; $i < 11; $i++){
                      echo "<option value=".($i*10).">".($i*10)."%</option>";
                    }
                  ?>
                </select>
              </div>

              <div class="form-group">
                <label for="skillOrderNumber">List order:</label>
                <select class="form-control" id="skillOrderNumber" name="skillOrderNumber">

                  @foreach($skills as $skill)

                    <option value="{{ $skill->id }}">Before {{ $skill->name }}</option>

                  @endforeach

                  <option value="{{ (count($skills) + 1) }}">Last</option>

                </select>
              </div>

              <div class="form-group">
                <label for="skillThumbnail" class="col-form-label btn btn-info btn-block">
                  <input type="file" class="form-control" id="skillThumbnail" name="skillThumbnail" accept="image/*"
                  onChange="showPreview(event, 'skillThumbnailPreview')">
                  <i class="fa fa-upload" aria-hidden="true"></i> Choose thumbnail
                </label>
              </div>

            </div>
            <div class="col-6">
              <img id="skillThumbnailPreview"/ class="img-thumbnail">
              <small><p id="skillErrorMessage"></p></small>
            </div>

          </div>
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onClick="addNewSkill(event)">Add new skill</button>
      </div>
    </div>
  </div>
</div>


<!-- EDIT SKILL MODAL -->

<div class="modal fade" id="editSkill" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit skill</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editSkillForm">
        <div class="container-fluid">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="editSkillName" class="col-form-label">Name:</label>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <input type="hidden" name="editSkillId" id="editSkillId">
                <input type="text" class="form-control" id="editSkillName" name="editSkillName">
              </div>

              <div class="form-group">
                <label for="editSkillExperience">Experience:</label>
                <select class="form-control" id="editSkillExperience" name="editSkillExperience">
                  <?php
                    for ($i = 0; $i < 11; $i++){
                      echo "<option value=".($i*10).">".($i*10)."%</option>";
                    }
                  ?>
                </select>
              </div>

              <div class="form-group">
                <label for="editSkillOrderNumber">List order:</label>
                <select class="form-control" id="editSkillOrderNumber" name="editSkillOrderNumber">

                  @foreach($skills as $skill)

                    <option value="{{ $skill->order_number }}">{{ $skill->order_number }}</option>

                  @endforeach


                </select>
              </div>

              <div class="form-group">
                <label for="editSkillThumbnail" class="col-form-label btn btn-info btn-block">
                  <input type="file" class="form-control" id="editSkillThumbnail" name="editSkillThumbnail" accept="image/*"
                  onChange="showPreview(event, 'editSkillThumbnailPreview')">
                  <i class="fa fa-upload" aria-hidden="true"></i> Choose thumbnail
                </label>
              </div>

            </div>
            <div class="col-6">
              <img id="editSkillThumbnailPreview"/ class="img-thumbnail">
              <small><p id="editSkillErrorMessage"></p></small>
            </div>

          </div>
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onClick="updateSkill(event)">Update skill</button>
      </div>
    </div>
  </div>
</div>



<!-- DELETE SKILL MODAL -->


<div class="modal fade" id="deleteSkill" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <h3 id="result-message">Are you sure you want to delete this skill?</h3>
        <input type="hidden" name="deleteIndex" id="deleteIndex" value="">
        <div class="row">
          <div class="col-auto mr-auto">
            <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Cancel</button>
          </div>
          <div class="col-auto mr-left">
            <button type="button" class="btn btn-primary mr-auto" onClick="deleteSkill()">Delete</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
