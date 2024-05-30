<?php
session_start();
require '../config/dbaccess.php';

$input = json_decode(file_get_contents('php://input'), true);

if (isset($input['id'])) {
    $profileId = (int) $input['id'];
    $userId = $_SESSION['userId'];

    if ($userId && $profileId) {
        // Check if there's already a match entry
        $checkMatchQuery = "SELECT * FROM matches WHERE (user_match_1 = ? AND user_match_2 = ?) OR (user_match_1 = ? AND user_match_2 = ?)";
        $stmt = $conn->prepare($checkMatchQuery);
        $stmt->bind_param("iiii", $userId, $profileId, $profileId, $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // If a match entry exists, update it
            $updateMatchQuery = "UPDATE matches SET likes = CASE
                                 WHEN user_match_1 = ? THEN 1
                                 WHEN user_match_2 = ? THEN 1
                                 END
                                 WHERE (user_match_1 = ? AND user_match_2 = ?) OR (user_match_1 = ? AND user_match_2 = ?)";
            $updateStmt = $conn->prepare($updateMatchQuery);
            $updateStmt->bind_param("iiiiii", $userId, $userId, $userId, $profileId, $profileId, $userId);
            $updateStmt->execute();
        } else {
            // If no match entry exists, create a new one
            $insertMatchQuery = "INSERT INTO matches (user_match_1, user_match_2, likes) VALUES (?, ?, 1)";
            $insertStmt = $conn->prepare($insertMatchQuery);
            $insertStmt->bind_param("ii", $userId, $profileId);
            $insertStmt->execute();
        }

        // Add the swiped profile to the session
        if (!isset($_SESSION['swipedProfiles'])) {
            $_SESSION['swipedProfiles'] = [];
        }
        $_SESSION['swipedProfiles'][] = $profileId;

        // Respond with a success message
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid user ID or profile ID']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid input']);
}
?>
