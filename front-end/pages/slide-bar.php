<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>slide bar</title>

    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
    <div class="hotspot"><a href="login-form.php">next</a></div>

    <header>
        <div class="container nav-bar">
            <div class="logo">
                <h1>Project Abundance</h1>
            </div>
            <nav>
                <button class="add button-icon">
                    <img src="../assets/icons/add.svg" alt="">
                </button>
                <button class="search button-icon">
                    <img src="../assets/icons/search.svg" alt="">
                </button>
                <button class="setting button-icon">
                    <img src="../assets/icons/setting.svg" alt="">
                </button>
                <button class="logout button-icon">
                    <img src="../assets/icons/logout.svg" alt="">
                </button>
            </nav>
        </div>
    </header>

    <div class="search-bar">
        <div class="container search-bar-container">
            <div class="content-search-bar">
                <h2>Search</h2>
                <form action="">
                    <label for="search">Search your Thought Treasury</label>
                    <div class="search-field">
                        <input type="search" id="search" name="search" class="formfield">
                        <button type="submit" class="button-icon"><img src="../assets/icons/search.svg" alt=""></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="add-bar">
        <div class="container add-bar-container">
            <div class="content-add-bar">
                <h2>Record a thought</h2>
                <div class="add-bar-actions">
                    <form action="">
                        <label for="message">What's on your mind?</label>
                        <div class="message-field">
                            <textarea id="message" name="message" rows="4" cols="50" class="formfield"></textarea>
                            <button type="submit" class="button-icon"><img src="../assets/icons/send.svg"
                                    alt=""></button>
                        </div>
                    </form>
                    <div class="add-data">
                        <button class="upload button-icon">
                            <img src="../assets/icons/upload.svg" alt="">
                        </button>
                        <button class="microphone button-icon">
                            <img src="../assets/icons/microphone.svg" alt="">
                        </button>
                        <button class="camera button-icon">
                            <img src="../assets/icons/camera.svg" alt="">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../scripts/script.js"></script>
</body>

</html>