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
        window.onload = function () {
            const qrCodeContainer = document.getElementById('qrCodeContainer');
            const qrCodeSvg = qrCodeContainer.querySelector('svg');

            if (!qrCodeSvg) {
                console.error("SVG QR code not found.");
                return;
            }

            const xml = new XMLSerializer().serializeToString(qrCodeSvg);
            const svg64 = btoa(unescape(encodeURIComponent(xml)));
            const image64 = 'data:image/svg+xml;base64,' + svg64;

            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');
            const img = new Image();

            img.onload = function () {
                canvas.width = img.width;
                canvas.height = img.height;
                context.drawImage(img, 0, 0);

                
                const pngData = canvas.toDataURL('image/png');

                const downloadLink = document.createElement('a');
                downloadLink.href = pngData;

                // Sanitize the QR value to use as a filename
                const rawValue = @json($rawValue ?? 'qr'); // you pass this in your controller
                const safeFileName = rawValue.replace(/[^a-z0-9]/gi, '_').toLowerCase();

                downloadLink.download = `QR-${safeFileName}.png`;
                downloadLink.click();

                setTimeout(() => {
                    window.close();
                }, 500);
            };

            img.src = image64;
        };
    </script>
</body>
</html>
