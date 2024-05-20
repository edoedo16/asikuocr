// Mendapatkan elemen video
var video = document.getElementById('video');
var facingMode = 'user';

// Mendapatkan akses ke kamera
function startCamera() {
    navigator.mediaDevices.enumerateDevices()
        .then(function(devices) {
            var cameras = devices.filter(function(device) {
                return device.kind === 'videoinput';
            });

            if (cameras.length > 0) {
                facingMode = (facingMode === 'user') ? 'environment' : 'user'; // Toggle kamera belakang/depan
                var constraints = { video: { facingMode: facingMode } };

                return navigator.mediaDevices.getUserMedia(constraints);
            } else {
                alert('Tidak ada kamera belakang yang tersedia.');
            }
        })
        .then(function(stream) {
            video.srcObject = stream;
            video.play();
        })
        .catch(function(err) {
            console.log("Error accessing camera:", err);
        });
}

// Fungsi untuk mengambil foto
function takePicturee() {
  // Mendapatkan konteks canvas
  var canvas = document.createElement('canvas');
  canvas.width = video.videoWidth;
  canvas.height = video.videoHeight;
  var context = canvas.getContext('2d');

  // Menggambar gambar dari video ke canvas
  context.drawImage(video, 0, 0, canvas.width, canvas.height);

  // Mengubah data canvas menjadi URL data gambar
  var dataUrl = canvas.toDataURL('image/png');

  // Memasukkan URL data gambar ke dalam form
  document.getElementById('picture').value = dataUrl;

  // Menampilkan gambar pada elemen video
  video.style.display = 'block';
  video.src = dataUrl;
}

function switchCamera() {
    startCamera(); // Memanggil fungsi startCamera untuk mengganti kamera
}

document.addEventListener('DOMContentLoaded', startCamera);

