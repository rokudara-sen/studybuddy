<?php
require_once 'session.php';
require_once 'functions.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once('dbaccess.php');

    $username = sanitizeInput($_POST['username']);
    $password = $_POST['password'];
    $error = "";

    // Benutzerdaten aus der Datenbank abrufen
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Überprüfen, ob ein Datensatz gefunden wurde
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        // Passwort überprüfen
        if (password_verify($password, $row['password'])) {
            // Benutzer erfolgreich authentifiziert, Session-Variablen setzen
            $_SESSION['username'] = $username;
            $_SESSION['userId'] = $row['userID'];

            // Benutzerrolle festlegen
            if ($row['userTyp'] === "guest") {
                $_SESSION['userrole'] = "guest";
            }
            if ($row['userTyp'] === "admin") {
                $_SESSION['userrole'] = "admin";
            }
        } else {
            $error = "Invalid password";
        }
    } else {
        $error = "Wrong credentials";
    }
    // Bei einem Fehler Weiterleitung mit Fehlermeldung
    if ($error) {
        header("Location: ../index.php?page=login&error=$error");
        $stmt->close();
        $conn->close();
        exit();
    }
    // Datenbankverbindung schließen und Weiterleitung bei erfolgreicher Anmeldung
    $stmt->close();
    $conn->close();
    header("Location: ../index.php?page=home&login=succesfull");
    exit();
} else {
    // Bei ungültiger Anforderung Weiterleitung zur Startseite
    header("Location: index.php?page=home");
    exit();
}
