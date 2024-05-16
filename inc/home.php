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