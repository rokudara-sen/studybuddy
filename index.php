<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    

    <title>Study Buddy</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="res/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

<?php 
require 'config/session.php';
include 'inc/header.php';
require 'config/getuserdata.php';
?>
<div id="content">
<?php


if (isset($_GET['page']) && !empty($_GET['page'])) {
    switch ($_GET['page']) {
        case 'home':
            include 'inc/home.php';
            break;
        case 'profile':
            include 'inc/profile.php';
            break;
        case 'settings':
            include 'inc/settings.php';
            break;
        case 'registration':
            include 'inc/registration.php';
            break;
        case 'login':
            include 'inc/login.php';
            break;
        case 'logout':
            include 'config/logout.php';
            break;
        case 'imprint':
            include 'inc/imprint.php';
            break;
        case 'faq':
            include 'inc/faq.php';
            break;
        case 'messenger':
            include 'inc/messenger.php';
            break;
        case 'userverwaltung':
            include 'inc/admin_overview.php';
            break;
        case 'admin_edit_user':
            include 'inc/admin_edit_user.php';
            break;
        case 'admin_change_password':
            include 'inc/admin_change_password.php';
            break;
        case 'userreports':
            include 'inc/admin_userreports.php';
            break;
        default:
                include 'inc/home.php';
                break; 
    }
}
?>
</div>
<?php include 'inc/footer.php'; ?>
</body>

</html>