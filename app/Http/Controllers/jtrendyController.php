<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Log;

class jtrendyController extends Controller
{
    public function example() {
        Log::info("ENTER TO LOG");
        return view('example');
    }

    public function loadSong() {
        return view('popularSong');
    }
}