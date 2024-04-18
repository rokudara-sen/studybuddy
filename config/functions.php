<?php 
function sanitizeInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

function usernameTaken($conn, $username) {
    $sql = "SELECT * FROM users WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?page=reg&error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        mysqli_stmt_close($stmt);
        return true;  // Username already taken
    } else {
        mysqli_stmt_close($stmt);
        return false; // Username not taken
    }
}

function emailTaken($conn, $email) {
    $sql = "SELECT * FROM users WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?page=reg&error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        mysqli_stmt_close($stmt);
        return true;  // Email already taken
    } else {
        mysqli_stmt_close($stmt);
        return false; // Email not taken
    }
}

function passwordDifferent($pwd1, $pwd2) {
    if ($pwd1 !== $pwd2) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
?>
?>