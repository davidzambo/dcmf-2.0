<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <form class="" action="login" method="post">
          <div class="form-group">
            <label for="username">Email:</label>
            {{ csrf_field() }}
            <input type="text" class="form-control" id="email" name="email" placeholder="username" required>
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
          </div>
          <div class="form-group row justify-content-between text-center">
            <div class="col-auto mr-auto">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" data-target="#login">Cancel</button>
            </div>
            <div class="col-auto">
              <button type="submit" class="btn btn-primary ml-auto">Login</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="js/login.js"></script>
