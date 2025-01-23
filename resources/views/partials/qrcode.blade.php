<div>
    {!! $qrCodeValue !!}
</div>
<br/>
<a class="btn btn-primary print-button" href="/printqrcode/{!! $qrtext !!}" target="_blank">Print QR Code</a>
<a class="btn btn-success" href="/printqrcode2/{{ $qrtext }}?action=download" target="_blank">Download as JPG</a>