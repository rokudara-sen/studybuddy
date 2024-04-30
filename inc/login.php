<div class="login-container">
    <div class="login-box">
        <?php if (isset($_GET["register"])): ?>
            <div class="success">Register was successful!</div>
        <?php endif; ?>

        <form class="p-3 mt-3" action="config/login_verify.php" method="POST">
            <div class="form-field">
                <span class="far fa-user"></span>
                <input type="text" name="username" id="username" placeholder="Username" required>
            </div>
            <div class="form-field">
                <span class="fas fa-key"></span>
                <input type="password" id="password" name="password" placeholder="Passwort" required>
            </div>
            <button type="submit" class="btn btn-login">Login</button>
        </form>

        <div class="text-center fs-6 login-message">
            No account yet? You can register <a href="index.php?page=registration">here!</a>
            <br>
        </div>

        <?php if (isset($_GET['error'])): ?>
            <div class="error"><?php echo htmlspecialchars($_GET['error']); ?></div>
        <?php endif; ?>
    </div>
</div>
