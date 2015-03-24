<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Hello Yeti</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <div class="navbar-form navbar-right">
<?php   if(!$this->session->userdata('logged_in') == TRUE)
        {
?>        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".sign-in">Sign In</button>
<?php   }
        else
        {
?>        <a href="/logOut"><button type="button" class="btn btn-primary">Log Out</button></a>
<?php        
        }
        $cart = $this->session->userdata('orders');
        if(isset($cart)) {
        $cartTotal = 0;

        foreach ($cart as $key => $value) 
        {
          $quantity = $cart[$key]['quantity'];
          $cartTotal += $quantity;
        }
        }
?>
        <a href="/cart"><button type="submit" class="btn btn-info">Bag (<?= $cartTotal ?>)</button></a>
      </div>
    </div><!--/.navbar-collapse -->
  </div>
</nav>

