<?php
require_once 'session.php';
require_once 'functions.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    require_once ('dbaccess.php');

    $username = sanitizeInput($_POST['username']);
    $password = $_POST['password'];
    $error ="";
    // Fetch user data from the database based on the provided username
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {  //password_verify is a php function that compares plain text password with the hashed version
            if ($row['userStatus'] === 'active') {
                // Password is correct, user is not disabled, log in the user and save userdata in session variables
                    $_SESSION['username'] = $username;
                    $_SESSION['userId'] = $row['userId'];

                    if ($row['userTyp'] === "guest" ) { // user login
                        $_SESSION['userrole'] = "guest";
                    }
                    if ($row['userTyp'] === "admin") {  // admin login
                        $_SESSION['userrole'] = "admin";
                    }

               }
               else {
                $error = "Userstatus inactive";
               }
        } else {
            $error = "Invalid password";
        }
    } else {
        $error = "Wrong credentials";
    }
    if ($error) {
        header("Location: ../index.php?page=login&error=$error");
        $stmt->close();
        $conn->close();
        exit();
    }
    // Close the database connection
    $stmt->close();
    $conn->close();
    header("Location: ../index.php?page=home&login=succesfull");
    exit();
} else {
    header("Location: index.php?page=home"); 
    exit();
}
//bei falschem login fehlermeldung über GET Methode
?>

