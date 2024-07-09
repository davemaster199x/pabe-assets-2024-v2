<!DOCTYPE html>
<html>
<head>
    <title>QR Code with Print Button</title>
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
    <div>
        {!! $qrCodeValue !!}
    </div>
    <button class="print-button" onclick="printQrCode()">Print QR Code</button>

    <script>
        function printQrCode() {
            var printContents = document.querySelector('div').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
</body>
</html>
