<div class="add-bar">
    <div class="container-add-bar">
        <div class="content-add-bar">
            <h2>Record a thought</h2>
            <form action="../../back-end/pages/content-text.php" method="POST">
                <div class="formfield-group">
                    <label for="data_content">What's on your mind</label><br>
                    <textarea name="data_content" id="data_content" cols="10" rows="4" class="formfield"></textarea>
                </div>
                <div class="formfield-group">
                    <label for="data_tag">Tags</label><br>
                    <input type="text" name="data_tag" class="formfield">
                </div>
                <div class="add-bar-all-options">
                    <button type="submit" class="button-primary">Save</button>
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
            </form>
        </div>

    </div>
</div>