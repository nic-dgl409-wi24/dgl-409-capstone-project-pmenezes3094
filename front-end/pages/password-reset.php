<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>password reset</title>

    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
    <div class="hotspot"><a href="dashboard-first-time.php">next</a></div>

    <main class="pre-login-display-card">
        <div class="container">
            <div class="card-display">
                <div class="content-card-display">
                    <div class="pre-login-logo">
                        <h1>Project Abundance</h1>
                    </div>
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" class="formfield" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="formfield" required>
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" id="password" name="password" class="formfield" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirm Password</label>
                            <input type="password" id="confirm-password" name="confirm-password" class="formfield" required>
                        </div>
                        <button type="submit" class="button-primary">Reset Password</button>
                    </form>
                    <p>Remembered your password? <a href="login.html">Login here</a></p>
                </div>
            </div>
        </div>
    </main>

    <script src="../scripts/script.js"></script>
</body>

</html>