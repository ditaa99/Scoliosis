<header>
    <div class="header">
        <header class="col-12">
            <img src="assets\Scoliosis header.jpg">
        </header>
    </div>
</header>

<!-- Adding a navigation bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="assets/logo.jpg" width="30">
            Scoliosis
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">What is Scoliosis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="diagnosing.php">Diagnosing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="treating.php">Treating</a>
                </li>
            </ul>
            <?php
            if (isset($_SESSION['user_id'])) {
            ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="logout.php">log out</a>
                </li>
            </ul>
            <?php } ?>
        </div>
    </div>
</nav>