const recordButton = document.getElementById('recordButton');
const audioPlayer = document.getElementById('audioPlayer');
const downloadButton = document.getElementById('downloadButton');
const audioDataInput = document.getElementById('audioData');
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
            const reader = new FileReader();
            reader.onload = () => {
                const base64Data = reader.result.split(',')[1]; // Extract base64 data
                audioDataInput.value = base64Data; // Set the value of the hidden input field
            };
            reader.readAsDataURL(blob); // Read blob as data URL
            const url = URL.createObjectURL(blob);
            audioPlayer.src = url;
            stream.getTracks().forEach(track => track.stop()); // Stop the media stream

            // Create download link
            const downloadUrl = URL.createObjectURL(blob);
            downloadButton.href = downloadUrl;
            downloadButton.download = 'recorded_audio.wav';
            downloadButton.style.display = 'block';
        };

        mediaRecorder.start();
        recordButton.textContent = 'Stop Recording';
    } catch (error) {
        console.error('Error accessing microphone:', error);
    }
}

function stopRecording() {
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
