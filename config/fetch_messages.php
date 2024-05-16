<?php
require 'messenger_config.php';
$to_user_id = $_GET['to_user_id'];
$messages = fetchMessages($to_user_id);
foreach ($messages as $msg) {
    echo "<div class='bg-white p-2 mb-2 border rounded'>";
    echo htmlspecialchars($msg['username']) . ": " . htmlspecialchars($msg['message']);
    echo "<span class='text-muted' style='font-size: 0.8em;'>(" . date('H:i:s', strtotime($msg['timestamp'])) . ")</span>";
    echo "</div>";
}
