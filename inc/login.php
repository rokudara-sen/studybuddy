<?php
//login daweil nur mit username

  // if ($_SESSION['userrole'] == "guest") {
    //  header("Location: index.php?page=home");
  //    exit();
 //}
?>

<!--  ab jetzt anmeldeform -->

<div class="">    
  
    <?php if (isset($_GET["register"])){
      echo "<div class='loginsuccess'>Register was successful!</div>";
    } ?>
    <form class="p-3 mt-3" action="config/login_verify.php" method="POST">
        <div class="form-field d-flex align-items-center">
            <span class="far fa-user"></span>
            <input type="text" name="username" id="username" placeholder="Username" required>
        </div>
        <div class="form-field d-flex align-items-center">
            <span class="fas fa-key"></span>
            <input type="password" id="password" name="password" placeholder="Passwort" required>
        </div>
        <button class="btn mt-3">Login</button>
    </form>
    <div class="text-center fs-6">
        New in Space? You can register <a href="index.php?page=reg">here!</a>
        <br>
    </div>
    <?php
    if (isset($_GET['error'])) {
      $error = $_GET['error'];
      echo "<p class='fehlermeldung'>$error!</p>";
    }
    ?>
</div>
