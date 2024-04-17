<?php
session_start(); // Startet die PHP-Session

// Initialisiert die Nachrichtenliste, falls noch nicht gesetzt
if (!isset($_SESSION['messages'])) {
    $_SESSION['messages'] = [];
}

// Dieser PHP-Code verarbeitet das Absenden des Formulars
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['message'])) {
    $timestamp = new DateTime(); // Erstellt ein DateTime-Objekt für die aktuelle Uhrzeit
    $message = htmlspecialchars($_POST['message']); // Die eingegebene Nachricht wird sicher verarbeitet
    $_SESSION['messages'][] = ['text' => $message, 'time' => $timestamp->format('H:i:s')]; // Fügt die Nachricht mit Uhrzeit zur Session hinzu
}
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Messenger</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2>Chatverlauf:</h2>
        <div class="chat-messages p-3 bg-light" style="height: 300px; overflow-y: scroll;">
            <?php
            // Anzeigen aller gespeicherten Nachrichten
            if (!empty($_SESSION['messages'])) {
                foreach ($_SESSION['messages'] as $msg) {
                    // Sicherstellen, dass $msg ein Array ist und die Schlüssel 'text' und 'time' enthält
                    if (is_array($msg) && isset($msg['text']) && isset($msg['time'])) {
                        echo "<div class='bg-white p-2 mb-2 border rounded'>" . htmlspecialchars($msg['text']) . " <span class='text-muted' style='font-size: 0.8em;'>(" . $msg['time'] . ")</span></div>";
                    }
                }
            }
            ?>
        </div>
        <h1>Messenger</h1>
        <form method="post" class="mb-3">
            <div class="mb-3">
                <label for="message" class="form-label">Nachricht:</label>
                <textarea id="message" name="message" rows="3" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Senden</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>