<?php
if (isset($_GET['login'])) {
    $_SESSION['loggedin'] = true;
    header('Location: index.php');
}

if (isset($_GET['logout'])) {
    unset($_SESSION['loggedin']);
    header('Location: index.php');
}

if (!isset($_SESSION['username'])) { 
    header('Location: index.php');
 }

$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'];
?>

<div class="center-container">
    <div class="card text-center text-bg-dark" style="width: 50rem;">
        <div class="card-header lead">
            <?php echo $row['username']?> | <?php echo $row['age']?> | <?php echo $row['major']?>
        </div>
            <img src="res/img/<?php echo $row['picturepath']?>" class="card-img-top img-fluid" alt="kein Profilbild">
        <div class="card-body">
            <p class="card-text"><?php echo $row['profiletext']?></p>
         </div>
        <div class="card-body">
            <a href="#" class="btn btn-primary">Send Like</a>
            <a href="#" class="btn btn-primary">Go Next</a>
        </div>
    </div>
</div>