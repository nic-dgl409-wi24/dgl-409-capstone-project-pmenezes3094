<?php require 'partials/head.php'; ?>



    <main class="pre-login-display-card">
        <div class="container">
            <div class="card-display">
                <div class="content-card-display">
                    <div class="pre-login-logo">
                        <h1>Project Abundance</h1>
                    </div>
                    <form action="../../back-end/pages/register.php" method="post">
                        <div class="form-group">
                            <label for="user_firstName">First Name</label>
                            <input type="text" id="firstname" name="user_firstName" class="formfield" required>
                        </div>
                        <div class="form-group">
                            <label for="user_lastName">Last Name</label>
                            <input type="text" id="lastname" name="user_lastName" class="formfield" required>
                        </div>
                        <div class="form-group">
                            <label for="user_username">Username</label>
                            <input type="text" id="username" name="user_username" class="formfield" required>
                        </div>
                        <div class="form-group">
                            <label for="user_email">Email</label>
                            <input type="email" id="email" name="user_email" class="formfield" required>
                        </div>
                        <div class="form-group">
                            <label for="user_password">Password</label>
                            <input type="password" id="password" name="user_password" class="formfield" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirm Password</label>
                            <input type="password" id="confirm-password" name="confirm-password" class="formfield" required>
                        </div>
                        <button type="submit" class="button-primary">Register</button>
                    </form>
                    <p>Already registered? <a href="login-view.php">Login here</a></p>
                </div>
            </div>
        </div>
    </main>

<?php require 'partials/closing.php'; ?>