<?php
session_start();
require '../config/dbaccess.php';

// JSON-Daten vom Frontend erhalten
$input = json_decode(file_get_contents('php://input'), true);

if (isset($input['id'])) {
    $profileId = (int) $input['id'];
    $userId = $_SESSION['userId'];

    if ($userId && $profileId) {
        // Überprüfen, ob bereits ein Match-Eintrag vorhanden ist
        $checkMatchQuery = "SELECT * FROM matches WHERE (user_match_1 = ? AND user_match_2 = ?) OR (user_match_1 = ? AND user_match_2 = ?)";
        $stmt = $conn->prepare($checkMatchQuery);
        $stmt->bind_param("iiii", $userId, $profileId, $profileId, $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Wenn ein Match-Eintrag vorhanden ist, aktualisiere ihn
            $updateMatchQuery = "UPDATE matches SET likes = CASE
                                 WHEN user_match_1 = ? THEN 1
                                 WHEN user_match_2 = ? THEN 1
                                 END
                                 WHERE (user_match_1 = ? AND user_match_2 = ?) OR (user_match_1 = ? AND user_match_2 = ?)";
            $updateStmt = $conn->prepare($updateMatchQuery);
            $updateStmt->bind_param("iiiiii", $userId, $userId, $userId, $profileId, $profileId, $userId);
            $updateStmt->execute();
        } else {
            // Wenn kein Match-Eintrag vorhanden ist, erstelle einen neuen
            $insertMatchQuery = "INSERT INTO matches (user_match_1, user_match_2, likes) VALUES (?, ?, 1)";
            $insertStmt = $conn->prepare($insertMatchQuery);
            $insertStmt->bind_param("ii", $userId, $profileId);
            $insertStmt->execute();
        }

        // Füge das gewischte Profil zur Session hinzu
        if (!isset($_SESSION['swipedProfiles'])) {
            $_SESSION['swipedProfiles'] = [];
        }
        $_SESSION['swipedProfiles'][] = $profileId;

        // Antworte mit einer Erfolgsmeldung
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Ungültige Benutzer-ID oder Profil-ID']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Ungültige Eingabe']);
}
