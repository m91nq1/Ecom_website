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

$showCheckoutButton = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = sanitizeInput($_POST["name"], $conn);
    $email = sanitizeInput($_POST["email"], $conn);
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmpassword"];

    $errors = [];
    if (empty($name)) {
        $errors[] = "Name is required.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (empty($password) || empty($confirmPassword)) {
        $errors[] = "Password and confirm password are required.";
    } elseif ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match.";
    } else {
        // Password validation
        if (strlen($password) < 8 || strlen($password) > 32) {
            $errors[] = "Password must be between 8 and 32 characters.";
        }
        if (!preg_match('/[A-Z]/', $password)) {
            $errors[] = "Password must contain at least one uppercase letter.";
        }
        if (!preg_match('/[a-z]/', $password)) {
            $errors[] = "Password must contain at least one lowercase letter.";
        }
        if (!preg_match('/[^a-zA-Z0-9]/', $password) || strpos($password, '<') !== false || strpos($password, '>') !== false) {
            $errors[] = "Password must contain at least one special character (excluding '<' and '>').";
        }
    }

    if (empty($errors)) {
        $emailCheckSql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($emailCheckSql);
        if ($result->num_rows > 0) {
            $errors[] = "Email already exists. Please use a different email or log in.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";

            if ($conn->query($sql) === TRUE) {
                $showCheckoutButton = true;
                $successMessage = "New user registered successfully!";
            } else {
                $errors[] = "Error: " . $conn->error;
            }
        }
    }
}
?>

<script>
function validateForm() {
    let email = document.getElementById("register-email").value;
    let password = document.getElementById("register-password").value;
    let confirmPassword = document.getElementById("register-confirm-password").value;

    let emailError = document.getElementById("email-error");
    let passwordError = document.getElementById("password-error");

    let valid = true;

    // Email validation
    if (email.indexOf("@") === -1) {
        emailError.textContent = "Email must contain '@'.";
        valid = false;
    } else {
        emailError.textContent = "";
    }

    // Password validation
    let passwordErrorMessages = [];
    if (password.length < 8 || password.length > 32) {
        passwordErrorMessages.push("Password must be between 8 and 32 characters.");
    }
    if (!/[A-Z]/.test(password)) {
        passwordErrorMessages.push("Password must contain at least one uppercase letter.");
    }
    if (!/[a-z]/.test(password)) {
        passwordErrorMessages.push("Password must contain at least one lowercase letter.");
    }
    if (!/[^a-zA-Z0-9]/.test(password) || password.includes("<") || password.includes(">")) {
        passwordErrorMessages.push("Password must contain at least one special character (excluding '<' and '>').");
    }

    if (passwordErrorMessages.length > 0) {
        passwordError.textContent = passwordErrorMessages.join(" ");
        valid = false;
    } else if (password !== confirmPassword) {
        passwordError.textContent = "Passwords do not match.";
        valid = false;
    } else {
        passwordError.textContent = "";
    }

    return valid;
}
</script>

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
    <!-- <a class="navbar-brand" href="#"><img src="./images/logo3.jpg" alt="Logo" /></a>-->
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

<!--Register-->
<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Register</h2>
        <hr class="mx-auto">
    </div>
    <div class="mx-auto container">
        <form id="register-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">

            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" id="register-name" name="name" placeholder="Name" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" id="register-email" name="email" placeholder="Email" required>
                <span id="email-error" class="text-danger"></span>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required>
            </div>

            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" class="form-control" id="register-confirm-password" name="confirmpassword" placeholder="Confirm Password" required>
                <span id="password-error" class="text-danger"></span>
            </div>

            <div class="form-group">
                <input type="submit" class="btn" id="register-btn" value="Register"/>
                <?php if ($showCheckoutButton): ?>
                    <a href="checkout.php" class="btn btn-secondary mt-3">Click here to proceed to Checkout</a>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <a id="login-url" class="btn" href="login.php">Do you have an account? Login Here</a>
            </div>

        </form>
        <div id="success-message" class="text-success mt-3">
            <?php
            if (isset($successMessage)) {
                echo $successMessage;
            } elseif (!empty($errors)) {
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
            <img src="./images/logo3.jpg" alt="Logo"/>
            <p class="pt-3">We provide the very best high-end products for our clients</p>
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
            <h5 class="pb-2">Instagram</h5>
            <div class="row">
                <img src="./images/insta1.jpg" class="img-fluid w-25 h-100 m-2" alt="insta1"/>
                <img src="./images/insta2.jpg" class="img-fluid w-25 h-100 m-2" alt="insta2"/>
                <img src="./images/insta3.jpg" class="img-fluid w-25 h-100 m-2" alt="insta3"/>
                <img src="./images/insta4.jpg" class="img-fluid w-25 h-100 m-2" alt="insta4"/>
            </div>
        </div>
    </div>

    <div class="copyright mt-5">
        <div class="row container mx-auto">
            <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                <img src="https://img.icons8.com/material-outlined/24/000000/visa.png"/>
                <img src="https://img.icons8.com/ios-filled/24/000000/mastercard-logo.png"/>
                <img src="https://img.icons8.com/ios-filled/24/000000/maestro.png"/>
            </div>
            <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
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
