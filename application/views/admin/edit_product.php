
    <?php $this->load->view('partials/head') ?>
    <title>Admin Login Page</title>
   </head>
   <body>

    <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
    	<h2>Edit Product - ID <?= $item['id'] ?></h2>
    	<div class="row">
        <div class="box edit col-lg-6">
    	<form action='editProduct' method='post'>
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name ="name" class="form-control" value="<?= $item['name'] ?>">
    </div>
    <div class="form-group">
    <label for="description">Description</label>
    <textarea rows="6" name ="description" class="form-control" id="textarea"><?= $item['description'] ?></textarea>
  </div>
    <div class="form-group">
    <label for="categories">Category</label>
    <input type="text" name ="categories" class="form-control" value="<?= $item['category'] ?>">
  </div>
  <div class="form-group">
    <label for="images">Images</label>
	    <input type="file" name="fileToUpload" id="fileToUpload">
	    <input type="submit" value="Upload Image" name="submit">
  </div>
<div class="submit">
  <a class="btn btn-default" href="products">Cancel</a>
  <input type="hidden" name="id" value="<?= $item['id'] ?>">
  <input type="submit" class="btn btn-default" value="Update">
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