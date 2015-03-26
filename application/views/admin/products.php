  <?php $this->load->view('partials/head') ?>
  <title>Products List</title>
<script>
		$(document).ready(function() {
			$('button.change-img').on('click', function() {
				var id = $(this).val();
				$('#passId').val(id);
			})
		});
	</script>
<head>
 <?php $this->load->view('partials/header_logoff') ?>
<?php $this->load->view('partials/messages') ?>
<?php $this->load->view('partials/modal') ?>

  <div class="jumbotron">
 
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-6">
			<br>
			<form action="/search_products" method="post">
	    	    <div class="input-group">
			        <input type="text" name="search" placeholder="Search for...">
			        <input type="submit" value="Go!">
			    </div>
	        </form>
        	<br>
		  </div>
      <div class="col-md-6">
		  <br>
		  <button type="submit" class="btn btn-default pull-right"><a class='signin' href='/addProduct'>Add new product</a></button>
	  </div>

<div class="col-md-12">
<table class="table table-bordered">
	<thead class='order'>
		<tr>
			<th>Picture</th>
			<th>ID</th>
			<th>Name</th>
			<th>Inventory Count</th>
			<th>Quantity sold</th>
			<th>action</th>
		</tr>
	</thead>
	<tbody>
<!-- loops begin -->
<?php 
foreach ($products as $product) {
 ?>
		<tr>
			<td>
				<img src="/assets/img/lg/<?= $product['img_name'] ?>" height="60px" width="80px">
				<a class="change-img btn-block" data-toggle="modal" data-target=".upload-photo" value="<?= $product['id']; ?>">Change Image</a>
			</td>
			<td><?= $product['id'] ?></td>
			<td><?= $product['name'] ?></td>
			<td><?= $product['inventory'] ?></td>
			<td>1000</td>
			<td>
				<form class="inline" action="/edit" method="post">
				<input type="hidden" name="id" value="<?= $product['id'] ?>" > 
				<input id="input" type="submit" value="edit" > 
			</form>| 
				<a class="inline" href='/delete/<?= $product['id'] ?>'>remove</a>
			</td>
		</tr>
<?php 
}
 ?>

<!-- loops end -->
	</tbody>
</table>
<nav>
  <ul class="pager">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
</div>

</div>
</div>
</div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

</body>
</html>