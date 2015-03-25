<?php 
  $this->load->view('partials/head');
?>
  <title>Update Account</title>
</head>
<body>
<?php 
  $this->load->view('partials/navbar');
  $this->load->view('partials/messages');
  $this->load->view('partials/modal');
?>
  <div class="container"> 
    <div class="row">    
      <div class="col-lg-12">
        <h2>Add or Update Account Info</h2>
        <p>Use this form to add or update your billing and shipping information.</p>
        <br>
      </div>
    </div>
    <div class="row">    
      <div class="col-lg-6">
        <h2>Shipping Information</h2>
        <form action="/updateAccount" method="post">
          <div class="form-group">
            <label for="s_first_name">First Name</label>
            <input type="text" name="s_first_name" class="form-control" id="s_first_name" placeholder="First Name">
          </div>
          <div class="form-group">
            <label for="s_last_name">Last Name</label>
            <input type="text" name="s_last_name" class="form-control" id="s_last_name" placeholder="Last Name">
          </div>
          <div class="form-group">
            <label for="s_address">Address</label>
            <input type="text" name="s_address" class="form-control" id="s_address" placeholder="e.g. 1310 SW 147th St.">
          </div>
          <div class="form-group">
            <label for="s_city">City</label>
            <input type="text" name="s_city" class="form-control" id="s_city" placeholder="Enter City">
          </div>
          <div class="form-group">
            <label for="s_state">State</label>
            <input type="text" name="s_state" class="form-control" id="s_state" placeholder="Enter State">
          </div>
          <div class="form-group">
            <label for="s_zip">Zip Code</label>
            <input type="number" name="s_zip" class="form-control" id="s_zip" placeholder="Enter Zip">
          </div>
          <h2>Billing Information</h2>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="billingSame"> Same as Shipping
            </label>
          </div>
          <div class="form-group">
            <label for="b_first_name">First Name</label>
            <input type="text" name="b_first_name" class="form-control" id="b_first_name" placeholder="First Name">
          </div>
          <div class="form-group">
            <label for="b_last_name">Last Name</label>
            <input type="text" name="b_last_name" class="form-control" id="b_last_name" placeholder="Last Name">
          </div>
          <div class="form-group">
            <label for="b_address">Address</label>
            <input type="text" name="b_address" class="form-control" id="b_address" placeholder="e.g. 1310 SW 147th St.">
          </div>
          <div class="form-group">
            <label for="b_city">City</label>
            <input type="text" name="b_city" class="form-control" id="b_city" placeholder="Enter City">
          </div>
          <div class="form-group">
            <label for="b_state">State</label>
            <input type="text" name="b_state" class="form-control" id="b_state" placeholder="Enter State">
          </div>
          <div class="form-group">
            <label for="b_zip">Zip Code</label>
            <input type="number" name="b_zip" class="form-control" id="b_zip" placeholder="Enter Zip">
          </div>
          <input type="hidden" name="id" value="<?= $user['id']; ?>">
          <input type="submit" class="btn btn-success" value="Update">
        </form>
      </div>
    </div>
  </div>
  <hr>
</body>
</html>