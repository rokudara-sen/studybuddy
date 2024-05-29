<?php
require_once 'functions.php';
require_once 'dbaccess.php';
require_once 'session.php';

// Überprüfen, ob der Benutzer eingeloggt ist
if (!isset($_SESSION['username'])) {
    // Weiterleitung oder Fehlermeldung, wenn Benutzer nicht eingeloggt ist
    exit("You must be logged in to report users.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Überprüfen, ob alle erforderlichen Felder gesetzt sind
    if (isset($_POST['reported_user']) && isset($_POST['reason'])) {
        $reportedUser = sanitizeInput($_POST['reported_user']);
        $reason = sanitizeInput($_POST['reason']);
        
        // Validierung und Sicherheitsüberprüfung des gemeldeten Benutzers und des Grundes
        
        // Fügen Sie den Benutzerbericht zur Datenbank hinzu
        $stmt = $conn->prepare("INSERT INTO report (reported_user, reported_by, reason) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $reportedUser, $_SESSION['userId'], $reason);
        $stmt->execute();
        $stmt->close();
        
        // Weiterleitung oder Erfolgsmeldung
        header("Location: ../index.php?page=userreports");
        exit();
    } else {
        // Fehlermeldung, wenn Daten unvollständig sind
        exit("Please provide reported user and reason.");
    }
}
?>
