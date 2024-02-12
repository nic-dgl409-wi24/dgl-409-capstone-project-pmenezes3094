<?php require 'partials/head.php'; ?>
    <main class="pre-login-display-card">
    <div class="container">
        <div class="card-display">
            <div class="content-card-display">
                <div class="pre-login-logo">
                    <h1>Project Abundance</h1>
                </div>
                <form action="../../back-end/pages/login.php" method="post">
                    <div class="formfield-group">
                        <label for="user_username">Username</label>
                        <input type="text" id="username" name="user_username" class="formfield" required>
                    </div>
                    <div class="formfield-group">
                        <label for="user_password">Password</label>
                        <input type="password" id="password" name="user_password" class="formfield" required>
                        <a href="password-reset-view.php">Forgot password?</a> <!-- Add the forgot password link -->
                    </div>
                    <button type="submit" class="button-primary">Login</button>
                </form>
                <p>Not registered? <a href="register-view.php">Register here</a></p>
            </div>
        </div>
    </div>
</main>
<?php require 'partials/closing.php'; ?>