<?php
if ($_SESSION['userrole'] == "anonym") {
    header("Location: index.php?page=home");
    exit();
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2 class="p-3 mt-3">Profil ändern</h2>
            <form class="p-3 mt-3" action="config/changeProfile.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="text" class="form-control" name="profileName" id="profileName" placeholder="Profilname/Username ändern">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="profileMajor" id="profileMajor" placeholder="MAJOR ändern">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="profileAge" id="profileAge" placeholder="AGE ändern">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="profileText" id="profileText" rows="4" cols="50" placeholder="Text ändern" maxlength="300" oninput="updateCharacterCount(this)"></textarea>
                    <small id="profileTextCount" class="form-text text-muted">0/300 characters used</small>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="file" id="profilePic" name="profilePic">
                </div>
                <br>
                <button class="form-control" id="profileButton" type="submit">Ändern</button>
            </form>
        </div>
        <div class="col-md-6">
            <h2 class="p-3 mt-3">Accountdaten ändern</h2>
            <form class="p-3 mt-3" action="config/changeProfile.php" method="post">
                <div class="mb-3">
                    <input type="text" class="form-control" name="profileVorname" id="profileVorname" placeholder="Vorname ändern">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="profileNachname" id="profileNachname" placeholder="Nachname ändern">
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" name="profileEmail" id="profileEmail" placeholder="Email ändern">
                </div>
                <br>
                <button class="form-control" id="profileButton" type="submit">Ändern</button>
            </form>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h2 class="p-3 mt-3">Passwort ändern</h2>
                <form class="p-3 mt-3" action="config/changeProfile.php" method="post">
                    <div class="mb-3">
                        <input type="password" class="form-control" name="currentPassword" id="currentPassword" placeholder="Aktuelles Passwort" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="Neues Passwort" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Neues Passwort bestätigen" required>
                    </div>
                    <br>
                    <button class="form-control" type="submit" id="changePassword" name="changePassword">Passwort ändern</button>
                </form>
            </div>
            <div class="col-md-6">
                <h2 class="p-3 mt-3">Profil preview</h2>

                <style>
                    .swiper-container {
                        width: 100%;
                        height: 100%;
                    }

                    .swiper-slide {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                    }

                    .card {
                        width: 300px;
                        background: #fff;
                        border-radius: 10px;
                        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                        display: flex;
                        flex-direction: column;
                        overflow: hidden;
                        border: none; /* Remove any border */
                    }

                    .card img {
                        width: 100%;
                        height: 200px;
                        object-fit: cover;
                    }

                    .card-body {
                        display: flex;
                        flex-direction: column;
                        flex-grow: 1;
                        padding: 15px;
                    }

                    .card-text {
                        flex-grow: 1;
                    }

                    .card-footer {
                        display: flex;
                        justify-content: space-between;
                        margin-top: 15px;
                    }

                    .btn {
                        padding: 10px;
                        border: none;
                        border-radius: 5px;
                        cursor: pointer;
                    }

                    .btn-primary {
                        background-color: #007bff;
                        color: white;
                    }

                    .btn-danger {
                        background-color: #dc3545;
                        color: white;
                    }
                </style>

                <div class="swiper-slide">
                    <div class="card">
                        <img src="res/img/<?php echo $row['picturepath']; ?>" alt="kein Profilbild">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['username']; ?>, <?php echo $row['age']; ?></h5>
                            <p class="card-text">Major: <?php echo $row['major']; ?></p>
                            <p class="card-text"><?php echo $row['profiletext']; ?></p>
                            <div class="card-footer">
                                <button class="btn btn-primary swipe-button">Send Like</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script>
    function updateCharacterCount(textarea) {
        const maxLength = textarea.getAttribute('maxlength');
        const currentLength = textarea.value.length;
        document.getElementById('profileTextCount').innerText = `${currentLength}/${maxLength} characters used`;
    }
</script>
</body>
</html>
