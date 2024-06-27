<?php
require 'messenger_config.php';

if (isset($_GET['to_user_id'])) {
    $to_user_id = $_GET['to_user_id'];
    $messages = fetchMessages($to_user_id);
    foreach (array_reverse($messages) as $msg) {
        echo "<div class='message p-2 mb-2 border rounded'>";
        echo htmlspecialchars($msg['username']) . ": " . htmlspecialchars($msg['message']);
        echo "<span class='text-muted' style='font-size: 0.8em;'>(" . date('H:i:s', strtotime($msg['timestamp'])) . ")</span>";
        echo "</div>";
    }
}
?>

<style>
    .message {
        background-color: #ffffff;
        color: #000000;
    }

    body.dark-mode .message {
        background-color: #333333;
        color: #ffffff;
    }

    .chat-messages {
        background-color: #f8f9fa;
        color: #000000;
    }

    body.dark-mode .chat-messages {
        background-color: #1e1e1e;
        color: #ffffff;
    }
</style>
