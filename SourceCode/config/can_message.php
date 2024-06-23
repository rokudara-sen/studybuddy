<?php
require 'dbaccess.php';
require 'session.php';

// Fehlerberichterstattung aktivieren
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function canMessage($user1, $user2)
{
    global $conn;

    // Überprüfen, ob beide Benutzer sich gegenseitig gematcht haben
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
    // Überprüfen, ob die erforderlichen POST-Daten vorhanden sind
    if (isset($_POST['to_user_id']) && isset($_SESSION['userId'])) {
        $to_user_id = $_POST['to_user_id'];
        $from_user_id = $_SESSION['userId'];

        try {
            // Überprüfen, ob die Benutzer Nachrichten senden können
            if (canMessage($from_user_id, $to_user_id)) {
                $response['can_message'] = true;
            }
        } catch (Exception $e) {
            $response['error'] = $e->getMessage();
        }
    } else {
        $response['error'] = 'Missing data';
    }
} else {
    $response['error'] = 'Invalid request';
}

// Antwort im JSON-Format senden
header('Content-Type: application/json');
echo json_encode($response);
