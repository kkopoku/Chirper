<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    function receivePayment(){
        // type some code here
        log::info("payment received");
    }
}
