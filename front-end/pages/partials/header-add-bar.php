<div class="add-bar">
    <div class="container-add-bar">
        <div class="content-add-bar">
            <h2>Record a thought</h2>
            <!-- Text Form -->
            <form id="form-text" action="../../back-end/pages/content-text.php" method="POST">
                <div class="formfield-group">
                    <label for="data_content">What's on your mind</label><br>
                    <textarea name="data_content" id="data_content" cols="$col" rows="$row" class="formfield"></textarea>
                </div>
                <div class="formfield-group">
                    <label for="data_tag">Tags</label><br>
                    <input type="text" name="data_tag" class="formfield">
                </div>
                <button type="submit" class="button-primary">Save</button>
            </form>
            <!-- Image Form -->
            <form id="form-multimedia" action="../../back-end/pages/content-multimedia.php" method="POST" enctype="multipart/form-data">
                <div class="formfield-group">
                    <label for="image">Upload your file</label><br>
                    <input type="file" id="image" name="image" accept="image/*,video/*,audio/*,.pdf,.doc,.docx,.txt" class="formfield" required multiple>
                </div>
                <div class="formfield-group">
                    <label for="data_tag">Tags</label><br>
                    <input type="text" name="data_tag" class="formfield">
                </div>
                <button type="submit" class="button-primary">Save</button>
            </form>
            <!-- Buttons to toggle forms -->
            <div class="add-data">
                <button onclick="toggleForm('form-text')" data-form-id="form-text" class="active button-icon">
                    <img src="../assets/icons/textnote.svg" alt="">
                </button>
                <button onclick="toggleForm('form-multimedia')" data-form-id="form-image" class="button-icon">
                    <img src="../assets/icons/image.svg" alt="">
                </button>
            </div>
        </div>
    </div>
</div>