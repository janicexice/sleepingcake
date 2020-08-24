<?php

namespace App\Http\Controllers\Frontend\health;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\health\Test;
use App\Models\Website;

class TestController extends Controller
{
    public function index ()
    {
        $test = Test::orderBy('id')->get();
        $website = Website::find(1);
        return view('frontend.health.test', compact('test', 'website'));
    }
}