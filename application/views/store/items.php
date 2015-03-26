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
          <div class="list-group">
            <a href="/getAllItems" class="list-group-item active">All Pedals</a>
            <a href="/show/items/category/fuzz" class="list-group-item">Fuzz Pedals</a>
            <a href="/show/items/category/delay" class="list-group-item">Delay Pedals</a>
            <a href="/show/items/category/distortion" class="list-group-item">Distortion Pedals</a>
          </div>
        </div>

        <!-- maincontent -->
        <div class="col-lg-9">
          <nav class="navbar navbar-default">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <ul class="nav navbar-nav">
                  <li><a href="/getAllItems">All Pedals</a></li>
                </ul>
                  <ul class="nav navbar-nav">
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Effects<span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="/show/items/category/fuzz">Fuzz Pedals</a></li>
                        <li><a href="/show/items/category/delay">Delay Pedals</a></li>
                        <li><a href="/show/items/category/distortion">Distortion Pedals</a></li>
                        <li class="divider"></li>
                        <li><a href="/getAllItems">All Pedals</a></li>
                      </ul>
                    </li>
                  </ul>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Guitars<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="/show/items/category/fender">Fender Guitars</a></li>
                      <li><a href="/show/items/category/gibson">Gibson Guitars</a></li>
                      <li class="divider"></li>
                    </ul>
                  </li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                <form action="/search_items" method="post" class="navbar-form navbar-right" id="search-bar" role="search">
                  <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Search">
                  </div>
                  <button type="submit" class="btn btn-default">Submit</button>
                </form>
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>
          
          <div class="row">
<!-- item loop begins -->
<?php     foreach ($items as $item)
          {
?>          <div class="col-sm-6 col-md-4 item">
              <div class="thumbnail product-display">
                <a href="/show/item/<?= $item['id']; ?>/<?= $item['category']; ?>"><img src="/assets/img/lg/<?= $item['img_name']; ?>" height="99" width="148" alt="effect pedal"></a>
                <div class="caption">
                  <h4><?= $item['name']; ?></h4>
                  <p>$<?= $item['price']; ?></p>
                  <form action="/addToCart" method="post">
                        <input type="hidden" name="id" value="<?= $item['id']; ?>">
                        <input type="hidden" name="quantity" value="1">
                        <input class="btn btn-info btn-block" type="submit" value="Add to Cart">
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
<?php 
              if(isset($total_items)) {
                $count = 1;
                for ($i=0;$i<$total_items;$i+=6)
                {
                  $url = "<li><a class='pagination' href='/items/getAllItems/" . $count;
                  $url = $url . "'>" . $count . "</a></li>";
                  echo $url;
                  $count++;
                }
              }
?>
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