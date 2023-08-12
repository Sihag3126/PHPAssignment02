<?php
include_once './header.php';
require_once "./includes/functions.php";
redirectToSignInIfNotLoggedIn();

?>

<div class="container" id="home">
    <div class="row home-box">
        <div class="col-md-12 box">

            <div class="heading">
                This is Dashboard screen
            </div>

            <h1>
                Welcome,
                <?php
                if (isset($_SESSION['loggedIn'])) {
                    echo explode(" ", $_SESSION['firstname'])[0] . "  " . $_SESSION['lastname'];
                } else {
                    echo 'Guest';
                }
                ?>
            </h1>
        </div>







    </div>
</div>


</section>


<?php
include_once './footer.php'
?>