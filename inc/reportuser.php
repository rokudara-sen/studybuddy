<?php
    require 'config/session.php'; // Stellt sicher, dass eine aktive Sitzung vorhanden ist
    require 'config/dbaccess.php'; // Datenbankverbindung

    // Überprüfen, ob der Benutzer eingeloggt ist
    if (!isset($_SESSION['userrole']) || $_SESSION['userrole'] === "anonym") {
        header("Location: index.php?page=home");
        exit();
    }

    $ID = $_SESSION['userId'];

    // Abfrage, um alle Benutzer abzurufen
    $sqlUsers = "SELECT userID, username FROM users WHERE userID != $ID";
    $resultUsers = $conn->query($sqlUsers);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Report User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h2 class="p-3 mt-3">Benutzer melden</h2>

    <form action="config/reportfunction.php" method="POST">
        <div class="mb-3">
            <label for="reported_user" class="form-label">Benutzer zum Melden auswählen:</label>
            <select class="form-select" name="reported_user" id="reported_user" required>
                <option value="" selected disabled>Benutzer auswählen</option>
                <?php
                    // Anzeigen aller Benutzer im Dropdown-Menü
                    while ($rowUser = $resultUsers->fetch_assoc()) {
                        echo "<option value='" . $rowUser["userID"] . "'>" . $rowUser["username"] . "</option>";
                    }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="reason" class="form-label">Meldung:</label>
            <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Melden</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
