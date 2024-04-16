<?php
//nur idee
require_once 'functions.php';
require('dbaccess.php');
if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['profileNachname'])) 
{   
    $profileNachname = sanitizeInput($_POST['profileNachname']);
    $stmt = $conn->prepare("UPDATE users SET nachname = ? WHERE username = ?");
    $stmt->bind_param("ss", $profileNachname, $_SESSION['username']);
    if ($stmt->execute()) {
        echo "Daten erfolgreich eingefügt.";
    } else {
        echo "Fehler beim Einfügen der Daten: " . $stmt->error;
    }
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['profileVorname'])) 
{   
    $profileVorname = sanitizeInput($_POST['profileVorname']);
    $stmt = $conn->prepare("UPDATE users SET vorname = ? WHERE username = ?");
    $stmt->bind_param("ss", $profileVorname, $_SESSION['username']);
    if ($stmt->execute()) {
        echo "Daten erfolgreich eingefügt.";
    } else {
        echo "Fehler beim Einfügen der Daten: " . $stmt->error;
    }
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['profileAge'])) 
{ 
    $profileAge = sanitizeInput($_POST['profileAge']);
    $stmt = $conn->prepare("UPDATE users SET age = ? WHERE username = ?");
    $stmt->bind_param("ss", $profileAge, $_SESSION['username']);
    if ($stmt->execute()) {
        echo "Daten erfolgreich eingefügt.";
    } else {
        echo "Fehler beim Einfügen der Daten: " . $stmt->error;
    }
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['profileText']))
{   
    $profileText = sanitizeInput($_POST['profileText']);
    $stmt = $conn->prepare("UPDATE users SET profiletext = ? WHERE username = ?");
    $stmt->bind_param("ss", $profileText, $_SESSION['username']);
    if ($stmt->execute()) {
        echo "Daten erfolgreich eingefügt.";
    } else {
        echo "Fehler beim Einfügen der Daten: " . $stmt->error;
    }
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['profileMajor'])) 
{   
    $profileMajor = sanitizeInput($_POST['profileMajor']);
    $stmt = $conn->prepare("UPDATE users SET major = ? WHERE username = ?");
    $stmt->bind_param("ss", $profileMajor, $_SESSION['username']);
    if ($stmt->execute()) {
        echo "Daten erfolgreich eingefügt.";
    } else {
        echo "Fehler beim Einfügen der Daten: " . $stmt->error;
    }
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['profileEmail'])) 
{   
    $profileEmail = sanitizeInput($_POST['profileEmail']);
    if (!emailTaken($conn, $profileEmail)) 
    {
        $stmt = $conn->prepare("UPDATE users SET email = ? WHERE username = ?");
        $stmt->bind_param("ss", $profileEmail, $_SESSION['username']);
        if ($stmt->execute()) {
            echo "Daten erfolgreich eingefügt.";
        } else {
            echo "Fehler beim Einfügen der Daten: " . $stmt->error;
        }
    }else
    {
        echo "<script type='text/javascript'>alert('Diese Email gibt es schon!!');</script>";
    }
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['profileName'])) 
{   
    $profileName = sanitizeInput($_POST['profileName']);
    if (!usernameTaken($conn, $profileName)) 
    {
        $stmt = $conn->prepare("UPDATE users SET username = ? WHERE username = ?");
        $stmt->bind_param("ss", $profileName, $_SESSION['username']);
        if ($stmt->execute()) {
            echo "Daten erfolgreich eingefügt.";
        } else {
            echo "Fehler beim Einfügen der Daten: " . $stmt->error;
        }
    }else
    {
        echo "<script type='text/javascript'>alert('Diesen Usernamen gibt es schon!!');</script>";
    }
}

header("Location: ../index.php?page=profile");
$stmt->close();
$conn->close();
exit();
?>