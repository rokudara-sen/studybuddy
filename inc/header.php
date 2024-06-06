<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid aligned-navbar">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=home">Home</a>
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
                        <a class="nav-link" href="index.php?page=reportuser">Report User</a>
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
                <li class="nav-item">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="dark-mode-toggle">
                        <label class="form-check-label" for="dark-mode-toggle"></label>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const toggle = document.getElementById('dark-mode-toggle');
        const body = document.body;

        // Check if dark mode is already enabled
        if (localStorage.getItem('dark-mode') === 'enabled') {
            body.classList.add('dark-mode');
            toggle.checked = true;
        }

        toggle.addEventListener('change', () => {
            if (toggle.checked) {
                body.classList.add('dark-mode');
                localStorage.setItem('dark-mode', 'enabled');
            } else {
                body.classList.remove('dark-mode');
                localStorage.setItem('dark-mode', 'disabled');
            }
        });
    });
</script>
