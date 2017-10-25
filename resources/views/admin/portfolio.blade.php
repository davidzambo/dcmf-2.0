<div class="modal fade" id="addNewPortfolio" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add new portfolio</h5>
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
                <label for="portfolioName" class="col-form-label-sm">Name:</label>
                {{ csrf_field() }}
                <input type="text" class="form-control" id="portfolioName" name="portfolioName">
              </div>

              <div class="form-group">
                <label for="portfolioLink" class="col-form-label-sm">Link:</label>
                <input type="text" class="form-control" id="portfolioLink" name="portfolioLink">
              </div>

              <div class="form-group">
                <label for="portfolioShortDescription" class="col-form-label-sm">Short description:</label>
                <input type="text" class="form-control" id="portfolioShortDescription" name="portfolioShortDescription">
              </div>

              <div class="form-group">
                <label for="portfolioLongDescription" class="col-form-label-sm">Long description:</label>
                <textarea name="portfolioLongDescription" class="form-control" rows="8" cols="80" id="portfolioLongDescription" name="portfolioLongDescription"></textarea>
              </div>

              <div class="form-group">
                <label for="portfolioThumbnail" class="col-form-label-sm btn btn-primary btn-block">
                  <input type="file" class="form-control" id="portfolioThumbnail" name="portfolioThumbnail" accept="image/*"
                  onChange="showPreview(event, 'portfolioThumbnailPreview')">
                  <i class="fa fa-upload" aria-hidden="true"></i> Choose thumbnail
                </label>
              </div>

            </div>
            <div class="col-6">
              <img id="portfolioThumbnailPreview"/ class="img-thumbnail" style="display:none;">
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

<!-- DELETE PORTFOLIO -->

<div class="modal fade" id="deletePortfolio" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Delete portfolio</h3>
      </div>
      <div class="modal-body text-center">
        <h3 id="result-message">Are you sure you want to delete this portfolio element?</h3>
        <input type="hidden" name="deletePortfolioIndex" id="deletePortfolioIndex" value="">
        <div class="row">
          <div class="col-auto mr-auto">
            <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Cancel</button>
          </div>
          <div class="col-auto mr-left">
            <button type="button" class="btn btn-primary mr-auto" data-token="{{ csrf_token() }}" data-dismiss="modal" onClick="deletePortfolio(event)">Delete</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- EDIT PORTFOLIO -->
<div class="modal fade" id="editPortfolio" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit portfolio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editPortfolioForm">
        <div class="container-fluid">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="editPortfolioName" class="col-form-label-sm">Name:</label>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <input type="hidden" name="editPortfolioId" value="">
                <input type="text" class="form-control" id="editPortfolioName" name="editPortfolioName">
              </div>

              <div class="form-group">
                <label for="editPortfolioLink" class="col-form-label-sm">Link:</label>
                <input type="text" class="form-control" id="editPortfolioLink" name="editPortfolioLink">
              </div>

              <div class="form-group">
                <label for="editPortfolioShortDescription" class="col-form-label-sm">Short description:</label>
                <input type="text" class="form-control" id="editPortfolioShortDescription" name="editPortfolioShortDescription">
              </div>

              <div class="form-group">
                <label for="editPortfolioLongDescription" class="col-form-label-sm">Long description:</label>
                <textarea name="editPortfolioLongDescription" class="form-control" rows="4" cols="80" id="editPortfolioLongDescription" id="editPortfolioLongDescription"></textarea>
              </div>

              <div class="form-group">
                <label for="editPortfolioThumbnail" class="col-form-label-sm btn btn-primary btn-block">
                  <input type="file" class="form-control" id="editPortfolioThumbnail" name="editPortfolioThumbnail" accept="image/*"
                  onChange="showPreview(event, 'editPortfolioThumbnailPreview')">
                  <i class="fa fa-upload" aria-hidden="true"></i> Choose thumbnail
                </label>
              </div>

            </div>
            <div class="col-6">
              <img id="editPortfolioThumbnailPreview"/ class="img-thumbnail">
              <small><p class="errorMessage align-self-bottom text-center"></p></small>
            </div>

          </div>
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onClick="updatePortfolio(event)">Update portfolio</button>
      </div>
    </div>
  </div>
</div>
