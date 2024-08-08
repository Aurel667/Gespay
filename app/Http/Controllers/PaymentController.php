<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function update(Payment $payment)
    {
        $payment->status = true;
        $payment->date = date('Y-m-d');
        $payment->save();
        return redirect()->back();
    }


}
