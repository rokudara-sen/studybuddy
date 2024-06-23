<?php
require 'dbaccess.php';
require_once 'functions.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Benutzereingaben bereinigen
    $userVorname = sanitizeInput($_POST['userVorname']);
    $userNachname = sanitizeInput($_POST['userNachname']);
    $username = sanitizeInput($_POST['username']);
    $userEmail = sanitizeInput($_POST['userEmail']);
    $userPassword = password_hash($_POST['userPassword'], PASSWORD_DEFAULT);

    // Überprüfen, ob der Benutzername bereits vergeben ist
    if (!usernameTaken($conn, $username)) {
        // Vorbereitung des SQL-Statements
        $sql = "INSERT INTO `users` (`username`, `vorname`, `nachname`, `password`, `email`)
                VALUES (?, ?, ?, ?, ?)";

        // Prepared Statement erstellen
        $stmt = $conn->prepare($sql);

        // Parameter binden
        $stmt->bind_param("sssss", $username, $userVorname, $userNachname, $userPassword, $userEmail);

        // Statement ausführen und Ergebnis überprüfen
        if ($stmt->execute()) {
            header("Location: ../index.php?page=login&register=success");
            exit();
        } else {
            echo "Fehler beim Einfügen der Daten: " . $stmt->error;
        }

        // Statement und Verbindung schließen
        $stmt->close();
        $conn->close();
    } else {
        // Benutzername bereits vergeben, Umleitung zur Registrierungsseite mit Fehlermeldung
        header("Location: ../index.php?page=reg&username=taken");
        exit();
    }
}

// Falls die POST-Anfrage nicht korrekt war oder keine Umleitung durchgeführt wurde, auf die Login-Seite umleiten
header("Location: ../index.php?page=login");
exit();
