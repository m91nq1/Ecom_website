<?php

$servername = "localhost";
$username = "root";
$password = "Knowmyname1!";
$dbname = "sasol_ecommerce";
$port = 3307;


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize user input
function sanitizeInput($data, $conn) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $conn->real_escape_string($data);
}

// Initialize variables
$errors = [];
$success_message = "";

// Process checkout form if submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['checkout'])) {
    // Sanitize and validate user input
    $name = sanitizeInput($_POST["name"], $conn);
    $email = sanitizeInput($_POST["email"], $conn);
    $phone = sanitizeInput($_POST["phone"], $conn);
    $city = sanitizeInput($_POST["city"], $conn);
    $address = sanitizeInput($_POST["address"], $conn);

    // Basic form validation
    if (empty($name)) {
        $errors[] = "Name is required.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required.";
    }
    if (empty($phone)) {
        $errors[] = "Phone number is required.";
    }
    if (empty($city)) {
        $errors[] = "City is required.";
    }
    if (empty($address)) {
        $errors[] = "Address is required.";
    }

    // If no errors, insert data into the database
    if (empty($errors)) {
        $sql = "INSERT INTO checkout (name, email, phone, city, address) VALUES ('$name', '$email', '$phone', '$city', '$address')";

        if ($conn->query($sql) === TRUE) {
            $success_message = "Checkout completed successfully!";
        } else {
            $errors[] = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>


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
<nav class="navbar navbar-expand-lg navbar-light bg-light py-3 fixed-top">
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
                <a class="nav-link" href="shop.php">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
            </li>
            <li class="nav-item">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <i class="fa fa-user" aria-hidden="true"></i>
            </li>
        </ul>
    </div>
</nav>

<!-- Checkout -->
<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Check Out</h2>
        <hr class="mx-auto">
    </div>
    <div class="mx-auto container">
        <form id="checkout-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <div class="form-group checkout-small-element">
                <label>Name</label>
                <input type="text" class="form-control" id="checkout-name" name="name" placeholder="Name" required>
            </div>

            <div class="form-group checkout-small-element">
                <label>Email</label>
                <input type="email" class="form-control" id="checkout-email" name="email" placeholder="Email" required>
            </div>

            <div class="form-group checkout-small-element">
                <label>Phone</label>
                <input type="tel" class="form-control" id="checkout-phone" name="phone" placeholder="Phone" required>
            </div>

            <div class="form-group checkout-small-element">
                <label>City</label>
                <input type="text" class="form-control" id="checkout-city" name="city" placeholder="City" required>
            </div>

            <div class="form-group checkout-large-element">
                <label>Address</label>
                <input type="text" class="form-control" id="checkout-address" name="address" placeholder="Address" required>
            </div>

            <div class="form-group checkout-btn-container">
                <input type="submit" class="btn" id="checkout-btn" name="checkout" value="Checkout"/>
            </div>

        </form>
        <div id="checkout-message" class="mt-3">
            <?php
            // Display success or error messages
            if (!empty($errors)) {
                echo "<ul class='text-danger'>";
                foreach ($errors as $error) {
                    echo "<li>$error</li>";
                }
                echo "</ul>";
            } elseif (!empty($success_message)) {
                echo "<p class='text-success'>$success_message</p>";
            }
            ?>
        </div>
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
 <script>
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("checkout-form").addEventListener("submit", function(event) {
        let errors = [];
        let name = document.getElementById("checkout-name").value.trim();
        let email = document.getElementById("checkout-email").value.trim();
        let phone = document.getElementById("checkout-phone").value.trim();
        let city = document.getElementById("checkout-city").value.trim();
        let address = document.getElementById("checkout-address").value.trim();

        if (name === "") {
            errors.push("Name is required.");
        }
        if (email === "" || !isValidEmail(email)) {
            errors.push("Valid email is required.");
        }
        if (phone === "") {
            errors.push("Phone number is required.");
        }
        if (city === "") {
            errors.push("City is required.");
        }
        if (address === "") {
            errors.push("Address is required.");
        }

        if (errors.length > 0) {
            event.preventDefault();
            displayErrors(errors);
        }
    });

    function isValidEmail(email) {
        // Simple email validation regex
        let emailRegex = /\S+@\S+\.\S+/;
        return emailRegex.test(email);
    }

    function displayErrors(errors) {
        let errorList = "<ul class='text-danger'>";
        errors.forEach(function(error) {
            errorList += "<li>" + error + "</li>";
        });
        errorList += "</ul>";

        document.getElementById("checkout-message").innerHTML = errorList;
    }
});
</script>
</body>
</html>