<?php
include_once "includes/head.php";
include_once "includes/nav.php";
?>



<main class="container">

    <div class="row">

        <div class="col-md-9">
            <h1>How is scoliosis treated?</h1>
            <ul>
                <li>Small curves <i>(until 10 degrees bent)</i> seek no treatment</li>
                <li>Curves of <i>10-20 degrees</i> seek daily and consistent exercises</li>
                <li>Curves <i>20-50 degrees</i> the orthosis is required for 23 hours a day</li>
                <li>For bigger curves <i>(over 50 degrees)</i> surgical intervention is necessary</li>
            </ul>
            <br>

            <h2>What are orthosis?</h2>
            <div class="row">

                <div class="col-8">

                    <p>Orthoses (plural for orthosis) are devices that are worn externally on the body to support,
                        align,
                        prevent, or
                        correct deformities or to improve the function
                        of movable parts of the body. They can be used to treat a wide range of conditions affecting the
                        bones,
                        muscles,
                        tendons, and ligaments.
                    </p>
                    <p>Orthoses can be classified into different categories based on the body part they are designed for
                        and
                        the
                        type of
                        function they serve.
                        Some common examples include:
                    </p>

                    <ol>
                        <li><i>Braces:</i> These orthoses are used to support and stabilize joints that have been
                            injured or
                            have a
                            chronic condition such as arthritis.
                            They can be used on the knee, ankle, elbow, and wrist.</li>
                        <li><i>Orthotic insoles:</i> These devices are placed inside shoes to support the foot and help
                            with
                            conditions
                            such as plantar fasciitis and flat feet.</li>
                        <li><i>Spinal orthoses:</i> These orthoses are used to support the spine and are used to treat
                            conditions such
                            as scoliosis and spinal fractures.</li>
                    </ol>

                    <p>Orthoses can be custom-made by an orthotist or can be purchased pre-made
                        (off-the-shelf). They are
                        typically made
                        of lightweight materials such as plastic
                        and are designed to be comfortable and easy to wear.</p>
                </div>

                <img src="assets\img2.jpg" alt="" class="col-4 img-fluid mx-auto d-block">

            </div>
            <br>

            <div>
                <p>For scoliois self-treating <i>(only until 20 degrees)</i>, an instructing video:</p>
                <iframe class="col-12" height="420" src="https://www.youtube.com/embed/9TWtrCmzaOw"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>
        </div>
        <!-- Adding aside section for statistics -->
        <div class="col-md-3">
            <div class="container float-right">
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