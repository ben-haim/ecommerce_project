
    <?php $this->load->view('partials/head') ?>
    <title>Admin Login Page</title>
   </head>
   <body>

    <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
    	<h2>Please add a new product</h2>
    	<div class="row">
        <div class="box edit col-lg-6">
    	<form action='createNew' method='post'>
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name ="name" class="form-control">
    </div>
    <div class="form-group">
    <label for="description">Description</label>
    <textarea name ="description" class="form-control" id="textarea"></textarea>
  </div>
    <div class="form-group">
    <label for="categories">Category</label>
    <input type="text" name ="categories" class="form-control" >
  </div>
   <div class="form-group">
    <label for="price">Price</label>
    <input type="float" name ="price" class="form-control">
    </div>
   <div class="form-group">
    <label for="inventory">Inventory</label>
    <input type="number" name ="inventory" class="form-control">
    </div>
<div class="submit">
  <a class="btn btn-default" href="products">Cancel</a>
  <input type="submit" class="btn btn-default" value="Add">
</div>
</form>
</div>
</div> 

    </div><!-- /container -->
</div> 

      <footer>
        <p>&copy; Company 2014</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

</body>
</html>