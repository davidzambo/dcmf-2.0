<div class="modal fade" id="serviceModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add new Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="serviceForm">

          <div class="form-row">
            <div class="form-group col-4">
              <label for="serviceName" class="col-form-label-sm">Name: </label>
              {{ csrf_field() }}
              <input type="hidden" name="serviceId" value="">
              <input type="text" class="form-control" id="serviceName" name="serviceName">
            </div>
            <div class="form-group col-4">
              <label for="serviceIcon" class="col-form-label-sm">Icon: </label>
              <input type="text" class="form-control" id="serviceIcon" name="serviceIcon">
            </div>
            <div class="form-group col-4">
              <label for="serviceOrderNumber" class="col-form-label-sm">Order number: </label>
              <input type="text" class="form-control" id="serviceOrderNumber" name="serviceOrderNumber">
            </div>
          </div>


          <div class="form-group">
            <label for="serviceDescription" class="col-form-label-sm">Long description:</label>
            <textarea name="serviceDescription" class="form-control" rows="8" id="serviceDescription"></textarea>
          </div>
          <div class="form-group">
            <small><p class="errorMessage alert alert-danger align-self-bottom text-center"></p></small>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="addNewService">Add new service</button>
        <button type="button" class="btn btn-primary" id="updateService">Update service</button>
      </div>
    </div>
  </div>
</div>

<!-- DELETE SERVICE -->

<div class="modal fade" id="deleteService" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Delete service</h3>
      </div>
      <div class="modal-body text-center">
        <h3 id="result-message">Are you sure you want to delete this service?</h3>
        <input type="hidden" name="deleteServiceIndex" id="deleteServiceIndex" value="">
        <div class="row">
          <div class="col-auto mr-auto">
            <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Cancel</button>
          </div>
          <div class="col-auto mr-left">
            <button type="button" class="btn btn-primary mr-auto" data-token="{{ csrf_token() }}" data-dismiss="modal" onClick="deleteService(event)">Delete</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- CKEDITOR SCRIPTS -->


<script>
$('#addNewService').hide();
$('#updateService').hide();
</script>
