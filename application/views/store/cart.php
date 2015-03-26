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
				<h2 class="inline">Your Shopping Cart</h2>
				 <a href="/"><button class="btn btn-warning pull-right inline">Continue Shopping</button></a>
				<br>
				<br>
<?php 	
				$cart = $this->session->userdata('orders');
				if(count($cart) == 0)
				{
?>
				<h5>Your cart is currently empty. <a href="/">Continue Shopping</a></h5>
<?php 
}
else
{

?>
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
		          <td>
		          	 <a href="/show/item/<?= $result['id']; ?>/<?= $result['category']; ?>"><img src="/assets/img/lg/<?= $result['img_name']; ?>" height="99" width="148" alt="effect pedal"></a>
		          </td>
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
		        <tr>
		          <th scope="row"></th>
		          <td></td>
		          <td></td>
		          <td></td>
		          <td><b>Shipping:</b></td>
							<td>$1.00</td>
		        </tr>
		        <tr>
		          <th scope="row"></th>
		          <td></td>
		          <td></td>
		          <td></td>
		          <td><b>Total:</b></td>
							<td>$<?= $total +1 ?></td>
		        </tr>
		      </tbody>
		    </table>
			</div>
		
<?php 	if($this->session->userdata('logged_in') == TRUE)
				{
?>				<div class="row">    
			    	<div class="col-lg-12">
							<form action="/placeOrder" method="post" class="pull-right">
								<input type="hidden" name="amount" value="<?= $total ?>">
								<input type="hidden" name="customer_id" value="<?= $this->session->userdata('id'); ?>">
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
<?php 	}
				else
				{
?>			<div class="container">
					<div class="row">    
				    <div class="col-lg-12">
				   	<div class="col-lg-8"></div> 
							<div class="col-lg-4" style="text-align: right">	
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".sign-in">Sign In</button>
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".register-user">Register</button>
									<br>
									<br>
									<p>Please Sign In or Register to Checkout</p>
							</div>
						</div>	
					</div>
				</div>
<?php
				}
			}
?>	

		</div>
	</div>
  <hr>
</body>
</html>