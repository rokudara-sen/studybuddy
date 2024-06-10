<?php

if ($_SESSION['userrole'] !== "admin") {
    header("Location: index.php?page=home");
    exit();
}

require 'config/dbaccess.php';

// Überprüfe, ob die userId in der URL vorhanden ist
if (isset($_GET['userID'])) {
    $userID = $_GET['userID'];

    // Vorbereitung der Abfrage, um Benutzerdaten basierend auf der userId abzurufen
    $stmt = $conn->prepare("SELECT * FROM users WHERE userID = ?");
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
        // Benutzerdaten sind jetzt im Array $userData verfügbar
    } else {
        echo "Benutzer nicht gefunden.";
        $stmt->close();
        $conn->close();
        header("Location: index.php");
        exit(); // Beende das Skript, wenn der Benutzer nicht gefunden wurde
    }

    $stmt->close();
} else {
    echo "Ungültige Anfrage.";
    $conn->close();
    header("Location: index.php");
    exit(); // Beende das Skript, wenn keine userId übergeben wurde
}
?>

<div class="wrapper">
    <form class="p-3 mt-3" action="config/update_admin_user.php" method="post">
        <div class="form-field d-flex align-items-center">
            <span class="far fa-user">userId:</span>
            <input type="text" name="userId" id="userId" value="<?php echo $userData['userID']; ?>" readonly>
        </div>
        <div class="form-field d-flex align-items-center">
            <span class="far fa-user">Vorname:</span>
            <input type="text" name="userVorname" id="userVorname" value="<?php echo $userData['vorname']; ?>" required>
        </div>
        <div class="form-field d-flex align-items-center">
            <span class="far fa-user">Nachname:</span>
            <input type="text" name="userNachname" id="userNachname" value="<?php echo $userData['nachname']; ?>" required>
        </div>
        <div class="form-field d-flex align-items-center">
            <span class="far fa-user">username:</span>
            <input type="text" name="username" id="username" value="<?php echo $userData['username']; ?>" required>
        </div>
        <div class="form-field d-flex align-items-center">
            <span class="far fa-user">Email:</span>
            <input type="email" name="userEmail" id="userEmail" value="<?php echo $userData['email']; ?>" required>
        </div>
        <div class="form-field d-flex align-items-center">
            <span class="far fa-user">Rolle:</span>
            <input type="text" name="userTyp" id="userTyp" value="<?php echo $userData['userTyp']; ?>" required>
        </div>
        <button class="btn mt-3" type="submit">Submit</button>
    </form>
</div>