<div class="container">
  <div class="row">
    <div class="col-auto ml-auto">
      <button class="btn btn-secondary clickable fa fa-2x fa-sign-out" id="logout-button" aria-hidden="true" data-toggle="modal" data-target="#logoutModal"></button>
    </div>
  </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="logoutModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="login/1" method="post">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <input type="hidden" name="username" value="David">
          <p>Are you sure you would like to logout?</p>
          <div class="row">
            <div class="col-auto mr-auto">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
            <div class="col-auto">
              <button type="submit" class="btn btn-primary">Logout</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
