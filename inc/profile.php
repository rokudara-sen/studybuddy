<?php
    if ($_SESSION['userrole'] == "anonym") {
    header("Location: index.php?page=home");
     exit();
    }
?>
<div class="container">
  <div class="row">
    <div class="col-md-6">
    <h2 class="p-3 mt-3" >Profil ändern</h2>
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
            <textarea class="form-control" name="profileText" id="profileText" rows="4" cols="50" placeholder="Text ändern"></textarea>
        </div>
        <div class="mb-3">
            <input class="form-control" type="file" id="profilePic" name="profilePic">
        </div>
        <br>
        <button class="form-control" id="profileButton" type="submit">Ändern</button>
    </form>
    </div>
    <div class="col-md-6">
    <h2 class="p-3 mt-3" >Accountdaten ändern</h2>
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
            <h2 class="p-3 mt-3" >Profil preview</h2>
                <div class="card text-center text-bg-dark">
                    <div class="card-header lead">
                        <?php echo $row['username']?> | <?php echo $row['age']?> | <?php echo $row['major']?>
                    </div>
                    <img src="res/img/<?php echo $row['picturepath']?>" class="card-img-top img-fluid" alt="kein Profilbild">
                    <div class="card-body">
                        <p class="card-text"><?php echo $row['profiletext']?></p>
                     </div>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary">Send Like</a>
                        <a href="#" class="btn btn-primary">Go Next</a>
                    </div>
                </div>
        </div>

    </div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous">
</script>
</body>
</html>