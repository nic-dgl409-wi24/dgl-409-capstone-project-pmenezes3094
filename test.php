<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audio Recorder</title>
    <style>
        /* Styles for the form and buttons */
        button {
            margin-bottom: 10px;
        }

        /* Style for the recorded audio element */
        #recordedAudio {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <form id="myForm" action="#" method="POST">
        <button id="recordButton">Start Recording</button>
        <audio id="audioPlayer" controls></audio>
        <a id="downloadButton" style="display: none;">Download Audio</a>
        <!-- Hidden input field to store audio blob URL -->
        <input type="hidden" id="audioInput" name="audioInput">
        
        <!-- Field to display the recorded audio -->
        <label for="recordedAudio">Recorded Audio:</label><br>
        <audio id="recordedAudio" controls style="display: none;"></audio>

        <input type="submit" value="Submit">
    </form>

    <script>
        const recordButton = document.getElementById('recordButton');
        const audioPlayer = document.getElementById('audioPlayer');
        const downloadButton = document.getElementById('downloadButton');
        const audioInput = document.getElementById('audioInput'); // Hidden input field to store audio blob URL
        const recordedAudio = document.getElementById('recordedAudio'); // Audio element to display recorded audio
        let mediaRecorder;
        let chunks = [];
        let stream;

        async function startRecording() {
            try {
                stream = await navigator.mediaDevices.getUserMedia({ audio: true });
                mediaRecorder = new MediaRecorder(stream);

                mediaRecorder.ondataavailable = (e) => {
                    chunks.push(e.data);
                };

                mediaRecorder.onstop = () => {
                    const blob = new Blob(chunks, { type: 'audio/wav' });
                    const url = URL.createObjectURL(blob);
                    audioPlayer.src = url;
                    stream.getTracks().forEach(track => track.stop()); // Stop the media stream

                    // Set input field value to the blob URL
                    audioInput.value = url;

                    // Set recorded audio element source
                    recordedAudio.src = url;
                    recordedAudio.style.display = 'block'; // Make recorded audio element visible
                    recordButton.disabled = true; // Disable record button after recording is completed
                };

                mediaRecorder.start();
                recordButton.textContent = 'Stop Recording';
            } catch (error) {
                console.error('Error accessing microphone:', error);
            }
        }

        function stopRecording() {
            console.log("Stop recording function called.");
            console.log("Media Recorder state:", mediaRecorder.state);
            if (mediaRecorder && mediaRecorder.state === 'recording') {
                mediaRecorder.stop();
                recordButton.textContent = 'Start Recording';
            }
        }

        recordButton.addEventListener('click', () => {
            if (mediaRecorder && mediaRecorder.state === 'recording') {
                stopRecording();
            } else {
                startRecording();
            }
        });
    </script>
</body>
</html>

