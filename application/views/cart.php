<?php 
  $this->load->view('partials/head');
?>
  <title>Secure Checout - Hello Yeti</title>
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
				<h2>Your Shopping Cart</h2>
				<br>
				<table class="table">
		      <thead>
		        <tr>
		          <th>#</th>
		          <th colspan="2">Item</th>
		          <th>Quantity</th>
		          <th>Item Price</th>
		          <th>Item Total</th>
		        </tr>
		      </thead>
		      <tbody>
<!-- LOOP BEGINS -->
<?php 			$items = $this->session->userdata('orders');
						$total = 0;
						$count = 0;
						foreach ($items as $key => $item) 
						{
							$query = "SELECT * FROM items LEFT JOIN photos ON photos_item_id = items.id  WHERE items.id = ?";
							$result = $this->db->query( $query, array($item['id']))->row_array();
							$price = $result['price'] * $item['quantity'];
							$total+=$price;
							$count++;
?>	        <tr>
		          <th scope="row"><?= $count; ?></th>
		          <td><img src="/assets/img/lg/<?= $result['img_name']; ?>" height="99" width="148" alt="effect pedal"></td>
		          <td><?= $result['name'] ?></td>
		          <td>
		          	<?= $item['quantity'] ?>
								<form action="removeFromCart" method="post">
									<input type="submit" class="link" value="remove">
									<input type="hidden" name="key" value="<?= $key ?>">
								</form>
		          </td>
		          <td><?= $result['price'] ?></td>
		          <td><?= $price ?></td>        
		        </tr>
<?php 		}
?>
<!-- LOOP ENDS -->
		        <tr>
		          <th scope="row"></th>
		          <td></td>
		          <td></td>
		          <td></td>
		          <td><b>Subtotal:</b></td>
							<td>$<?= $total ?></td>
		        </tr>
		      </tbody>
		    </table>
		   <a href="/"><button class="btn btn-warning pull-right">Continue Shopping</button></a>
			</div>
		</div>
		<div class="row">    
    	<div class="col-lg-6">
				<h2>Shipping Information</h2>
				<form action="/placeOrder" method="post">
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
				  <div class="form-group">
				    <label for="card">Credit Card Number</label>
				    <input type="number" name="card" class="form-control" id="card" placeholder="Enter Credit Card Number">
				  </div>
				  <div class="form-group">
				    <label for="security_code">Security Code</label>
				    <input type="number" name="security_code" class="form-control" id="security_code" placeholder="Enter Security Code">
				  </div>
				  <div class="form-group">
				    <label for="expiration">Expiration Date</label>
				    <input type="number" name="expiration" class="form-control" id="expiration" placeholder="Enter Expiration Data: MM/YY">
				  </div>
				  <button type="submit" class="btn btn-success pull-right">Pay</button>
				</form>
			</div>
    </div>
	</div>
  <hr>
</body>
</html>