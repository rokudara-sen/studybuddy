<?php
require_once 'functions.php';
require('dbaccess.php');
require_once 'session.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") 
{ 
    $username = $_SESSION['username'];  
    if(empty($_POST['profileNachname']) == false)
    {
        $profileNachname = sanitizeInput($_POST['profileNachname']);
        $sql = "UPDATE users SET nachname = ? WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $profileNachname, $username);
        if ($stmt->execute()) {
            echo "Daten erfolgreich eingefügt.";
        } else {
            echo "Fehler beim Einfügen der Daten: " . $stmt->error;
        }  
    }
    if(empty($_POST['profileVorname']) == false)
    {
        $profileVorname = sanitizeInput($_POST['profileVorname']);
        $stmt = $conn->prepare("UPDATE users SET vorname = ? WHERE username = ?");
        $stmt->bind_param("ss", $profileVorname, $username);
        if ($stmt->execute()) {
            echo "Daten erfolgreich eingefügt.";
        } else {
            echo "Fehler beim Einfügen der Daten: " . $stmt->error;
        }
    }
    if(empty($_POST['profileAge']) == false)
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
    if(empty($_POST['profileText']) == false)
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
    if(empty($_POST['profileMajor']) == false)
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
    if(empty($_POST['profileEmail']) == false)
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
            header("Location: ../index.php?page=profile");
        }
    }
    if(empty($_POST['profileName']) == false)
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
            $_SESSION['username'] = $profileName;
        }else
        {
            header("Location: ../index.php?page=profile");
        }
    }
}
$stmt->close();
$conn->close();
header("Location: ../index.php?page=profile");
exit();
?>