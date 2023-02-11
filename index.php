<?php
include_once "includes/head.php";
include_once "includes/nav.php";
?>

<main class="container">

    <div class="row">
        <div class="col-md-9">
            <h1>What is Scoliosis?</h1>

            <p>Scoliosis is a pronounced lateral and rotational curvature of the spine of the humeral and
                lumbar parts. Its name comes from the Greek word <strong>Scoliosis = <em>distortion</em></strong>.
                As the vertebrae rotate and press against each other, the ribs that are attached to them
                also rotate. They turn one side of the spine and the opposite side of the shoulder blade.
                The shape of the deformity can be in the shape of the letter <b> C </b> or more severe cases with <b> S
                </b>
            </p>

            <h2>Signs of Scoliosis</h2>

            <ul class="col-12">
                <li> One arm higher than the other </li>
                <li> One shoulder higher than the other </li>
                <li> One side of the pelvic is more elevated than the other </li>
                <li> When bending, one side of the ribs is higher than the other </li>
            </ul>

            <div class="row">
                <img src="assets\signs1.jpg" class="col-4">
                <img src="assets\signs2.jpg" class="col-4">
                <img src="assets\signs3.jpg" class="col-4">
            </div>
            <h3>Types of Scoliosis:</h3>
            <div class="row">

                <p class="col-4">Scoliosis can only be on one side, including only one part (thoracic or lumbar); it can
                    be on one
                    side
                    that
                    includes both the thoracic and lumbar parts; it can include both parts but on opposite sides.</p>
                <img src="assets\signs4.jpg" class="col-8 img-fluid mx-auto d-block">
            </div>
            <h3>Causes of Scoliosis:</h3>
            <ul>
                <li><strong>Genetic:</strong> it can be present from birth or develop on a genetic basis.</li>
                <li><strong>Idiopathic:</strong> even though the child is healthy and has healthy and strong bones,
                    scoliosis appears, the reason for the appearance in this case is not known. It can start at any
                    stage of
                    development, the chronological division is made into three groups: infantile, juvenile and
                    adolescent.
                </li>
                <li><strong>Congenital:</strong> the bones in the back are not developed properly during embryonic
                    development, before birth.</li>
                <li><strong>Mechanical:</strong> one leg shorter than the other, carrying heavy weights on one
                <li><strong>Mechanical:</strong> one leg shorter than the other, carrying heavy weights on one side,
                    incorrect posture (eg. in school benches etc.)</li>
                <li><strong>Other:</strong> Spine tumors or infections can cause scoliosis and pain.</li>
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
        <p>For more information click on:
            <a href="https://en.wikipedia.org/wiki/Scoliosis"> <i>Scoliosis</i></a>
        </p>
    </div>
</main>

<!-- Footer section -->
<?php include_once "includes/footer.php"; ?>