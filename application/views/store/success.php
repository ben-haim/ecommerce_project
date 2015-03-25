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
				<h2>Thank you! Your Order was successfully placed!</h3>
        <p>Order #890980982394KJOFK70809</p>
        <p>Please wait at least 5 months to hear back from us.</p>
        <p>We're sure, you'll enjoy the wait!</p>
        <h4>Did you forget to add something to your order?</h4>
        <a href="/"><button class="btn btn-warning">Continue Shopping Now</button></a>
      </div>
    </div>
  </div>