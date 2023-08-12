<?php
session_start();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/resp.css">
   
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>
    <section class="bg-img-box" id="bg-box">
        <div class="menu-toggle" id="mobile">
            <div class="icon-bx">
                <div class="icon">
                    <img src="img/icons/menu.png" alt="">
                </div>
            </div>

            <div class="mobile-nav">

                <div class="menu-toggle">
                    <div class="icon" id="main-menu">
                        <img src="img/icons/close.png" alt="">
                    </div>

                </div>
                <div class="navbar">



                    <?php if (isset($_SESSION['loggedIn'])) { ?>



                        <?php

                        require_once dirname(__FILE__) . '/includes/functions.php';



                        if (isset($_POST['logout'])) {
                            logout();
                        } elseif (isset($_POST['dashboard'])) {
                            navigateToDashboard();
                        } elseif (isset($_POST['home'])) {
                            navigateToHome();
                        }

                        ?>


                        <li>
                            <form method="post">
                                <button type="submit" name="dashboard" class="dropdown-item">Dashboard</button>
                            </form>
                        </li>
                        <li>
                            <form method="post">
                                <button type="submit" name="home" class="dropdown-item">Home</button>
                            </form>
                        </li>
                        <li>
                            <form method="post">
                                <button type="submit" name="logout" class="dropdown-item">Logout</button>
                            </form>
                        </li>


                    <?php } else { ?>

                        <li><a href="./pages/signin.php">Sign In</a></li>
                        <!-- Navigation menu item -->
                        <li><a href="./pages/signup.php">Sign Up</a></li>
                    <?php } ?>
                </div>

            </div>

        </div>
    </section>

    <section class="container-fluid main">
        <div class="navigation" id="navigation">
            <div class="navbar">

                <div class="row" id="navbar">

                    <div class="col-md-2">
                        <div class="logo">
                            Logo
                        </div>
                    </div>
                    <div class="col-md-7  nav">




                    </div>

                    <div class="col-md-3 " id="buttons">
                        <?php if (isset($_SESSION['loggedIn'])) { ?>



                            <?php

                            require_once dirname(__FILE__) . '/includes/functions.php';



                            if (isset($_POST['logout'])) {
                                logout();
                            } elseif (isset($_POST['dashboard'])) {
                                navigateToDashboard();
                            } elseif (isset($_POST['home'])) {
                                navigateToHome();
                            }

                            ?>
                            <div class="dropdown">
                                <button class="btn main-btn dropdown-toggle" type="button" id="accountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    My Account
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="accountDropdown">
                                    <li>
                                        <form method="post">
                                            <button type="submit" name="dashboard" class="dropdown-item">Dashboard</button>
                                        </form>
                                    </li>
                                    <li>
                                        <form method="post">
                                            <button type="submit" name="home" class="dropdown-item">Home</button>
                                        </form>
                                    </li>
                                    <li>
                                        <form method="post">
                                            <button type="submit" name="logout" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        <?php } else { ?>
                            <button class="btn main-btn " type="submit"><a href="./pages/signin.php">Sign In</a></button>
                            <button class="btn main-btn ms-3" type="submit"><a href="./pages/signup.php">Sign Up</a></button>
                        <?php } ?>

                    </div>

                </div>

            </div>
        </div>