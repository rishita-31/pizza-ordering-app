<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Pizza DELICIOUS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">

  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/ionicons.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">


  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html"><span
          class="flaticon-pizza-1 mr-1"></span>Pizza<br><small>Delicious</small></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
        aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="menu.html" class="nav-link">Menu</a></li>
          <li class="nav-item"><a href="services.html" class="nav-link">Services</a></li>
          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
          <li class="nav-item active"><a href="order.php" class="nav-link">Cart</a></li>
          <li class="nav-item"><a href="login.php" class="nav-link">Log in</a></li>

        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-lg-12 heading-section ftco-animate text-center my-5">
          <h2 class="mb-4">Your Cart</h2>
        </div>
        <div class="col-lg-9">
          <table class="table table-dark table-striped">
            <thead class="text-center">
              <tr>
                <th scope="col">Serial No.</th>
                <th scope="col">Item</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">Remove</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <?php 
              if(isset($_SESSION['cart'])){
                foreach($_SESSION['cart'] as $key => $value) 
                {
                  $sr=$key+1;
                  echo "
                    <tr>
                      <td>$sr</td>
                      <td>$value[pname]</td>

                      <td>$value[price]<input type='hidden' class='iprice' value='$value[price]'></td>
                      
                      <td>
                        <form action='index.php' method='POST'>
                          <input class='text-center iquantity' onchange='this.form.submit()' name='Mod_Quantity' type='number' name='quantity' value='$value[quantity]' min='1' max='15'>
                          <input type='hidden' name='pname' value='$value[pname]'>
                        </form>
                          
                        
                      </td>
                      
                      <td class='itotal'>0</td>
                      
                      <td>
                        <form action='index.php' method='POST'>
                          <button name='remove_item' class='btn btn-sm btn-danger'>REMOVE</button>
                          <input type='hidden' name='pname' value='$value[pname]'>
                        </form>
                      </td>
                    </tr>
                  ";
                }
              }
              ?>
            </tbody>
          </table>
        </div>
        <div class="col-lg-3" style="color:aliceblue">
          <div class="border p-4" style="border-radius:15px">
            <h4>GRAND TOTAL:</h4>
            <h5 id="gtotal"></h5><br>
            <?php  
              if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0){
            ?>
            <form action="purchase.php" method="POST">
              <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="fullname" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="tel" name="phonenumber" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" name="youraddress" class="form-control" required>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="pay_mode" value="COD" checked>
                <label class="form-check-label">
                  Cash on Delivery
                </label>
              </div>
              <button class="btn btn-primary btn-block" name="purchase">Place Order</button>
            </form>
            <?php
              }
            ?>
          </div>
          
          
        </div>
      </div>
    </div>
  </section>


  <footer class="footer" style="padding:20px; text-align:center; margin:auto; color:grey; font-size:15px">
      <div class="row">
        <div class="col-md-12 text-center">
          <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Pizza DELICIOUS</p>
        </div>
      </div>
  
    </footer>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#F96D00" />
    </svg></div>
  <script>
    var gt=0;
    var iprice = document.getElementsByClassName('iprice');
    var iquantity = document.getElementsByClassName('iquantity');
    var itotal = document.getElementsByClassName('itotal');
    var gtotal = document.getElementById('gtotal');
    function subTotal() {
      gt=0;
      for(i=0;i<iprice.length;i++){
        itotal[i].innerText = (iprice[i].value)*(iquantity[i].value);
        gt = gt + (iprice[i].value)*(iquantity[i].value);
      }
      gtotal.innerText=gt;
    }
    subTotal();
  </script>
  <script src="js/logic/script.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>