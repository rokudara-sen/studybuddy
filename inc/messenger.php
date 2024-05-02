<?php
require 'config/messenger_config.php';
postMessage(); // Handle message posting
$messages = fetchMessages(); // Fetch messages for display
$users = fetchUsers(); // Fetch user list for messaging
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
        <h2>Chat history:</h2>
        <div class="chat-messages p-3 bg-light" style="height: 300px; overflow-y: scroll;">
            <?php foreach ($messages as $msg): ?>
                <div class='bg-white p-2 mb-2 border rounded'>
                    <?= $msg['username'] ?>: <?= htmlspecialchars($msg['message']) ?>
                    <span class='text-muted' style='font-size: 0.8em;'>(<?= date('H:i:s', strtotime($msg['timestamp'])) ?>)</span>
                </div>
            <?php endforeach; ?>
        </div>
        <h1>Messenger</h1>
        <form method="post" class="mb-3">
            <div class="mb-3">
                <label for="to_user_id" class="form-label">To:</label>
                <select name="to_user_id" class="form-select mb-3">
                    <?php foreach ($users as $user): ?>
                        <option value='<?= $user['userID'] ?>'><?= $user['username'] ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="message" class="form-label">Message:</label>
                <textarea id="message" name="message" rows="3" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
