<html>
  <head>
    <script src="./jsQR.js"></script>
  </head>
  <body>
    <div id="result">
      <video></video>
    </div>
    <script>
      const constraints = { audio: false, video: { facingMode: 'environment', width: 500, height: 500 }};
  
      navigator.mediaDevices.getUserMedia(constraints).then((stream) => {
        const video = document.querySelector('video');
        video.srcObject = stream;
        video.play();
  
        const w = constraints.video.width, h = constraints.video.height;
        const canvas = document.createElement('canvas');
        canvas.width = w;
        canvas.height = h;
        const context = canvas.getContext('2d');
  
        const timer = setInterval(() => {
          context.drawImage(video, 0, 0, w, h);
          const imageData = context.getImageData(0, 0, w, h);
          const code = jsQR(imageData.data, imageData.width, imageData.height);
          if (code) {
            clearInterval(timer);
            document.querySelector('#result').textContent = code.data;
          }
        }, 500);
      }).catch((e) => {
        console.log('load error', e);
      });
    </script>
  </body>
</html>