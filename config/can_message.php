<?php
require 'dbaccess.php';
require 'session.php';

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function canMessage($user1, $user2) {
    global $conn;

    // Check if both users have liked each other
    $query = "SELECT * FROM matches WHERE 
              (user_match_1 = ? AND user_match_2 = ? AND likes = 1) OR 
              (user_match_1 = ? AND user_match_2 = ? AND likes = 1)";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        throw new Exception($conn->error);
    }
    $stmt->bind_param("iiii", $user1, $user2, $user2, $user1);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->num_rows == 2;
}

$response = ['can_message' => false];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $to_user_id = $_POST['to_user_id'];
    $from_user_id = $_SESSION['userId'];

    try {
        if (canMessage($from_user_id, $to_user_id)) {
            $response['can_message'] = true;
        }
    } catch (Exception $e) {
        $response['error'] = $e->getMessage();
    }
} else {
    $response['error'] = 'Invalid request';
}

header('Content-Type: application/json');
echo json_encode($response);
?>
