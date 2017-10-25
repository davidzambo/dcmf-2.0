<div class="modal fade" id="addNewService" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add new Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="portfolioForm">
        <div class="container-fluid">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="serviceName" class="col-form-label-sm">Name:</label>
                {{ csrf_field() }}
                <input type="text" class="form-control" id="serviceName" name="serviceName">
              </div>

              <div class="form-group">
                <label for="serviceIcon" class="col-form-label-sm">Icon:</label>
                <input type="text" class="form-control" id="serviceIcon" name="serviceIcon">
              </div>

              <div class="form-group">
                <label for="serviceOrderNumber" class="col-form-label-sm">Order number:</label>
                <input type="text" class="form-control" id="serviceOrderNumber" name="serviceOrderNumber">
              </div>



            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="serviceDescription" class="col-form-label-sm">Long description:</label>
                <textarea name="serviceDescription" class="form-control" rows="8" cols="80" id="serviceDescription"></textarea>
              </div>
              <small><p class="errorMessage align-self-bottom text-center"></p></small>
            </div>

          </div>
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onClick="addNewPortfolio(event)">Add new portfolio</button>
      </div>
    </div>
  </div>
</div>
