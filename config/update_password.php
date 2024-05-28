<?php
require_once 'dbaccess.php';
require_once 'session.php';
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['userId'])) {      //falls userId von form kommt ändert admin einen user andernfalls ändert ein angemeldeter user sein passwort
        $newHashedPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
        $userId = $_POST['userId'];
        $sql = "UPDATE users SET password='$newHashedPassword' WHERE userID=$userId";
        $conn->query($sql);
        if ($conn->query($sql) === TRUE) {
            header("Location: ../index.php?page=admin_overview");
            $conn->close();
            exit();
        } else {
            echo "passwortänderung von Admin fehlgeschlagen, sql fehler";
        }
    } else {
        $userId = $_SESSION['userId']; 
    }    

    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];

    // Retrieve the hashed password from the database
    $stmt = $conn->prepare("SELECT password FROM users WHERE userID = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();
    $stmt->close();

    // Check if the old password matches the stored hashed password
    if (password_verify($oldPassword, $hashedPassword)) {
        // If they match, update the password in the database with the new hashed password
        $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $updateStmt = $conn->prepare("UPDATE users SET password = ? WHERE userID= ?");
        $updateStmt->bind_param("si", $newHashedPassword, $userId);

        if ($updateStmt->execute()) {
            echo "PassworDupdated successfully.";
        } else {
            echo "Error updating password: " . $updateStmt->error;
        }

        $updateStmt->close();
    } else {
        echo "Old password is incorrect.";
    }
   
    header("Location: ../index.php?page=userprofile");
    $conn->close();
    exit();
} else {
    header("Location: ../index.php?page=home");
    $conn->close();
    exit();
    }

?>