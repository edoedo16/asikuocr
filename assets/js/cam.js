// Mendapatkan elemen video
var video = document.getElementById('video');

// Mendapatkan akses ke kamera
navigator.mediaDevices.enumerateDevices()
  .then(function(devices) {
    var cameras = devices.filter(function(device) {
      return device.kind === 'videoinput';
    });

    if (cameras.length > 0) {
      var constraints = { video: { deviceId: cameras[0].deviceId } };

      return navigator.mediaDevices.getUserMedia(constraints);
    } else {
      throw new Error('Tidak ada kamera yang tersedia.');
    }
  })
  .then(function(stream) {
    video.srcObject = stream;
    video.play();
  })
  .catch(function(err) {
    console.log("Error accessing camera:", err);
  });

// Fungsi untuk mengambil foto
function takePicture() {
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

