<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sasol E-commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="./images/logo3.jpg">

</head>
<body>

<!--NavBar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light  py-3 fixed-top">
 <!--<img src= "./images/logo2.jpg"/> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      
       <li class="nav-item">
        <a class="nav-link" href="shop.php>Shop</a>
      </li>
                
       <li class="nav-item">
         <a class="nav-link" href="contact.php">Contact Us</a>
      </li>
               
       <li class="nav-item">
        <a href="cart.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
        <a href="register.html"><i class="fa fa-user" aria-hidden="true"></i></a>
      </li>
      
             
    </ul>
   
  </div>
</nav>
<!--Home-->
<section id = "home">
  <div class = "container">
    <h5>NEW ARRIVALS</h5>
    <h1><span>Best Prices</span>This Season</h1>
    <p>Sasol offers the very best products for affordable prices</p>
    <a href ="shop.php"><button>Shop Now</button></a>
  </div>
</section>


 <!--new-->
<section id="new" class ="w-100">
  <div class="row p-8 m-0">
  <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
  <img class="img-fluid" src="./images/lpg_im.jpg"/>
   <div class="details">
   <h2>LPG gas available</h2>
    <a href ="z.lpggas.php"><button class="text-uppercase">Shop Now</button></a> 
   </div> 
  </div>
 <!--two-->
  <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
  <img class="img-fluid" src="./images/Bitumen.jpg"/>
   <div class="details">
   <h2>Bitumen fluids available</h2>
    <a href ="z.Bitumen.php"><button class="text-uppercase">Shop Now</button></a>    
   </div> 
  </div>

  <!--three-->
   <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
  <img class="img-fluid" src="./images/kerosene.jpg"/>
   <div class="details">
   <h2>Kerosene fluids available</h2>
    <a href ="z.Kerosene.php"><button class="text-uppercase">Shop Now</button></a>  
   </div> 
  </div>
  </div>
</section>

<!--Featured-->
<section id="featured" class="my-5 pb-5">
<div class="container text-center mt-5 py-5">
  <h3>Our Featured</h3>
  <hr>
  <p>Here you can check out our new featured products</p>
</div>



<div class="row mx-auto container-fluid" >
  <div class="product text-center col-lg-3 col-md-4 col-sm-12">
  <img class="img-fluid mb-3 "src="./images/Motor_fuel1.jpg"/>
  <div class="star">
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
  </div>
  <h5 class="p-name">Motor Fuels</h5>
  <h4 class="p-price">R 15000.00</h4>
  <a href ="z.motorfuels.php"><button class="buy-btn">Buy</button></a>
  </div>



</div>
</section>

<!--banner-->

<section id ="banner" class="my-5 py-5">
  <div class="container">
    <h4>MID SEASON'S SALE</h4>
    <h1>Winter sale <br> Up to 30% off</h1>
    <a href ="shop.php"><button type="text-uppercase">shop now</button></a>
  </div>
</section>

<!--footer-->

<footer class="mt-5 py-5">
  <div class="row container mx-auto pt-5">
    <div class="footer-one col-lg-3 col-md-6 col-sm-12">
      <img src="./images/logo3.jpg"/>
      <p class="pt-3"><br>We provide the very best high end products for our clients</p>
    </div>

       <div class="footer-one col-lg-3 col-md-6 col-sm-12">
      <h5 class="pb-2">Featured</h5>
      <ul class ="text-uppercase">
        <li><a href="#">new arrivals</a></li>
      </ul>
          </div>
  <div class="footer-one col-lg-3 col-md-6 col-sm-12">
  <h5 class="pb-2">Contact Us</h5>
  <div>
    <h6 class="text-uppercase">Address</h6>
    <p>1234 Street, Sandton </p>
  </div>

    <div>
    <h6 class="text-uppercase">Phone</h6>
    <p> 087 257 3367</p>
  </div>

  
    <div>
    <h6 class="text-uppercase">Email</h6>
    <p> sasol@gmail.com</p>
  </div>
  </div>

   <div class="footer-one col-lg-3 col-md-6 col-sm-12">
   <h5 class="pb-2"></h5>
   </div>   
  </div>


<div class="copyright mt-5">
<div class="row container mx-auto">
 
    <div class="col-lg-3 col-md-5 col-sm-12 mb-4 text-nowrap mb-2">
    <p>eCommerce @ 2024 All Right Reserved</p>
  </div>
    <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
   <a href="https://www.facebook.com/SasolLTD/"><i class="fab fa-facebook"></i></a>
   <a href="https://www.instagram.com/sasolsa/"><i class="fab fa-instagram"></i></a>
   <a href="https://x.com/sasolsa?lang=en"><i class="fab fa-twitter"></i></a>
  </div>
</div>
  
</div>

</footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>