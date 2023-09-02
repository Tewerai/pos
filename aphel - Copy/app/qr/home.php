<!DOCTYPE html>
<html>
  <head>
  </head>
  
  <body>
    <div id="reader" width="600px"></div>
  </body>
  <script src="https://unpkg.com/html5-qrcode" type="text/javascript"> </script>
  <script>
// This method will trigger user permissions
Html5Qrcode.getCameras().then(devices => {
  if (devices && devices.length) {
    var cameraId = devices[1].id;
    const html5QrCode = new Html5Qrcode(/* element id */ "reader");
html5QrCode.start(
  cameraId, 
  {
    fps: 10,    // Optional, frame per seconds for qr code scanning
    qrbox: { width: 450, height: 450 }  // Optional, if you want bounded box UI
  },
  (decodedText, decodedResult) => {
    // do something when code is read
  },
  (errorMessage) => {
    // parse error, ignore it.
  })
.catch((err) => {
  // Start failed, handle it.
});
    
  }
}).catch(err => {
  alert(err)
});
    
  </script>
</html>