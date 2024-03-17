<?php
// Verbindung zur Datenbank herstellen
require('dbaccess.php');
//require_once 'session.php';
require_once 'functions.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {   
    $userVorname = sanitizeInput($_POST['userVorname']);
    $userNachname = sanitizeInput($_POST['userNachname']);
    $username = sanitizeInput($_POST['username']);
    $userEmail = sanitizeInput($_POST['userEmail']);
    $userPassword = password_hash($_POST['userPassword'], PASSWORD_DEFAULT); // Passwort sicher hashen

   
    if (!usernameTaken($conn, $username)) {
        // Prepared Statement da userinput
        // SQL-Query erstellen
        $sql = "INSERT INTO `users` ( `username`, `vorname`, `nachname`, `password`, `email`)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        // Parameter binden
        $stmt->bind_param("sssss", $username, $userVorname, $userNachname , $userPassword, $userEmail);

        // Prepared Statement ausführen und Ergebnis überprüfen
        if ($stmt->execute()) {
            echo "Daten erfolgreich eingefügt.";
        } else {
            echo "Fehler beim Einfügen der Daten: " . $stmt->error;
        }

        header("Location: ../index.php?page=login&register=success");
        $stmt->close();
        $conn->close();
        exit();
    } else {
        header("Location: ../index.php?page=reg&username=taken");
        $stmt->close();
        $conn->close();
        exit();
    }
}
header("Location: ../index.php?page=login");
$stmt->close();
$conn->close();
exit();
?>
