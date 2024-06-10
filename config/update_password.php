<?php
require_once 'dbaccess.php';
require_once 'session.php';
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['userId'])) { // Der Administrator ändert das Passwort eines Benutzers
        $newHashedPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
        $userId = $_POST['userId'];

        $sql = "UPDATE users SET password='$newHashedPassword' WHERE userID=$userId";
        if ($conn->query($sql) === TRUE) {
            header("Location: ../index.php?page=admin_overview");
            exit();
        } else {
            echo "Fehler: Passwortänderung durch Administrator fehlgeschlagen.";
        }
    } else { // Der angemeldete Benutzer ändert sein eigenes Passwort
        $userId = $_SESSION['userId'];
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];

        // Passwort aus der Datenbank abrufen
        $stmt = $conn->prepare("SELECT password FROM users WHERE userID = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();
        $stmt->close();

        // Überprüfen, ob das alte Passwort mit dem gespeicherten gehashten Passwort übereinstimmt
        if (password_verify($oldPassword, $hashedPassword)) {
            // Wenn sie übereinstimmen, das Passwort in der Datenbank mit dem neuen gehashten Passwort aktualisieren
            $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $updateStmt = $conn->prepare("UPDATE users SET password = ? WHERE userID= ?");
            $updateStmt->bind_param("si", $newHashedPassword, $userId);

            if ($updateStmt->execute()) {
                echo "Passwort erfolgreich aktualisiert.";
            } else {
                echo "Fehler beim Aktualisieren des Passworts: " . $updateStmt->error;
            }

            $updateStmt->close();
        } else {
            echo "Fehler: Altes Passwort ist falsch.";
        }

        header("Location: ../index.php?page=userprofile");
        exit();
    }
} else {
    header("Location: ../index.php?page=home");
    exit();
}
