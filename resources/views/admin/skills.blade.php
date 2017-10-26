<div class="modal fade" id="skillModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add new skilla</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="skillForm" action="valami" method="post">
          <div class="form-group row">
            <label for="skillName" class="col-sm-4 col-form-label">Name:</label>
            {{ csrf_field() }}
            <div class="col-sm-8">
              <input type="hidden" name="skillId" id="skillId">
              <input type="text" class="form-control" id="skillName" name="skillName" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="skillExperience" class="col-sm-4 col-form-label">Experience:</label>
            <div class="col-sm-8">
              <select class="form-control" id="skillExperience" name="skillExperience" required>
                <?php
                for ($i = 0; $i < 21; $i++){
                  echo "<option value=".($i*5).">".($i*5)."%</option>";
                }
                ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="skillOrderNumber" class="col-sm-4 col-form-label">Order number:</label>
            <div class="col-sm-8">
              <input type="text" name="skillOrderNumber" id="skillOrderNumber" class="form-control" value="" required>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" data-toggle="modal" id="updateSkill">Update skill</button>
        <button type="submit" class="btn btn-primary" data-toggle="modal" id="newSkill">Add new skill</button>
        </form>
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
