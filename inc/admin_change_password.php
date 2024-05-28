<?php

if (!($_SESSION['userrole'] === "admin")) {
    header("Location: ../index.php?page=home");
    exit();
}
?>
<div class="container-fluid overlay">
  <div class="row">
    <div class="col-md-12">
      <img src="pictures/earth.jpg" class="img-fluid" alt="Responsive Image">
      <div class="text-overlay">
        <h1>Hey, admin!</h1>
        <p>Change user's password</p>
      </div>
    </div>
  </div>
</div>
<div class="update-form">
  <h2>Change the password</h2>
  <form action="config/update_password.php" method="post">
    <label for="userId">UserId:</label>
    <input type="text" readonly name="userId" value="<?php echo $_GET['userID']; ?>">
    <label for="userId">Username:</label>                 <!-- Daten aus URL entnehmen -->
    <input type="text" readonly name="username" value="<?php echo $_GET['username']; ?>">

    <label for="newPassword">Neues Passwort:</label>
    <input type="password" name="newPassword" minlength="6" maxlength="64" required><br><!--kein pattern admin entscheidet selber -->

    <input type="submit" value="Passwort ändern">
  </form>
</div>