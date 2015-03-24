<?php 
  $this->load->view('partials/head');
?>
  <title>Products Page</title>
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

        <!-- sidebar -->
        <div class="col-lg-3">
          <form action="#" method="post">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit">Search!</button>
              </span>
            </div><!-- /input-group -->
          </form>
          <br>
          <div class="list-group">
            <a href="/" class="list-group-item active">All Pedals</a>
            <a href="/show/items/category/delay" class="list-group-item">Delay</a>
            <a href="/show/items/category/fuzz" class="list-group-item">Fuzz</a>
            <a href="/show/items/category/reverb" class="list-group-item">Reverb</a>
            <a href="/show/items/category/fuzz" class="list-group-item">Show All</a>
          </div>
        </div>

        <!-- maincontent -->
        <div class="col-lg-9">

          <div class="col-lg-12">
            <div class="header clearfix">
              <nav>
                <ul class="nav nav-pills pull-right">
                  <li role="presentation"><a href="#">first</a></li>
                  <li role="presentation"><a href="#">next</a></li>
                  <li role="presentation"><a href="#">previous</a></li>
                </ul>
              </nav>
              <h3 class="text-muted">Delay Pedals (Page 1)</h3>
             </div>
          </div>
          
          <div class="row">
<!-- item loop begins -->
<?php     foreach ($items as $item)
          {
?>          <div class="col-sm-6 col-md-4 item">
              <div class="thumbnail product-display">
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
<!-- item loop ENDS -->         
          </div>
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
              <li><a href="#">6</a></li>
              <li><a href="#">7</a></li>
              <li><a href="#">8</a></li>
              <li><a href="#">9</a></li>
              <li><a href="#">10</a></li>
              <li>
                <a href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div><!-- col-lg-12 -->
    </div><!-- /.row -->
    <br>
    <hr>
    <footer>
      <p>&copy; Company 2014</p>
    </footer>
  </div><!--/.container-->
</body>
</html>


<!-- <div class="jumbotron">
<h1>Hello, world!</h1>
<p>This is an example to show the potential of an offcanvas layout pattern in Bootstrap. Try some responsive-range viewport sizes to see it in action.</p>
</div> -->