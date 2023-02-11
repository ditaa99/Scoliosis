<?php
include_once "includes/head.php";
include_once "includes/nav.php";
?>

<main class="container">
    <!-- ?= include_once 'includes/nav.php' ?> -->



    <div class="row">

        <div class="col-md-9">
            <h1>How to diagnose it?</h1>
            <div class="row">
                <p class="col-4">In order to determine the shape of the deformation, it is necessary to take an X-ray.
                    Scoliosis is defined by 11 degrees or more. Although scoliosis can develop at any age,
                    the most frequent cases are in adolescence, especially in women.</p>
                <img src="assets\img1.jpg" class="col-8 img-fluid mx-auto d-block">
            </div>
            <br>
            <br>
            <h2>What happened if scoliosis is not diagnosed?</h2>
            <ul class="col-12">
                <li>As the spine rotates and deforms, changes in deformity become more apparent</li>
                <li>While the curve/bend increases, the child may have back pain</li>
                <li>There may be difficulty in breathing</li>
                <li>There may be heart or lung problems later</li>
            </ul>
        </div>


        <!-- Adding aside section for statistics -->
        <div class="col-md-3">
            <div class="container float-right ">
                <div class="row">
                    <?php
                    include "login.php";
                    echo "<br>";
                    include_once "signup.php";
                    echo "<br>";
                    include_once "aside.php";
                    ?>
                </div>
            </div>
        </div>
    </div>

</main>
<!-- Footer section -->
<?php include_once "includes/footer.php"; ?>