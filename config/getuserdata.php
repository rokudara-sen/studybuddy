<?php
require_once 'functions.php';
require('dbaccess.php');
require_once 'session.php';
$name = $age = $major = $text = $path = ''; 
$username = $_SESSION['username'];
$sql = "SELECT username, age, major, profiletext, picturepath FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
$conn->close();
