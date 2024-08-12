<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sasol Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="./images/logo3.jpg">
   <style>
        .product{
        width: 10%;
        height:auto;
        box-sizing: border-box;
        object-fit: cover
        }

    </style>

</head>

<body>
<!-- NavBar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light py-3 fixed-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="shop.php">Shop</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
            <li class="nav-item">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <i class="fa fa-user" aria-hidden="true"></i>
            </li>


        </ul>
    </div>
</nav>

<!-- Featured -->
<section id="featured" class="my-5 py-5">
    <div class="container mt-5 py-5">
        <h3>Our Featured</h3>
        <hr>
        <p>Here you can check out our new featured products</p>
    </div>
    <div class="container-fluid">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Rating</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Product 1 -->
                <tr>
                    <td><img class="img-fluid mb-3 product" src="./images/Motor_fuel1.jpg" alt="Motor Fuels"/></td>
                    <td>Motor Fuels</td>
                    <td>R 15000.00</td>
                    <td>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </td>
                    <td><a href = "z.motorfuels.php"><button class="buy-btn btn btn-primary">Buy</button></a></td>
                </tr>
                <!-- Product 2 -->
                <tr>
                    <td><img class="img-fluid mb-3 product" src="./images/GTL.png" alt="GTL"/></td>
                    <td>GTL</td>
                    <td>R 15000.00</td>
                    <td>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </td>
                    <td><a href = "z.gtl.php"><button class="buy-btn btn btn-primary">Buy</button></a></td>
                </tr>
                <!-- Product 3 -->
                <tr>
                    <td><img class="img-fluid mb-3 product" src="./images/Gas.jpg" alt="Piped Gas"/></td>
                    <td>Piped Gas</td>
                    <td>R 15000.00</td>
                    <td>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </td>
                    <td><a href = "z.pipedgas.php"><button class="buy-btn btn btn-primary">Buy</button></a></td>
                </tr>
                <!-- Product 4 -->
                <tr>
                    <td><img class="img-fluid mb-3 product" src="./images/Lubricant.jpg" alt="Lubricant"/></td>
                    <td>Lubricant</td>
                    <td>R 15000.00</td>
                    <td>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </td>
                    <td><a href = "z.Lubricant.php"><button class="buy-btn btn btn-primary">Buy</button></a></td>
                </tr>
                <!-- Product 5 -->
                <tr>
                    <td><img class="img-fluid mb-3 product" src="./images/special_gas.jpg" alt="Specialty Gas"/></td>
                    <td>Specialty Gas</td>
                    <td>R 17500.00</td>
                    <td>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </td>
                    <td><a href ="z.specialtygas.php"><button class="buy-btn btn btn-primary">Buy</button></a></td>
                </tr>
                <!-- Product 6 -->
                <tr>
                    <td><img class="img-fluid mb-3 product" src="./images/fuel_oils.jpg" alt="Fuel Oils"/></td>
                    <td>Fuel Oils</td>
                    <td>R 10000.00</td>
                    <td>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </td>
                    <td><a href ="z.fueloils.php"><button class="buy-btn btn btn-primary">Buy</button></a></td>
                </tr>
                <!-- Product 7 -->
                <tr>
                    <td><img class="img-fluid mb-3 product" src="./images/lpg.jpg" alt="LPG Gas"/></td>
                    <td>LPG Gas</td>
                    <td>R 10000.00</td>
                    <td>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </td>
                    <td><a href="z.lpggas.php"><button class="buy-btn btn btn-primary">Buy</button></a></td>
                </tr>
                <!-- Product 8 -->
                <a>
                    <td><img class="img-fluid mb-3 product" src="./images/Bitumen.jpg" alt="Bitumen Fluids"/></td>
                    <td>Bitumen Fluids</td>
                    <td>R 10000.00</td>
                    <td>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </td>
                    <td><a href="z.Bitumen.php"><button class="buy-btn btn btn-primary">Buy</button></a></td>
                </tr>
                <!-- Product 9 -->
                <tr>
                    <td><img class="img-fluid mb-3 product" src="./images/kerosene.jpg" alt="Kerosene fluid"/></td>
                    <td>Kerosene fluid</td>
                    <td>R 10000.00</td>
                    <td>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </td>
                    <td><a href="z.Kerosene.php"><button class="buy-btn btn btn-primary">Buy</button></a></td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
<!-- Footer -->
<footer class="mt-5 py-5">
    <div class="row container mx-auto pt-5">
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">

            <img src="./images/logo3.jpg"/>
            <p class="pt-3"><br>We provide the very best high end products for our clients</p>

        </div>
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2">Featured</h5>
            <ul class="text-uppercase">
                <li><a href="#">New Arrivals</a></li>
            </ul>

        </div>
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2">Contact Us</h5>
            <div>
                <h6 class="text-uppercase">Address</h6>
                <p>1234 Street, Sandton</p>
            </div>
            <div>
                <h6 class="text-uppercase">Phone</h6>
                <p>087 257 3367</p>
            </div>
            <div>
                <h6 class="text-uppercase">Email</h6>
                <p>sasol@gmail.com</p>
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
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const buyButtons = document.querySelectorAll('.buy-btn');

        buyButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                const productElement = event.target.closest('tr');
                const productName = productElement.querySelector('td:nth-child(2)').textContent;
                const productPrice = productElement.querySelector('td:nth-child(3)').textContent;

                addToCart(productName, productPrice);
            });
        });
    });

    const cart = [];

    function addToCart(productName, productPrice) {
        const product = { name: productName, price: productPrice };
        cart.push(product);
        alert(`${productName} has been added to your cart.`);
        console.log(cart);
    }
</script>
</body>
</html>
