<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use public\testOoP\testOoP;

class videosController extends Controller
{
    $test = new testOop();
    echo $test->tinhtong(2,3);
}
