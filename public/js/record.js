// public/js/record.js

const startButton = document.getElementById('startRecord');
const stopButton = document.getElementById('stopRecord');
const audioPlayer = document.getElementById('audioPlayer');


let mediaRecorder;
let audioChunks = [];

startButton.addEventListener('click', async () => {
    const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
    mediaRecorder = new MediaRecorder(stream);

    mediaRecorder.ondataavailable = event => {
        if (event.data.size > 0) {
            audioChunks.push(event.data);
        }
    };

    mediaRecorder.onstop = () => {
        const audioBlob = new Blob(audioChunks, { type: 'audio/wav' });
        const formData = new FormData();
        formData.append('audio', audioBlob, 'recording.wav');

        fetch('/saveAudio', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            console.log(data.audio_url);
            audioPlayer.src = data.audio_url;
            audioPlayer.play();
        });

        startButton.disabled = false;
        stopButton.disabled = true;
        audioChunks = [];
    };

    mediaRecorder.start();
    startButton.disabled = true;
    stopButton.disabled = false;
});

stopButton.addEventListener('click', () => {
    mediaRecorder.stop();
});
