<?php
require_once  '../config/dbaccess.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the form is submitted using POST method

    // Retrieve user ID from the form
    $userId = $_POST["userId"];

    // Retrieve other form data
    $userVorname = $_POST["userVorname"];
    $userNachname = $_POST["userNachname"];
    $userEmail = $_POST["userEmail"];
    $username = $_POST["username"];
    $userTyp = $_POST["userTyp"];
    $userPassword = $newHashedPassword = password_hash($_POST['userPassword'], PASSWORD_DEFAULT);

    // Update the user information in the database
    $sql = "UPDATE users SET 
            vorname='$userVorname', 
            nachname='$userNachname', 
            email='$userEmail', 
            username='$username', 
            userTyp='$userTyp'
            WHERE userID=$userId";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    header("Location: ../index.php?page=userverwaltung");
    $conn->close();
    exit();
} else {
    // Redirect to the edit_user.php page if accessed directly without form submission
    header("Location: ../index.php?page=home");
    $conn->close();
    exit();
}

// Close the database connection
    header("Location: ../index.php?page=home");
    $conn->close();
    exit();
?>
