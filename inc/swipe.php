<?php
session_start();
$input = json_decode(file_get_contents('php://input'), true);

if (isset($input['id'])) {
    $profileId = (int) $input['id'];

    // Add the swiped profile to the session
    if (!isset($_SESSION['swipedProfiles'])) {
        $_SESSION['swipedProfiles'] = [];
    }
    $_SESSION['swipedProfiles'][] = $profileId;

    // Respond with a success message
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
?>
