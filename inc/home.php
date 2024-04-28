<?php
if (isset($_GET['login'])) {
    $_SESSION['loggedin'] = true;
    header('Location: index.php');
}

if (isset($_GET['logout'])) {
    unset($_SESSION['loggedin']);
    header('Location: index.php');
}

$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>

<div class="center-container">
    <div class="card text-center text-bg-dark" style="width: 50rem;">
        <div class="card-header">
            NAME | MAJOR | AGE
        </div>
        <img src="res/img/test.jpg" class="card-img-top" alt="test">
        <div class="card-body">
            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis officia et
                accusantium minima aut recusandae vel voluptas a nostrum, exercitationem animi accusamus nihil autem
                iure. Qui facere beatae sequi perspiciatis?</p>
        </div>
    </div>
</div>

<div class="center-container">
    <div class="card text-center text-bg-dark" style="width: 50rem;">
        <div class="card-header">
            NAME | MAJOR | AGE
        </div>
        <img src="res/img/test.jpg" class="card-img-top" alt="test">
        <div class="card-body">
            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis officia et
                accusantium minima aut recusandae vel voluptas a nostrum, exercitationem animi accusamus nihil autem
                iure. Qui facere beatae sequi perspiciatis?</p>
        </div>
    </div>
</div>

<p><a href="?login=true">Log In</a> | <a href="?logout=true">Log Out</a></p>

</body>
</html>
