<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

    <link rel="stylesheet" href="../styles/style.css">
</head>


<body>
    <div class="hotspot"><a href="register-form.php">next</a></div>

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
                        </div>
                        <button type="submit" class="button-primary">Login</button>
                    </form>
                    <p>Not registered? <a href="register.html">Register here</a></p>
                </div>
            </div>
        </div>
    </main>

    <script src="../scripts/script.js"></script>
</body>

</html>