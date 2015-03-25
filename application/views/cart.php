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
			<form action="/placeOrder" method="post">
				  <script
				    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
				    data-key="pk_test_bkpHozSLIXoN2DHJgihojEWP"
				    data-amount="<?= $total *100 ?>"
				    data-name="Hello Yeti"
				    data-description="2 widgets ($<?= $total ?>)"
				    data-image="/assets/img/main/store.png">
				  </script>
				</form>
			</div>
    </div>
	</div>
  <hr>
</body>
</html>