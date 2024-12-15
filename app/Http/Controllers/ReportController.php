<?php

namespace App\Http\Controllers;

use App\PaymentsReceipt;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function getReport(Request $r)
    {
        $rcptNo = null;
        $v = $r->v;
        if ($r->v) {
            $rcptNo = base64_decode($r->v);
        }
        // return compact('v', 'rcptNo');
        $rectdata = PaymentsReceipt::getByReceiptNoGen($rcptNo);
        $data = compact('rectdata', 'rcptNo');
        return view('up.universal-receipt-print', $data);
    }
}
