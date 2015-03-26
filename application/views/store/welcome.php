<?php 
  $this->load->view('partials/head');
?>
  <title>Welcome - Hello Yeti!</title>
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
        <!-- left-sidebar -->
        <div class="col-lg-2">
        </div>

        <!-- MainContent -->
        <div class="col-lg-8">
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
                      <li><a href="/show/items/category/accessories">Accessories</a></li>
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
          <!-- Carousel -->
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <a href="/show/item/15/Fuzz"><img src="/assets/img/banner/1.png" height="414" width="100%" alt="..."></a>
                <div class="carousel-caption">
                </div>
              </div>
              <div class="item">
                <a href="/show/item/25/Reverb"><img src="/assets/img/banner/2.png" height="414" width="100%" alt="..."></a>
                <div class="carousel-caption">
                </div>
              </div>
              <div class="item">
                <a href="/show/item/16/Reverb"><img src="/assets/img/banner/3.png" height="414" width="100%" alt="...">
                <div class="carousel-caption"></a>
                </div>
              </div>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <br>
          <div class="row">      
            <div class="col-sm-6 col-md-4">
              <div class="thumbnail category-display">
                <a href="/show/items/category/fuzz"><img src="/assets/img/main/1.png" height="99" width="148" alt="effect pedal"></a>
                <div class="caption">
                  <h4>Fuzz Pedals</h4>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="thumbnail category-display">
                <a href="/show/items/category/delay"><img src="/assets/img/main/2.png" height="99" width="148" alt="effect pedal"></a>
                <div class="caption">
                  <h4>Delay Pedals</h4>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="thumbnail category-display">
                <a href="/show/items/category/distortion"><img src="/assets/img/main/3.png" height="99" width="148" alt="effect pedal"></a>
                <div class="caption">
                  <h4>Distortion Pedals</h4>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="thumbnail category-display">
                <a href="/show/items/category/fender"><img src="/assets/img/main/4.jpg" height="99" width="148" alt="effect pedal"></a>
                <div class="caption">
                  <h4>Fender Guitars</h4>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="thumbnail category-display">
                <a href="/show/items/category/gibson"><img src="/assets/img/main/5.png" height="99" width="148" alt="effect pedal"></a>
                <div class="caption">
                  <h4>Gibson Guitars</h4>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="thumbnail category-display">
                <a href="/show/items/category/accessories"><img src="/assets/img/main/6.png" height="99" width="148" alt="effect pedal"></a>
                <div class="caption">
                  <h4>Accessories</h4>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Main Content -->
        
        <!-- right-sidebar -->
        <div class="col-lg-2">
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