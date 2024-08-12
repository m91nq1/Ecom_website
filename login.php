<?php

$servername = "localhost";
$username = "root";
$password = "Knowmyname1!";
$dbname = "sasol_ecommerce";
$port = 3307;


$conn = new mysqli($servername, $username, $password, $dbname, $port);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function sanitizeInput($data, $conn) {
    $data = trim($data);
    $data = stripslashes($data); 
    $data = htmlspecialchars($data); 
    return $conn->real_escape_string($data);
}


$errors = [];


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
   
    $email = sanitizeInput($_POST["email"], $conn);
    $password = $_POST["password"];

   
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    
    if (empty($errors)) {
       
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();
        
            if (password_verify($password, $user['password'])) {
               
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                
                header("Location: checkout.php");
                exit();
            } else {
                $errors[] = "Incorrect password.";
            }
        } else {
            $errors[] = "No user found with this email.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sasol E-commerce - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="./images/logo3.jpg">
</head>
<body>

<!--NavBar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light py-3 fixed-top">
    <!--<a class="navbar-brand" href="#"><img src="./images/logo3.jpg" alt="Logo" /></a>-->
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
                <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
            <li class="nav-item">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <i class="fa fa-user" aria-hidden="true"></i>
            </li>
        </ul>
    </div>
</nav>

<!--Login-->
<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Login</h2>
        <hr class="mx-auto">
    </div>
    <div class="mx-auto container">
        <form id="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" id="login-email" name="email" placeholder="Email" required>
                <span id="login-email-error" class="text-danger"></span>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required>
            </div>

            <div class="form-group">
                <input type="submit" class="btn" id="login-btn" name="login" value="Login"/>
            </div>

            <div class="form-group">
                <a id="register-url" class="btn" href="register.php">Don't have an account? Register Here</a>
            </div>
        </form>
        
        <div id="login-error-message" class="text-danger mt-3">
            <?php
            // Display errors if any
            if (!empty($errors)) {
                echo "<ul class='text-danger'>";
                foreach ($errors as $error) {
                    echo "<li>$error</li>";
                }
                echo "</ul>";
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
            <p class="pt-3"><br>We provide the very best high-end products for our clients</p>
        </div>

        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2">Featured</h5>
            <ul class="text-uppercase">
                <li><a href="#">new arrivals</a></li>
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
function validateLoginForm() {
    let email = document.getElementById("login-email").value;
    let emailError = document.getElementById("login-email-error");

    let valid = true;

    if (email.indexOf("@") === -1) {
        emailError.textContent = "Email must contain '@'.";
        valid = false;
    } else {
        emailError.textContent = "";
    }

    return valid;
}
</script>
</body>
</html>
