<?php
// Start the session and include database access
//if (session_status() == PHP_SESSION_NONE) {
//    session_start();
//}
// hier session.php inkludieren :D
require_once 'session.php';
require 'config/dbaccess.php';

// Function to handle message posting
function postMessage() {
    global $conn;
    if (isset($_SESSION['userId']) && $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message'])) {
        $message = htmlspecialchars($_POST['message']);
        $to_user_id = $_POST['to_user_id'];
        $user_id = $_SESSION['userId'];

        $insert_query = "INSERT INTO messages (from_user_id, to_user_id, message) VALUES ('$user_id', '$to_user_id', '$message')";
        mysqli_query($conn, $insert_query);
    }
}

// Function to fetch messages
function fetchMessages() {
    global $conn;
    $messages = [];
    if (isset($_SESSION['userId'])) {
        $user_id = $_SESSION['userId'];
        $messages_query = "SELECT m.message, m.timestamp, u.username FROM messages m JOIN users u ON m.from_user_id = u.userID WHERE m.to_user_id = '$user_id' OR m.from_user_id = '$user_id' ORDER BY m.timestamp DESC";
        $messages_result = mysqli_query($conn, $messages_query);
        while ($msg = mysqli_fetch_assoc($messages_result)) {
            array_push($messages, $msg);
        }
    }
    return $messages;
}

// Function to fetch users for messaging
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
