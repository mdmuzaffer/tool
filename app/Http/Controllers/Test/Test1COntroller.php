<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use SimpleSoftwareIO\QrCode;
use QrCode;

class Test1COntroller extends Controller
{
    public function testQR(Request $r)
    {
        return $_SERVER;
        return view('test.qr');
    }
}
