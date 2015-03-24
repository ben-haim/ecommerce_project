  <?php $this->load->view('partials/head') ?>
  <title>Dashboard Orders</title>
 <?php $this->load->view('partials/header_logoff') ?>
<?php $this->load->view('partials/messages') ?>

  <div class="jumbotron">
 
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-6">
			<br>
			<form action="search_order" method="post">
	    	    <div class="input-group">
			        <input type="text" name="search" placeholder="Search for...">
			        <input type="submit" value="Go!">
			    </div>
	        </form>
        	<br>
		  </div>
      <div class="select-order col-md-6 pull-right">
		  <select class="btn btn-default btn-sm dropdown-toggle">
		  	<option>Show All</option>
		  	<option>Order in process</option>
		  	<option>Shipped</option>
		  </select>
	  </div>

<div class="col-md-12">
<table class="table table-bordered">
	<thead class='order'>
		<tr>
			<th>Order ID</th>
			<th>Name</th>
			<th>Date</th>
			<th>Billing Adress</th>
			<th>Total</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
<!-- loops begin -->
<?php 
foreach ($orders as $order) {
 ?>
		<tr>
			<td>
			<form class="inline" action="/order" method="post">
				<input type="hidden" name="id" value="<?= $order['id'] ?>" > 
				<input id="input" type="submit" value="<?= $order['id'] ?>" > 
			</form>
			</td>
			<td><?= $order['s_first_name'] ?></td>
			<td><?= $order['created_at'] ?></td>
			<td><?= $order['s_address'] ?></td>
			<td><?= $order['amount'] ?></td>
			<td><select>
					<option><?= $order['status'] ?></option>
					<option>Shipped</option>
				  	<option>Order in process</option>
				  	<option>Cancelled</option>
				</select>
			</td>
		</tr>
<?php 
}
 ?>

<!-- loops end -->
	</tbody>
</table>
<nav>
  <ul class="pagination">
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