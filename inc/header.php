<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid aligned-navbar">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=home">Home</a> <!-- Home is now a nav-link -->
                </li>
                <?php
                if ($_SESSION['userrole'] === "anonym") {
                    echo '<li class="nav-item"><a class="nav-link" href="index.php?page=registration">Registration</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="index.php?page=login">Login</a></li>';
                } ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=messenger">Messenger</a>
                </li>
                <li class="nav-item">
                    <?php if ($_SESSION['userrole'] !== "anonym") : ?>
                        <a class="nav-link" href="index.php?page=reportuser">Report User</a> <!-- Link auf die Seite "reportuser.php" -->
                    <?php endif; ?>
                </li>


                <?php
                if ($_SESSION['userrole'] === "admin" ||  $_SESSION['userrole'] === "guest") {
                    echo '<li class="nav-item"><a class="nav-link" href="index.php?page=profile">Profil</a></li>';
                }
                if ($_SESSION['userrole'] === "admin") {
                    echo '<li class="nav-item"><a class="nav-link" href="index.php?page=userverwaltung">Userverwaltung</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="index.php?page=userreports">userreports</a></li>';
                }
                if ($_SESSION['userrole'] === "admin" || $_SESSION['userrole'] === "guest") {
                    echo '<li class="nav-item"><a class="nav-link" href="index.php?page=logout">Logout</a></li>';
                } ?>
            </ul>
        </div>
    </div>
</nav>