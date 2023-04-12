<link rel="stylesheet" href="/css/scanner.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="/css/components.css?v=<?php echo time(); ?>">

<div id="employee-main">
<input type="file" name="image" accept="image/*" capture="environment">
<div>
<div id="qr-reader" style="width:500px"></div>
<div id="qr-reader-results"></div>

<script src="https://unpkg.com/html5-qrcode"></script>
<script src="https://raw.githubusercontent.com/mebjas/html5-qrcode/master/minified/html5-qrcode.min.js"></script>




<script>

var resultContainer = document.getElementById('qr-reader-results');
var lastResult, countResults = 0;

function onScanSuccess(decodedText, decodedResult) {
    if (decodedText !== lastResult) {
        ++countResults;
        lastResult = decodedText;
        // Handle on success condition with the decoded message.
        console.log(`Scan result ${decodedText}`, decodedResult);
        var url = decodedText;
        if (!url.startsWith("http://") && !url.startsWith("https://")) {
            url = "http://" + url;
        }
        
        // Navigate to the URL
        window.location.href = url;

    }
}

var html5QrcodeScanner = new Html5QrcodeScanner(
    "qr-reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess);
</script>