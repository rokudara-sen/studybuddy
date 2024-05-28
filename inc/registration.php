<div class="registration-container">
    <div class="registration-box">
        <form class="p-3 mt-3" action="config/registration_insert.php" method="post">

            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="userVorname" id="userVorname" placeholder="Vorname" >
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="userNachname" id="userNachname" placeholder="Nachname" >
            </div>

            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="username" id="username" placeholder="Username" required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="email" name="userEmail" id="userEmail" placeholder="Email" required>
            </div>

            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" id="userPassword" name="userPassword" placeholder="Passwort" minlength="6" maxlength="64" required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" id="passwort_wiederholen" name="passwort_wiederholen" placeholder="Passwort wiederholen" minlength="6" maxlength="64" required>
            </div>

            <button class="btn btn-register" type="submit">Submit</button>

        </form>
        <div class="registration-message">
            <?php
            if (isset($_GET['username'])) {
                echo "<p class='error-message'>Username taken!</p>";
            }
            ?>
        </div>
    </div>
</div>

