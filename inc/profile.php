<?php
    if ($_SESSION['userrole'] == "anonym") {
    //header("Location: index.php?page=home");
     //exit();
    }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<div class="container">
  <div class="row">
    <div class="col-md-6">
    <h2 class="p-3 mt-3" >Profil ändern</h2>
    <form class="p-3 mt-3" action="config/changeProfile.php" method="POST">
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
    <form class="p-3 mt-3" action="config/changeProfile.php" method="POST">
        <div class="mb-3">
            <input type="text" class="form-control" name="profileVorname" id="profileVorname" placeholder="Vorname ändern">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" name="profileNachname" id="profileNachname" placeholder="Nachname ändern">
        </div>
        <div class="mb-3">
            <input type="email" class="form-control" name="profileEmail" id="profileEmail" placeholder="Email ändern">
        </div>

    </form>
    </div>
  </div>
</div>
<br><br><br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous">
</script>
</body>
</html>