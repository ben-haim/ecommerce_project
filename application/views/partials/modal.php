<div class="modal fade sign-in" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Returning Customers: Sign In</h4>
      </div>
      <div class="modal-body">
        <form action="/signIn" method="post">
          <div class="form-group">
            <label for="email">Email Address:</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="e.g. barack.obama@gmail.com">
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
          </div>
          <input type="submit" class="btn btn-info" value="Sign In">
        </form>
      </div>
      <div class="modal-footer">
        <a href="/register" class="pull-left">Don't have an account? Sign up today!</a>
      </div>
    </div>
  </div>
</div>