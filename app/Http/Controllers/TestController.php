<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\log;

class TestController extends Controller
{
    function test(){
        Log::info("HI");
        return "Hiiii";
    }
}