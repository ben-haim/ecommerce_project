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
        <!-- Navigation -->
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
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
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
                <img src="/assets/img/banner/1.png" height="414" width="100%" alt="...">
                <div class="carousel-caption">
                </div>
              </div>
              <div class="item">
                <img src="/assets/img/banner/2.png" height="414" width="100%" alt="...">
                <div class="carousel-caption">
                </div>
              </div>
              <div class="item">
                <img src="/assets/img/banner/3.png" height="414" width="100%" alt="...">
                <div class="carousel-caption">
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
                  <h4>Fuzz</h4>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="thumbnail category-display">
                <a href="/show/items/category/delay"><img src="/assets/img/main/2.png" height="99" width="148" alt="effect pedal"></a>
                <div class="caption">
                  <h4>Delay</h4>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="thumbnail category-display">
                <a href="/show/items/category/reverb"><img src="/assets/img/main/3.png" height="99" width="148" alt="effect pedal"></a>
                <div class="caption">
                  <h4>Reverb</h4>
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