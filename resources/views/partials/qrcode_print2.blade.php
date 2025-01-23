<!DOCTYPE html>
<html>
<head>
    <title>QR Code Auto Download</title>
    <style>
        .print-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .print-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div id="qrCodeContainer">
        {!! $qrCodeValue !!}
    </div>

    <script>
        window.onload = function() {
            // Select the QR code container
            const qrCodeContainer = document.getElementById('qrCodeContainer');

            // Create a canvas element
            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');

            // Get the QR code as an SVG element
            const qrCodeSvg = qrCodeContainer.querySelector('svg');

            // Create an image from the QR code SVG
            const xml = new XMLSerializer().serializeToString(qrCodeSvg);
            const svg64 = btoa(xml);
            const image64 = 'data:image/svg+xml;base64,' + svg64;

            // Create an Image element
            const img = new Image();
            img.onload = function() {
                canvas.width = img.width;
                canvas.height = img.height;

                // Draw the image on the canvas
                context.drawImage(img, 0, 0);

                // Convert the canvas to a PNG data URL
                const pngData = canvas.toDataURL('image/png');

                // Create a download link
                const downloadLink = document.createElement('a');
                downloadLink.href = pngData;
                downloadLink.download = 'qrcode.png';

                // Automatically trigger the download
                downloadLink.click();

                setTimeout(function () {
                    window.close();
                }, 500);
            };

            img.src = image64;
        };
    </script>
</body>
</html>
