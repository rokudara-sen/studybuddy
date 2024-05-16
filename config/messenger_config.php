<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require 'dbaccess.php';

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
        $users_query = "SELECT userID, username FROM users WHERE userID != '$user_id'";
        $users_result = mysqli_query($conn, $users_query);
        while ($user = mysqli_fetch_assoc($users_result)) {
            array_push($users, $user);
        }
    }
    return $users;
}
?>