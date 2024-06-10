<?php

// Funktion zum Säubern von Benutzereingaben
function sanitizeInput($input)
{
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

// Funktion zum Überprüfen, ob ein Benutzername bereits vergeben ist
function usernameTaken($conn, $username)
{
    $sql = "SELECT * FROM users WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        // Fehler bei der Vorbereitung der SQL-Anweisung
        return true;
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        // Benutzername bereits vergeben
        return true;
    } else {
        // Benutzername noch nicht vergeben
        return false;
    }
}

// Funktion zum Überprüfen, ob eine E-Mail-Adresse bereits vergeben ist
function emailTaken($conn, $email)
{
    $sql = "SELECT * FROM users WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        // Fehler bei der Vorbereitung der SQL-Anweisung
        return true;
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        // E-Mail-Adresse bereits vergeben
        return true;
    } else {
        // E-Mail-Adresse noch nicht vergeben
        return false;
    }
}

// Funktion zum Überprüfen, ob zwei Passwörter unterschiedlich sind
function passwordDifferent($pwd1, $pwd2)
{
    return $pwd1 !== $pwd2;
}
