<?php
require_once 'functions.php';
require('dbaccess.php');
require_once 'session.php';
$username = $_SESSION['username'];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['changePassword'])) {
        // Passwort ändern
        $currentPassword = sanitizeInput($_POST['currentPassword']);
        $newPassword = sanitizeInput($_POST['newPassword']);
        $confirmPassword = sanitizeInput($_POST['confirmPassword']);

        if ($newPassword !== $confirmPassword) {
            echo "Die neuen Passwörter stimmen nicht überein.";
            exit();
        }

        $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();

        if (password_verify($currentPassword, $hashedPassword)) {
            $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE users SET password = ? WHERE username = ?");
            $stmt->bind_param("ss", $newHashedPassword, $username);
            if ($stmt->execute()) {
                echo "Passwort erfolgreich geändert.";
            } else {
                echo "Fehler beim Ändern des Passworts: " . $stmt->error;
            }
        } else {
            echo "Aktuelles Passwort ist falsch.";
        }
    }

    if (empty($_FILES['profilePic']['name']) == false) {
        $uploadErfolg = "";
        $uploadError = "";
        $fileChecker = 1;
        $file_info = new finfo(FILEINFO_MIME_TYPE);
        $mime_type = $file_info->file($_FILES['profilePic']['tmp_name']);
        $allowed_image_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
        if (in_array($mime_type, $allowed_image_types) == true) {
            $uploadErfolg = "Datei ist ein Bild!";
        } else {
            $uploadError = "Datei ist kein Bild. ";
            $fileChecker = 0;
        }

        $path = "../res/img/" . $_FILES['profilePic']['name'];
        $sql = "UPDATE users SET picturepath = ? WHERE username = ?";
        $stmt = $conn->prepare($sql);

        if ($fileChecker == 0) {
            echo "Datei konnte nicht hochgeladen werden.";
        } else {
            if (move_uploaded_file($_FILES['profilePic']['tmp_name'], "../res/img/" . $_FILES['profilePic']['name'])) {
                $uploadErfolg = $uploadErfolg . "Die Datei " . htmlspecialchars(basename($_FILES['profilePic']['name'])) . " wurde hochgeladen!";
            } else {
                $uploadError = $uploadError . "Datei konnte leider nicht hochgeladen werden.";
            }
            $stmt->bind_param("ss", $_FILES['profilePic']['name'], $username);
            if ($stmt->execute()) {
                echo "Daten erfolgreich eingefügt.";
            } else {
                echo "Fehler beim Einfügen der Daten: " . $stmt->error;
            }
        }
    }
    if (empty($_POST['profileNachname']) == false) {
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
    if (empty($_POST['profileVorname']) == false) {
        $profileVorname = sanitizeInput($_POST['profileVorname']);
        $stmt = $conn->prepare("UPDATE users SET vorname = ? WHERE username = ?");
        $stmt->bind_param("ss", $profileVorname, $username);
        if ($stmt->execute()) {
            echo "Daten erfolgreich eingefügt.";
        } else {
            echo "Fehler beim Einfügen der Daten: " . $stmt->error;
        }
    }
    if (empty($_POST['profileAge']) == false) {
        $profileAge = sanitizeInput($_POST['profileAge']);
        $stmt = $conn->prepare("UPDATE users SET age = ? WHERE username = ?");
        $stmt->bind_param("ss", $profileAge, $_SESSION['username']);
        if ($stmt->execute()) {
            echo "Daten erfolgreich eingefügt.";
        } else {
            echo "Fehler beim Einfügen der Daten: " . $stmt->error;
        }
    }
    if (empty($_POST['profileText']) == false) {
        $profileText = sanitizeInput($_POST['profileText']);
        $stmt = $conn->prepare("UPDATE users SET profiletext = ? WHERE username = ?");
        $stmt->bind_param("ss", $profileText, $_SESSION['username']);
        if ($stmt->execute()) {
            echo "Daten erfolgreich eingefügt.";
        } else {
            echo "Fehler beim Einfügen der Daten: " . $stmt->error;
        }
    }
    if (empty($_POST['profileMajor']) == false) {
        $profileMajor = sanitizeInput($_POST['profileMajor']);
        $stmt = $conn->prepare("UPDATE users SET major = ? WHERE username = ?");
        $stmt->bind_param("ss", $profileMajor, $_SESSION['username']);
        if ($stmt->execute()) {
            echo "Daten erfolgreich eingefügt.";
        } else {
            echo "Fehler beim Einfügen der Daten: " . $stmt->error;
        }
    }
    if (empty($_POST['profileEmail']) == false) {
        $profileEmail = sanitizeInput($_POST['profileEmail']);
        if (!emailTaken($conn, $profileEmail)) {
            $stmt = $conn->prepare("UPDATE users SET email = ? WHERE username = ?");
            $stmt->bind_param("ss", $profileEmail, $_SESSION['username']);
            if ($stmt->execute()) {
                echo "Daten erfolgreich eingefügt.";
            } else {
                echo "Fehler beim Einfügen der Daten: " . $stmt->error;
            }
        } else {
            header("Location: ../index.php?page=profile");
        }
    }
    if (empty($_POST['profileName']) == false) {
        $profileName = sanitizeInput($_POST['profileName']);
        if (!usernameTaken($conn, $profileName)) {
            $stmt = $conn->prepare("UPDATE users SET username = ? WHERE username = ?");
            $stmt->bind_param("ss", $profileName, $_SESSION['username']);
            if ($stmt->execute()) {
                echo "Daten erfolgreich eingefügt.";
            } else {
                echo "Fehler beim Einfügen der Daten: " . $stmt->error;
            }
            $_SESSION['username'] = $profileName;
        } else {
            header("Location: ../index.php?page=profile");
        }
    }
}
$stmt->close();
$conn->close();
header("Location: ../index.php?page=profile");
exit();
