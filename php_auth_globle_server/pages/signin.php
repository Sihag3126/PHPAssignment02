<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
    <section class="container-fluid main">

        <div class="container" id="user-form">
            <div class="row mainbox justify-content-center">
                <div class="col-md-3"></div>
                <div class="col-md-6 col-10 form-box">
                    <?php
                    require_once "../includes/functions.php";



                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $email = $_POST['email'];
                        $password = $_POST['password'];

                        // Validate email format using PHP's filter_var function
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $loginError = "Please provide a valid email address.";
                        } else {
                            $authenticationResult = authenticateUser($email, $password);
                            // Perform user authentication here
                            if ($authenticationResult === true) {
                                // User is authenticated, perform necessary actions
                                echo "Authentication successful. Welcome " . $_SESSION['firstname'] . " " . $_SESSION['lastname'] . "!";
                                $_SESSION['loggedIn'] = true;
                            } elseif ($authenticationResult === "User not found") {
                                // User not found
                                echo "User not found.";
                            } elseif ($authenticationResult === "Incorrect password") {
                                // Password is incorrect
                                echo "Incorrect password. Please check your password.";
                            } else {
                                // Authentication failed
                                echo "Authentication failed. Invalid email or password.";
                            }
                        }
                        redirectToDashboardIfLoggedIn();
                    }
                    ?>
                    <div class="heading">
                        Sign In Here
                    </div>
                    <form class="row g-3 needs-validation" method="post" action="" novalidate>
                        <div class="col-md-12">
                            <label for="validationEmail" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="validationEmail" name="email" value="" required>
                            <div class="invalid-feedback">
                                Please provide a valid email address.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="validationPassword" name="password" value="" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="navigate">
                                Don't have an account? Sign Up<a class="ms-1" href="signup.php"> Here</a>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn main-btn-submit" type="submit">Sign In</button>
                        </div>
                    </form>
                    <?php
                    if (isset($loginError)) {
                        echo "<div class='error'>$loginError</div>";
                    }
                    ?>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </section>

    <script src="../js/bootstrap.min.js"></script>
 
</body>

</html>