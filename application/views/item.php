<?php 
  $this->load->view('partials/head');
?>
  <title>Item Page</title>
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
				<a href="/"><button class="btn btn-info">Go Back</button></a>
				<h2><?= $item['name']; ?></h2>
				<br>
								
				<div class="row">
				  <div class="col-sm-6 col-md-4">
				    <div class="thumbnail">
				      <img src="/assets/img/lg/<?= $item['img_name']; ?>">
				    </div>
				  </div>
					<div class="col-md-8">
						<h4><?= $item['name']; ?></h4>
						<p><?= $item['description']; ?></p>
						<div class="col-md-12">
							<form action="/addToCart" method="post" class="form-inline pull-right">
								<div class="form-group">
									<select name="quantity" class="form-control">
<?php 					for($i=1;$i<=5;$i++)
								{
?>									<option value="<?=$i;?>"><?=$i;?> ($<?= $item['price'] * $i ?>)</option>
<?php 					}
?>
  								</select>
                  <input type="hidden" name="id" value="<?= $item['id']; ?>">
  								<input class="btn btn-primary" type="submit" value="Add to Cart">
								</div>
							</form>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
				  <div class="col-sm-6 col-md-12">
					<h4>Similar Products:</h4>
<!-- Similar Items LOOP STARTS -->
<?php       foreach ($items as $item) 
            {
?>            <div class="col-sm-6 col-md-3 item">
                <div class="thumbnail">
                  <a href="/show/item/<?= $item['id']; ?>"><img src="/assets/img/md/<?= $item['img_name']; ?>" height="99" width="148" alt="effect pedal"></a>
                  <div class="caption">
                    <h4><?= $item['name']; ?></h4>
                    <p>$<?= $item['price']; ?></p>
 										<form action="/addToCart" method="post">
			                  <input type="hidden" name="id" value="<?= $item['id']; ?>">
			                  <input type="hidden" name="quantity" value="1">
			  								<input class="btn btn-info btn-block" type="submit" value="Quick Add">
										</form>
                  </div>
                </div>
              </div>
<?php 
            }
?>
<!-- Similar Items LOOP ENDS -->
				  </div>
				</div>
      </div>
    </div>
	</div>
	<hr>
</body>
</html>