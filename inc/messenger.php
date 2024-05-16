<?php
require 'config/messenger_config.php';
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Messenger</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        <h1>Messenger</h1>
        <div class="mb-3">
            <label for="to_user_id" class="form-label">Select User to Chat With:</label>
            <select id="to_user_id" name="to_user_id" class="form-select mb-3">
                <option value="">Select a user</option>
                <?php foreach (fetchUsers() as $user): ?>
                    <option value='<?= $user['userID'] ?>'><?= $user['username'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <h2>Chat history:</h2>
        <div id="chat-messages" class="chat-messages p-3 bg-light" style="height: 300px; overflow-y: scroll;"></div>

        <form id="message-form" method="post" class="mb-3">
            <div class="mb-3">
                <label for="message" class="form-label">Message:</label>
                <textarea id="message" name="message" rows="3" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function fetchMessages(toUserId) {
            $.ajax({
                url: 'config/fetch_messages.php',
                method: 'GET',
                data: {to_user_id: toUserId},
                success: function(data) {
                    $('#chat-messages').html(data);
                    $('#chat-messages').scrollTop($('#chat-messages')[0].scrollHeight);
                }
            });
        }

        $('#to_user_id').change(function() {
            var toUserId = $(this).val();
            if (toUserId) {
                fetchMessages(toUserId);
            } else {
                $('#chat-messages').html('');
            }
        });

        $('#message-form').submit(function(e) {
            e.preventDefault();
            var toUserId = $('#to_user_id').val();
            if (!toUserId) {
                alert('Please select a user to chat with.');
                return;
            }
            $.ajax({
                url: 'config/post_message.php',
                method: 'POST',
                data: $(this).serialize() + '&to_user_id=' + toUserId,
                success: function() {
                    $('#message').val('');
                    fetchMessages(toUserId);
                }
            });
        });

        $(document).ready(function() {
            // Initially load messages for the first user in the list if any
            var initialUserId = $('#to_user_id').val();
            if (initialUserId) {
                fetchMessages(initialUserId);
            }
        });
    </script>
</body>
</html>
