<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;

class QRController extends Controller
{
    public function generate()
    {
        return QrCode::size(300)->generate('Your text or URL here');
    }
}
