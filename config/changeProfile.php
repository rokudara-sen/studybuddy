<?php



//grobe Idee, bräuchte session variable für usernamen



require_once 'functions.php';
require('dbaccess.php');
$stmt = $dbaccess->prepare("SELECT email, username, profiletext, vorname, nachname, age, major FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($email, $username, $text, $vorname, $nachname, $age, $major);
if ($_SERVER["REQUEST_METHOD"] === "POST") 
{   
    $profileVorname = sanitizeInput($_POST['profileVorname']);
    $profileNachname = sanitizeInput($_POST['profileNachname']);
    $profileAge = sanitizeInput($_POST['profileAge']);
    $profileMajor = sanitizeInput($_POST['profileMajor']);
    $profileText = sanitizeInput($_POST['profileText']);
    $profileName = sanitizeInput($_POST['profileName']);
    $profileEmail = sanitizeInput($_POST['profileEmail']);

    if(empty($_POST['profileNachname'])){
        $profileNachname = $nachname;
    }
    if(empty($_POST['profileVorname'])){
        $profileVorname = $vorname;
    }
    if(empty($_POST['profileEmail'])){
        $profileEmail = $email;
    }
    if(empty($_POST['profileName'])){
        $profileName = $username;
    }
    if(empty($_POST['profileText'])){
        $profileText = $text;
    }
    if(empty($_POST['profileMajor'])){
        $profileMajor = $major;
    }
    if(empty($_POST['profileAge'])){
        $profileAge = $age;
    }
}

    if (!usernameTaken($conn, $username)) { //+emailTaken (funktion noch nicht geschrieben)
        // Prepared Statement da userinput
        // SQL-Query erstellen
        $sql = "UPDATE `users` SET username = ?, vorname = ?, nachname = ?, email = ?, profiletext = ?, age = ?, major = ?
                WHERE username = ?";

        $stmt = $conn->prepare($sql);

        // Parameter binden
        $stmt->bind_param("sssssss", $profileUsername, $profileVorname, $profileNachname, $profileEmail, $profileText, $profileAge, $profileMajor);

        // Prepared Statement ausführen und Ergebnis überprüfen
        if ($stmt->execute()) {
            echo "Daten erfolgreich eingefügt.";
        } else {
            echo "Fehler beim Einfügen der Daten: " . $stmt->error;
        }

        header("Location: ../index.php?page=profile");
        $stmt->close();
        $conn->close();
        exit();
    } else {
        header("Location: ../index.php?page=profile");
        $stmt->close();
        $conn->close();
        exit();
    }

header("Location: ../index.php?page=profile");
$stmt->close();
$conn->close();
exit();
?>
