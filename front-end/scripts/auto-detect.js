document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('auto-detect-btn').addEventListener('click', function () {
        var file = document.getElementById('image').files[0];

        if (file) {
            var formData = new FormData();
            formData.append('image', file);

            fetch('https://api.ocr.space/parse/image', {
                method: 'POST',
                body: formData,
                headers: {
                    'apikey': 'K87932599288957'
                }
            })
            .then(response => response.json())
            .then(data => {
                var extractedText = data.ParsedResults[0].ParsedText;
                document.getElementById('data_tag').value = extractedText;
            })
            .catch(error => {
                console.error('Error:', error);
            });
        } else {
            console.error('No file selected.');
        }
    });
});
