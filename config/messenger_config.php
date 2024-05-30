<?php
require_once 'session.php';
require 'dbaccess.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function postMessage() {
    global $conn;
    if (isset($_SESSION['userId'])) {
        $message = htmlspecialchars($_POST['message']);
        $to_user_id = $_POST['to_user_id'];
        $user_id = $_SESSION['userId'];

        $insert_query = "INSERT INTO messages (from_user_id, to_user_id, message) VALUES ('$user_id', '$to_user_id', '$message')";
        mysqli_query($conn, $insert_query);
    }
}

function fetchMessages($to_user_id) {
    global $conn;
    $messages = [];
    if (isset($_SESSION['userId']) && $to_user_id) {
        $user_id = $_SESSION['userId'];
        $messages_query = "SELECT m.message, m.timestamp, u.username FROM messages m JOIN users u ON m.from_user_id = u.userID WHERE (m.to_user_id = '$user_id' AND m.from_user_id = '$to_user_id') OR (m.to_user_id = '$to_user_id' AND m.from_user_id = '$user_id') ORDER BY m.timestamp ASC";
        $messages_result = mysqli_query($conn, $messages_query);
        while ($msg = mysqli_fetch_assoc($messages_result)) {
            array_push($messages, $msg);
        }
    }
    return $messages;
}

function fetchUsers() {
    global $conn;
    $users = [];
    if (isset($_SESSION['userId'])) {
        $user_id = $_SESSION['userId'];

        // Log the user_id
        error_log("fetchUsers called for user_id: $user_id");

        // Get users who have mutually liked each other
        $users_query = "SELECT DISTINCT u.userID, u.username 
                        FROM users u 
                        JOIN matches m1 ON u.userID = m1.user_match_2 
                        JOIN matches m2 ON u.userID = m2.user_match_1 
                        WHERE m1.user_match_1 = ? AND m1.likes = 1 
                        AND m2.user_match_2 = ? AND m2.likes = 1";

        $stmt = $conn->prepare($users_query);
        if ($stmt === false) {
            error_log("Prepare failed: " . htmlspecialchars($conn->error));
            return $users;
        }

        $stmt->bind_param("ii", $user_id, $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result === false) {
            error_log("Execute failed: " . htmlspecialchars($stmt->error));
            return $users;
        }

        while ($user = $result->fetch_assoc()) {
            array_push($users, $user);
        }

        // Log the results
        error_log("Users fetched: " . json_encode($users));
    }
    return $users;
}
?>
