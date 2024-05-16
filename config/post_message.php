<?php
require 'messenger_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message']) && isset($_POST['to_user_id'])) {
    postMessage();
}
?>
