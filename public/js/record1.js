// public/js/record.js
console.log('Script is running');

let mediaRecorder;
let audioChunks = [];

async function startRecording(commandeId) {
    var startButton = document.getElementById('startRecord_' + commandeId);
    var audioPlayer = document.getElementById('audioPlayer_' + commandeId);
    var stopButton = document.getElementById('stopRecord_' + commandeId);
    // var saveButton = document.getElementById('saveButton_' + commandeId);

    // Your logic to start recording...
        const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
        var mediaRecorder = new MediaRecorder(stream);

        mediaRecorder.start();
        startButton.disabled = true;
        stopButton.disabled = false;
        console.log(stopButton)
        // console.log(mediaRecorder);
        
        // mediaRecorder.ondataavailable = event => {
        //     console.log("test");
        //     if (event.data.size > 0) {
        //         audioChunks.push(event.data);
        //     }
        // };
        try {
            // existing code
        
            mediaRecorder.ondataavailable = event => {
                if (event.data) {
                    audioChunks.push(event.data);
                    console.log("test");
                }
            };
        
            // existing code
        
        } catch (error) {
            console.error('Error:', error);
        }
        
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
                console.log('Recording played for commande with ID:', commandeId);
            });
    
            startButton.disabled = false;
            stopButton.disabled = true;
            audioChunks = [];
        };

        

    // console.log('Recording started for commande with ID:', commandeId);
}
function stopRecording(commandeId) {
    
    // Your logic to start recording...
    mediaRecorder.stop();
    
    console.log('Recording stoped for commande with ID:', commandeId);
}

function saveRecording(commandeId) {
    // var saveButton = document.getElementById('saveButton_' + commandeId);
    // Your logic to start recording...
    console.log('Recording saved for commande with ID:', commandeId);
}





