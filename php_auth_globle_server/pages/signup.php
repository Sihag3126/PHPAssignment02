<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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


                    $registrationResult = null; // Initializing registration result

                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : "";
                        $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : "";
                        $email = isset($_POST['email']) ? $_POST['email'] : "";
                        $password = isset($_POST['password']) ? $_POST['password'] : "";

                        // Validatimg input fields
                        if (
                            empty($firstname) || empty($lastname) || empty($email) || empty($password)
                        ) {
                            $registrationResult = "All fields are required to be filled.";
                        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $registrationResult = "Please provide a valid email address.";
                        } elseif (strlen($password) < 8) {
                            $registrationResult = "Password must be at least 8 characters.";
                        } else {
                            // Called createUser function after validation
                            $registrationResult = createUser($firstname, $lastname, $email, $password);

                            // If registration is successful, set session variables and redirect
                            if ($registrationResult === true) {
                                session_start();
                                $_SESSION['loggedIn'] = true;
                                $_SESSION['userEmail'] = $email;
                                header("Location: ../dashboard.php");
                                exit();
                            }
                        }
                    }
                    redirectToDashboardIfLoggedIn();
                    ?>

                    <div class="heading">
                        Sign Up Here
                    </div>
                    <form class="row g-3 needs-validation" method="post" action="" novalidate>
                        <div class="col-md-6">
                            <label for="validationFirstName" class="form-label">First name</label>
                            <input type="text" class="form-control" id="validationFirstName" name="firstname" value="" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationLastName" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="validationLastName" name="lastname" value="" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationEmail" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="validationEmail" name="email" value="" required>
                            <div class="valid-feedback">
                                Looks good!
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
                                Already have an Accounnt? Sign In <a class="ms-1" href="signin.php"> Here</a>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn main-btn-submit" type="submit" name="signup">Sign Up</button>
                        </div>
                    </form>
                    <?php
                    if (isset($registrationResult)) {
                        if ($registrationResult === true) {
                            echo "<div class='success'>User Registered successfully</div>";
                        } else {
                            echo "<div class='error'>$registrationResult</div>"; // Display the error message
                        }
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