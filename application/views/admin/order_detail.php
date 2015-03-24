  <?php $this->load->view('partials/head') ?>
  <title>Dashboard Orders</title>
 <?php $this->load->view('partials/header_logoff') ?>
<?php $this->load->view('partials/messages') ?>

<div class="jumbotron">
    <div class="container">
      <!-- Example row of columns -->
        <div class="row">
	        <div class="box col-md-4">
				<h3>Order ID: <?= $order['id'] ?></h3>
	        	<br>
	        	<h4>Customer shipping info:</h4>
	        		<h4>name: <?= $order['s_first_name'] ?> <?= $order['s_last_name'] ?></h4>
	    			<h4>address: <?= $order['s_address'] ?></h4>
					<h4>city: <?= $order['s_city'] ?></h4>
					<h4>state: <?= $order['s_state'] ?></h4>
					<h4>zip: <?= $order['s_zip'] ?></h4>
				<br>
	        	<h4>Customer billing info:</h4>
	        		<h4>name: <?= $order['b_first_name'] ?> <?= $order['b_last_name'] ?></h4>
	    			<h4>address: <?= $order['b_address'] ?></h4>
					<h4>city: <?= $order['b_city'] ?></h4>
					<h4>state: <?= $order['b_state'] ?></h4>
					<h4>zip: <?= $order['b_zip'] ?></h4>
				<br>
			</div>

		    <div class="select-order col-md-6 pull-right">
		      	<table class="table table-bordered">
				    <thead class='order'>
						<tr>
							<th>ID</th>
							<th>Item</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<!-- loops begin -->
<?php 
$total=0;
foreach ($products as $product) {
 ?>
						<tr>
							<td><?= $product['item_id'] ?></td>
							<td><?= $product['name'] ?></td>
							<td>$<?= $product['price'] ?></td>
							<td><?= $product['quantity'] ?></td>
							<td>$<?= $itemtotal = $product['price'] * $product['quantity'] ?></td>
						</tr>

<?php 
$total += $itemtotal;
}
 ?>
		<!-- loops end -->
					</tbody>
				</table>
			</div>
			<div class="box order-detail pull-right col-md-2">
			  	<h4>Subtotal: $<?= $total ?></h4>
			  	<h4>Shipping: $1.00</h4>
			  	<h4>Total Price: $<?= $total + 1.00 ?></h4>
			</div>
			<div class="box status order-detail col-md-3">
			  	<h4>Status: <?= $order['status'] ?></h4>
			</div>
		</div>
	</div>
</div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

</body>
</html>